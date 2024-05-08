<?php

class Createdworkoutplans{
    use Controller;

   
        public function index() {
            $data1 = [];
            $arr1 = [];
            $arr2 = [];
            $arr3 = []; 
            $usertable1 = new Workoutplans;
            $usertable2 = new Workoutequipments;
            $usertable3 = new Workoutsuppliments;

            //$this->view('createdworkoutplans', $data1);
            if (!isset($_SESSION['email'])) {
              // Handle unauthorized access here, for example, redirect to login page
              header("Location: login");
              exit();
          }

           
            $arr1['instructoremail'] = $_SESSION['email'];
            $data1=$usertable1->findAll($arr1);

           // print_r($data1);  
           
                if($data1){
                  foreach($data1 as $temp1){

                  $data1['id']=$temp1->id;
                  $data1['iemail']=$temp1->iemail;
                  $data1['maingoal']=$temp1->maingoal;
                  $data1['workouttype']=$temp1->workouttype;
                  $data1['traininglevel']=$temp1->traininglevel;
                  $data1['programduration']=$temp1->programduration;
                  $data1['daysperweek']=$temp1->daysperweek;
                  $data1['targetgender']=$temp1->targetgender;
                 
                  
                  //print_r($data1);
                  }
                  
                    }
                    $data2=$usertable2->findAll($data1['id']);

                    if ($data2) {
                      // Initialize an array to store all equipment data
                      $equipmentData = [];
                  
                      foreach ($data2 as $temp2) {
                          // Assuming $temp2->equipment is the field containing equipment data
                          $equipmentData[] = $temp2->equipment;
                      }
                  
                      // Assign the array to $data1['equipment']
                      $data1['equipment'] = $equipmentData;
                  
                      // Now, $data1['equipment'] will contain an array of all equipment data
                      // You can use this array as needed, for example, passing it to the view
                      // or processing further.
                  }
                    $data3=$usertable3->findAll($data1['id']);

                    if ($data3) {
                      // Initialize an array to store all equipment data
                      $SuppData = [];
                  
                      foreach ($data3 as $temp3) {
                          // Assuming $temp2->equipment is the field containing equipment data
                          $SuppData[] = $temp3->suppliment;
                      }
                  
                      // Assign the array to $data1['equipment']
                      $data1['suppliment'] = $SuppData;
                  
                      // Now, $data1['equipment'] will contain an array of all equipment data
                      // You can use this array as needed, for example, passing it to the view
                      // or processing further.
                  }
                

                     $this->view('createdworkoutplans',$data1);
                // else{
                //     echo "UNAUTHORIZED ACCESS";
                // }
                 

              //  print_r($temp1);

                  
     

                // $this->view('createdworkoutplans', $data1);

              
           
}
}
