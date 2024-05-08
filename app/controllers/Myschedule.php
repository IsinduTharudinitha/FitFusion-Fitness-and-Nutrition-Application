<?php

class Myschedule{
    use Controller;

        public function index() {
            $data = [];
            $regmems=new Registeredmembers;
            $gym=new Gym;
            $workoutplans=new Workoutplans;
            $machine=new Machine;
            $schedule=new Schedule;



            if ($_SERVER['REQUEST_METHOD']=='GET') {
                $email=$_SESSION['email'];
                $arr1['memberemail']=$email;
                $isregistered=$regmems->where($arr1);
                //print_r($isregistered);
                if(!is_array($isregistered)){
                    redirect("memberdash");
                }
                $workoutid=$isregistered[0]->workoutid;
                $gymname=$isregistered[0]->gymname;
                $arr2['gymName']=$gymname;
                $gymdata=$gym->where($arr2);
                $manageremail=$gymdata[0]->manageremail;
                // print_r($manageremail);
                // print_r($isregistered);

                $date=$_GET['date'];
                $stime=$_GET['stime'];
                $etime=$_GET['etime'];

                //workout plan table
                $arr3['id']=$workoutid;
                $myworkout=$workoutplans->where($arr3);
                $machineAndTime=[];
                $countexercises=count($myworkout);
                for($x=0;$x<$countexercises;$x++){
                    $machineAndTime[$x]['machine']=$myworkout[$x]->machine;
                    $machineAndTime[$x]['time']=$myworkout[$x]->time;
                }
                //print_r($machineAndTime);

                //machine table

                $arr4['manageremail']=$manageremail;
                $machineIdAndTime=[];
                $count=0;
                foreach($machineAndTime as $mch){
                    $machinedata=$machine->findMachineIds($manageremail,$mch['machine']);
                    $count2=0;
                    foreach($machinedata as $z){
                        $machineIdAndTime[$count][$count2]['id']=$z;
                        $machineIdAndTime[$count][$count2]['time']=$z=$mch['time'];
                        $machineIdAndTime[$count][$count2]['machineType']=$z=$mch['machine'];
                        $count2++;
                    }
                    $count++;
                }
                //print_r($machineIdAndTime);
                
                //lets schedule machines
                outer_loop:
                foreach($machineIdAndTime as  $exc){
                    foreach($exc as $onemachine){
                        //print_r($onemachine);
                        $mid=$onemachine['id'];
                        $arr5['id']=$mid;
                        $idpresent=$schedule->where($arr5);
                       // print_r($idpresent);
                        if(!is_array($idpresent)){
                            $arr6=[];
                            $arr6['id']=$mid;
                            $arr6['date']=$date;
                            //print_r($mid);
                            $timestamp = strtotime($stime);
                            $timestamp += 60*$onemachine['time']; 
                            $newTime = date("H:i:s", $timestamp);
                            //print_r($newTime);

                            $arr6['fromTime']=$stime;
                            $arr6['toTime']=$newTime;
                            $arr6['machineType']=$onemachine['machineType'];
                            $arr6['managerEmail']=$manageremail;
                            $arr6['memberEmail']=$email;
                            $schedule->insert($arr6);

                             //new starting time
                             $timestamp = strtotime($newTime);
                             $timestamp += 60; 
                             $stime = date("H:i:s", $timestamp);

                            break;
                        }
                        //if is_array($idpresent)
                        else{
                            $count3=0;
                            foreach($idpresent as $a){
                                $count3++;
                                $timestamptemp = strtotime($stime);
                                $timestamptemp += 60*$onemachine['time']; 
                                $tempTime = date("H:i:s", $timestamptemp);
                                $tbldate=$a->date;
                                if(strtotime($a->date)==strtotime($date) and ($a->toTime<$stime or $a->fromTime>$tempTime )){
                                    // print_r($a->fromTime);
                                    //  print_r($a->toTime);
                                    // print_r($stime);
                                    // print_r($tempTime); 
                                    if($count3==count($idpresent)){
                                        $arr6=[];
                                        $arr6['id']=$mid;
                                        $arr6['date']=$date;
                                        print_r($mid);
                                        $timestamp = strtotime($stime);
                                        $timestamp += 60*$onemachine['time']; 
                                        $newTime = date("H:i:s", $timestamp);
                                        //print_r($newTime);
                                        $arr6['fromTime']=$stime;
                                        $arr6['toTime']=$newTime;
                                        $arr6['machineType']=$onemachine['machineType'];
                                        $arr6['managerEmail']=$manageremail;
                                        $arr6['memberEmail']=$email;
                                        $schedule->insert($arr6);
    
                                        $timestamp = strtotime($newTime);
                                        $timestamp += 60; 
                                        $stime = date("H:i:s", $timestamp);

                                        //////////////////////////////////////////////////////////////
                                        break 2;  
                                        ///////////////////////////////////////////////////////////////////    
                                    }
                                }
                                //date matched
                                
                                //no time overlap
                               
                                ////
                                ////
                                elseif(strtotime($a->date)!=strtotime($date) ){
                                   
                                    $arr6=[];
                                    $arr6['id']=$mid;
                                    $arr6['date']=$date;
                                   // print_r($mid);
                                    $timestamp = strtotime($stime);
                                    $timestamp += 60*$onemachine['time']; 
                                    $newTime = date("H:i:s", $timestamp);
                                    //print_r($newTime);
                                    $arr6['fromTime']=$stime;
                                    $arr6['toTime']=$newTime;
                                    $arr6['machineType']=$onemachine['machineType'];
                                    $arr6['managerEmail']=$manageremail;
                                    $arr6['memberEmail']=$email;
                                    // print_r($a->date);
                                    // print_r("hello");
                                    // print_r($date);
                                    $schedule->insert($arr6);

                                    $timestamp = strtotime($newTime);
                                    $timestamp += 60; 
                                    $stime = date("H:i:s", $timestamp);

                                    break 2;
                                                              
                                }
                                //data and time overlap
                                else{
                                    break;
                                }
                                
                            }
                            //break exercise
                          
                        }
                        //date break
                      
                        

                    }
             
                }

                


                
            }
            // if($_SERVER['REQUEST_METHOD']=='GET'){
            //     if(isset($_GET['deleteid'])){
            //         $idd=$_GET['deleteid'];

            //         //$s=$usertable->delete($idd);
            //         redirect('manageresources');
            //     }
            // }

            $arr7['memberEmail']=$_SESSION['email'];
            $data=$schedule->where($arr7);
           // print_r($data);
    
            $this->view('myschedule', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}