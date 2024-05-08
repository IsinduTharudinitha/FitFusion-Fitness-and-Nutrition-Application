
<?php

class Scheduleinterface{
    use Controller;

        public function index() {
            $data = [];
            $regmems=new Registeredmembers;
            $gym=new Gym;
            $workoutplans=new Workoutplans;
            $machine=new Machine;
            $schedule=new Schedule;


            if ($_SERVER['REQUEST_METHOD']=='POST') {
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
                $date=$_POST['date'];
                $stime=$_POST['stime'];
                $etime=$_POST['etime'];

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
                $kk=[];
                $m=0;
                foreach($machineIdAndTime as  $exc){
                    $m++;
                    $n=0;
                    foreach($exc as $onemachine){
                        $n++;
                        //print_r($onemachine);
                       // $machineType=$onemachine['machineType'];
                        $mid=$onemachine['id'];
                        $arr5['id']=$mid;
                        $idpresent=$schedule->where($arr5);
                       // print_r($idpresent);
                        if(!is_array($idpresent)){
                           // break;
                        }
                        //if is_array($idpresent)
                        else{
                            $count3=0;
                            foreach($idpresent as $a){
                                $count3++;
                              
                                if($a->date!=$date){
                                   

                                    //break 2;
                                }

                                elseif($a->date==$date and ($a->toTime<$stime or $a->fromTime>$etime )){
                                   
                                    
                                    if($count3==count($idpresent)){
 
                                    }
                                                             
                                }
                                //data and time overlap
                                else{
                                    $i['fromTime']=$a->fromTime;
                                    $i['toTime']=$a->toTime;
                                    //print_r($exc[0]['machineType']);
                                    $kk[$exc[0]['machineType']][$onemachine['id']][$count3]=$i;
                                    
                                    
                                    //break;
                                }
                                
                            }
                            //break exercise  
                        }
                        //date break
                                             
//fineshed one machien
                    }
             
                } 
                $d['stime']=$stime;
                $d['etime']=$etime;
                $d['date']=$date;
                $data=$kk;
                


                //print_r($kk);  
               // print_r(count($kk));
               $finalArray=[]; 
               foreach($machineIdAndTime as  $exc){
                $count4=0;
                foreach($exc as $onemachine){
                    
                    $arr=[];
                    foreach(array_keys($kk[$exc[0]['machineType']]) as $j){
                        array_push($arr,$j);
                        //print_r($j);
                    }
                    if(in_array($onemachine['id'],$arr)){
                        // $count4++;
                        // if($count4==count($exc)){
                        //     $temparr=[];
                        //     foreach($kk[$exc[0]['machineType']] as $ids){
                        //         foreach($ids as $timeslots){
                        //             $temparr[$exc[0]['machineType']]
                        //         }
                        //     }

                        // }
                    }
                    else{
                        $kk[$exc[0]['machineType']][$onemachine['id']]="free";
                        
                    }
                   
                }
               // break;
               }
                $data=$kk;
                $data['d']=$d;
                //print_r($data);  
            }

            $this->view('scheduleinterface', $data);
        }
}