<?php

class Createworkoutplan
{
    use Controller;


    public function index()
    {
        if (!isset($_SESSION['email'])) {
            redirect('login');
        }

        $data = [];
        $usertable1 = new Workoutplans;
        $usertable2 = new Workoutsuppliments;
        $machine=new Machine;
        $regins=new Registeredinstructor;
        $arr1['instructoremail']=$_SESSION['email'];
        $instructor=$regins->where($arr1);
        $manageremail=$instructor[0]->manageremail;
        $arr2['manageremail']=$manageremail;
        $machines=$machine->where($arr2);
        $machinearr=[];
        foreach($machines as $x){
           array_push($machinearr,$x->machineType);
        }
        $uniquemachinearr=array_unique($machinearr);
        $data=$uniquemachinearr;
        //print_r($uniquemachinearr);
        


        $data1 = [];







        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if (!empty($_POST['exercises'])) {
                foreach ($_POST['exercises'] as $exercise) {
                    // Extract exercise details from the exercise array
                    $exerciseData = [
                        'id' => $_POST['workout_id'],
                        'workoutname' => $_POST['workoutname'],
                        'iemail' => $_SESSION['email'],
                        'maingoal' => $_POST['main_goal'],
                        'workouttype' => $_POST['workout_Type'],
                        'traininglevel' => $_POST['training_level'],
                        'programduration' => $_POST['program_duration'],
                        'daysperweek' => $_POST['days_per_week'],
                        'targetgender' => $_POST['target_gender'],

                        'exercise' => $exercise['exercise'],
                        'machine' => $exercise['machine'],
                        'sets' => $exercise['sets'],
                        'reps' => $exercise['reps'],
                        'time' => $exercise['time'],
                        'rest' => $exercise['rest_time']
                    ];

                    // Insert initial row  into the database
                    // $usertable1->insert($exerciseData);

                    $arr['id'] = $_POST['workout_id'];
                    $arr['exercise'] = $exercise['exercise'];

                    $usertable1->insert($exerciseData);

                    // if (!$usertable1->unique($arr['id'])) {
                    //          if($usertable1->unique($arr['id'])){
                    //             $usertable1->insert($exerciseData);
                    //          }

                    //          else {
                    //             $data['errors'] = "Exercise with ID '{$arr['id']}' and Exercise '{$arr['exercise']}' already exists.";
                                
                    //         }

                    // }

                }

                // Insert suppliment data into the database
                $data1 = [];
                $data1['suppliment'] = $_POST['supplements'];

              foreach ($data1['suppliment'] as $key => $value) {

                $insertData['id'] = $_POST['workout_id'];
                $insertData['suppliment'] = $value;

                $usertable2->insert($insertData);

            }


        }


          // public function edit($a = '', $b = '', $c = '') {
        //     show("from the edit function");
        //     $this->view('home');
        // }
    }


    $this->view('createworkoutplan', $data);

}

}
