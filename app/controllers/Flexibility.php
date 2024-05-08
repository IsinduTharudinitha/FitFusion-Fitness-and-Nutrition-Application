<!-- 

// class Flexibility{
//     use Controller;


        // public function index() {

            // if(!isset($_SESSION['email'])){
            //     redirect('login');
            // }
            
            // $data = [];
            // $table1 = new Workoutplans ;
            
            // $table3 = new Workoutsuppliments;
            
         
            // $flexibilityPlans = $table1->where(['workouttype'=>'flexibility']);

            // Convert the fetched cardio plan to an associative array
          //  $data['cardioPlan'] = (array) $cardioPlan;
            // $data['flexibilityPlans'] = [];  
    
            // foreach($flexibilityPlans as $temp){

            //   if(!$table1->unique($temp->id)){

         
            //     foreach($exercises as $exercise){
            //       $exerciseData = [
            //           'exercise' => $exercise->exercise,
            //           'machine' => $exercise->machine,
            //           'sets' => $exercise->sets,
            //           'time' => $exercise->time,
            //           'rest' => $exercise->rest
            //       ];
            //       $flexibilityPlanData['exercises'][] = $exerciseData;   
                 

              //   }
              // }else{

              //   $flexibilityPlanData = [
              //       'id' => $temp->id,
              //       'iemail' => $temp->iemail,
              //       'maingoal' => $temp->maingoal,
              //       'workouttype' => $temp->workouttype,
              //       'traininglevel' => $temp->traininglevel,
              //       'programduration' => $temp->programduration,
              //       'daysperweek' => $temp->daysperweek,
              //       'targetgender' => $temp->targetgender

              //   ];

                
              //   $supplimentData = $table3->where(['id' => $temp->id]);
             
              //   $flexibilityPlanData['suppliment'] = $supplimentData;
                 
              //   //$data['flexibilityPlans'][] = $flexibilityPlanData;

              

                
              //     $exercises= $table1->where(['id'=>$temp->id]);

              //     foreach($exercises as $exercise){
              //       $exerciseData = [
              //           'exercise' => $exercise->exercise,
              //           'machine' => $exercise->machine,
              //           'sets' => $exercise->sets,
              //           'time' => $exercise->time,
              //           'rest' => $exercise->rest
              //       ];
              //       $flexibilityPlanData['exercises'][] = $exerciseData; 
              //       $data['flexibilityPlans'][] = $flexibilityPlanData;


              //     }


                // }



                // $supplimentData = $table3->where(['id' => $temp->id]);
                // // Store supplement data in the cardio plan data
                // $flexibilityPlanData['suppliment'] = $supplimentData;
                 
                // $data['flexibilityPlans'][] = $flexibilityPlanData;


//             }


//             $this->view('flexibility', $data);
         
          
//             if(!isset($data['errors'])){
//                 $data['errors']='';
//             }
           
 
//         }
   

// }



<?php

class Flexibility {
    use Controller;

    public function index() {
        if (!isset($_SESSION['email'])) {
            redirect('login');
        }

        $data = [];
        $table1 = new Workoutplans;
        $table3 = new Workoutsuppliments;

        // Fetch all flexibility plans
        $flexibilityPlans = $table1->where(['workouttype' => 'flexibility']);

        // Initialize an associative array to store grouped flexibility plans
        $groupedFlexibilityPlans = [];

        foreach ($flexibilityPlans as $plan) {
            $id = $plan->id;

            // If the plan ID is not in the grouped array, initialize it
            if (!isset($groupedFlexibilityPlans[$id])) {
                $groupedFlexibilityPlans[$id] = [
                    'id' => $id,
                    'iemail' => $plan->iemail,
                    'maingoal' => $plan->maingoal,
                    'workouttype' => $plan->workouttype,
                    'traininglevel' => $plan->traininglevel,
                    'programduration' => $plan->programduration,
                    'daysperweek' => $plan->daysperweek,
                    'targetgender' => $plan->targetgender,
                    'suppliments' => [],
                    'exercises' => []
                ];
            }

            // Fetch suppliments for the plan
            $suppliments = $table3->where(['id' => $id]);

            // Add suppliments to the plan data
            foreach ($suppliments as $suppliment) {
                $groupedFlexibilityPlans[$id]['suppliments'][] = $suppliment;
            }

            // Fetch exercises for the plan
            $exercises = $table1->where(['id' => $id]);

            // Add exercises to the plan data
            foreach ($exercises as $exercise) {
                $groupedFlexibilityPlans[$id]['exercises'][] = [
                    'exercise' => $exercise->exercise,
                    'machine' => $exercise->machine,
                    'sets' => $exercise->sets,
                    'time' => $exercise->time,
                    'rest' => $exercise->rest
                ];
            }
        }

        // Pass the grouped flexibility plans to the view
        $data['flexibilityPlans'] = $groupedFlexibilityPlans;
      

        if (!isset($data['errors'])) {
            $data['errors'] = '';
        }

        $this->view('flexibility', $data);
        
    }
 
}
?>

