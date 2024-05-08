<?php

class Viewgym {
    use Controller;
        public function index() {
            $data = [];

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $gym = new Gym;
            $address=new Address;
            $openhours=new Openhours;
            $packages=new Package;
            $gymimages=new Gymimages;
            $facilities= new Facilities;
     
            if(isset($_GET['id'])){
                $idd=$_GET['id'];
    
                $arr1['id'] = $idd;
            
                $gymdata=$gym->first($arr1);
                $data['id']=$idd;
                $data['gymName']=$gymdata->gymName;
                $data['email']=$gymdata->email;
                $data['manageremail']=$gymdata->manageremail;
                $data['description']=$gymdata->description;
                
    
                // GET LOCATION OF THE GYM
                $arr2['gymName'] = $data['gymName'];
                $locationdata=$address->first($arr2);
        
                $data['location1']=$locationdata->location1;
                $data['location2']=$locationdata->location2;
                $data['location3']=$locationdata->location3;
    
                
                
                // GET OPEN HOURS OF THE GYM
                $openhoursdata=$openhours->first($arr2);
        
                $time24data1 = $openhoursdata->openhourswf;
                $dateTime1 = DateTime::createFromFormat('H:i:s', $time24data1);
                $data['openhourswf'] = $dateTime1->format('h:i A');

                $time24data2 = $openhoursdata->openhourswt;
                $dateTime2 = DateTime::createFromFormat('H:i:s', $time24data2);
                $data['openhourswt'] = $dateTime2->format('h:i A');

                $time24data3 = $openhoursdata->openhourssaf;
                $dateTime3 = DateTime::createFromFormat('H:i:s', $time24data3);
                $data['openhourssaf'] = $dateTime3->format('h:i A');

                $time24data4 = $openhoursdata->openhourssat;
                $dateTime4 = DateTime::createFromFormat('H:i:s', $time24data4);
                $data['openhourssat'] = $dateTime4->format('h:i A');

                $time24data5 = $openhoursdata->openhourssuf;
                $dateTime5 = DateTime::createFromFormat('H:i:s', $time24data5);
                $data['openhourssuf'] = $dateTime5->format('h:i A');

                $time24data6 = $openhoursdata->openhourssut;
                $dateTime6 = DateTime::createFromFormat('H:i:s', $time24data6);
                $data['openhourssut'] = $dateTime6->format('h:i A');
                
    
                // GET PACKAGE DETAILS OF THE GYM
                $arr3['manageremail'] = $data['manageremail'];
                $packagesdata=$packages->where($arr3);
                //print_r($packagesdata);
                if(isset($packagesdata)){
                    $limit=count($packagesdata);
                }
                
                if(!($limit<4)){
                    $limit=4;
                }
                for($x=0;$x<$limit;$x++){
                    $data[$x]['packagetype']=$packagesdata[$x]->packagetype;
                    $data[$x]['description']=$packagesdata[$x]->description;
                    $data[$x]['paymentperiod']=$packagesdata[$x]->paymentperiod;
                    $data[$x]['amount']=$packagesdata[$x]->amount;
                }
                $data['limit']=$limit;
    
                //get gym images
                $arr4['manageremail'] = $data['manageremail'];
                $gymimagesdata=$gymimages->where($arr4);
                //print_r($gymimagesdata);
                $y=0;
                foreach($gymimagesdata as $img){
                    $data['image'][$y]=$img->image_url;
                    $y=$y+1;
                }


                // GET ALL FACILITIES OF THE GYM
                $facilitiesdeets = $facilities->where($arr2);
                // print_r($facilitiesdeets);

                $allfacilities = [];
                for ($i=0; $i < count($facilitiesdeets); $i++) { 
                    array_push($allfacilities, $facilitiesdeets[$i]->facility);
                }
                // print_r($allfacilities);
                $data['allfacilities'] = $allfacilities;


                // GET ALL MACHINES OF THE GYM
                $machines = new Machine;
                $machinedeets = $machines->where($arr4);

                $allmachines = [];
                for ($i=0; $i < count($machinedeets); $i++) { 
                    array_push($allmachines, $machinedeets[$i]->machineType);
                }
                // print_r($allmachines);
                $data['allmachines'] = $allmachines;


                // GET ALL INSTRUCTORS OF THE GYM
                // $instructordetails = new Instructordetails;
                // $instructordeets = $instructordetails->where($arr4);




            }


            // $gym = new Gym;
            // // $address=new Address;
            // $gymimages=new Gymimages;
    
            // $gymdata = $gym->findAll();
            // for($x=0;$x<count($gymdata);$x++){
            //     $data[$x]['gymName']=$gymdata[$x]->gymName;
            //     $data[$x]['id']=$gymdata[$x]->id;
    
            //     $arr3['gymName']= $data[$x]['gymName'];
            //     // $locationdata=$address->first($arr3);
        
            //     // $data[$x]['location1']=$locationdata->location1;
            //     // $data[$x]['location2']=$locationdata->location2;
            //     // $data[$x]['location3']=$locationdata->location3;
    
            //     //get images
            //     $arr4['manageremail']=$gymdata[$x]->manageremail;
            //     $gymimagesdata=$gymimages->first($arr4);
            //     $data[$x]['gymimages']=$gymimagesdata->image_url;
            //     //print_r($gymimagesdata);
            // }
             
      
            
                $this->view('Member/viewgym', $data);
            }
        
}