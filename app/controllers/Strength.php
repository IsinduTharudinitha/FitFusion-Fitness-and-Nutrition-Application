<?php

class Strength{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            $table1 = new Workoutplans ;
            $table2 = new Workoutequipments;
            $table3 = new Workoutsuppliments;
            


         
            $strengthPlans = $table1->where(['workouttype' => 'strength']);

            // Convert the fetched cardio plan to an associative array
          //  $data['cardioPlan'] = (array) $cardioPlan;
            $data['strengthPlans'] = [];  
    
            foreach($strengthPlans as $temp){
               
                $strengthPlanData = [
                    'id' => $temp->id,
                    'iemail' => $temp->iemail,
                    'maingoal' => $temp->maingoal,
                    'workouttype' => $temp->workouttype,
                    'traininglevel' => $temp->traininglevel,
                    'programduration' => $temp->programduration,
                    'daysperweek' => $temp->daysperweek,
                    'targetgender' => $temp->targetgender
                ];



                $equipmentData = $table2->where(['id'=>$temp->id]);
                // Store equipment data in the cardio plan data
                $strengthPlanData['equipment'] = $equipmentData;

                $supplimentData = $table3->where(['id' => $temp->id]);
                // Store supplement data in the cardio plan data
                $strengthPlanData['suppliment'] = $supplimentData;
                 
                $data['strengthPlans'][] = $strengthPlanData;


            //     $data2=$table2->findAll($data['id']);

            //     if ($data2) {
            //       // Initialize an array to store all equipment data
            //       $equipmentData = [];
              
            //       foreach ($data2 as $temp2) {
            //           // Assuming $temp2->equipment is the field containing equipment data
            //           $equipmentData[] = $temp2->equipment;
            //       }
              
            //       // Assign the array to $data1['equipment']
            //       $data['equipment'] = $equipmentData;
              
            //       // Now, $data1['equipment'] will contain an array of all equipment data
            //       // You can use this array as needed, for example, passing it to the view
            //       // or processing further.
            //   }
            //     $data3=$table3->findAll($data['id']);

            //     if ($data3) {
            //       // Initialize an array to store all equipment data
            //       $SuppData = [];
              
            //       foreach ($data3 as $temp3) {
            //           // Assuming $temp2->equipment is the field containing equipment data
            //           $SuppData[] = $temp3->suppliment;
            //       }
              
            //       // Assign the array to $data1['equipment']
            //       $data['suppliment'] = $SuppData;
              
            //       // Now, $data1['equipment'] will contain an array of all equipment data
            //       // You can use this array as needed, for example, passing it to the view
            //       // or processing further.
            //   }
            


            
              //  $this->view('cardio', $data);
            }


            $this->view('strength', $data);
            // if($cardioPlans){
            //       foreach($cardioPlans as $temp1){

            //       }
            // }

          //  $data=$machines->where($arr2);
            // print_r($data);
           
            //$this->view('cardio', $data);

            /////////////////////////////////////
      
            ////////////////////////////////

           
            // if($_SERVER['REQUEST_METHOD']=='GET'){
            //     if(isset($_GET['machineid'])){
            //         $idd=$_GET['machineid'];
                      
            //         $arr2['id'] = $idd;
               
            //         $temp=$usertable->first($arr2);
            //         if($_SESSION['email']==$temp->instructoremail)
            //         {
                       
            //             redirect('machinefailure');
            //         }
            //         else{
            //             echo "UNAUTHORIZED ACCESS";
            //         }

            //         //$s=$usertable->delete($idd);
                   
            //     }
            // }
          
            if(!isset($data['errors'])){
                $data['errors']='';
            }
           
 
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}