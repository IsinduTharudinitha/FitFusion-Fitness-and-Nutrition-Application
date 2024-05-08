<?php

class Memberviewworkoutplan{
    use Controller;

        public function index() {
            $data = [];     

            $user = new User;
            $arr1['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr1);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;

            //get the workoutid of the member in the registeredmembers table
            $regmember = new Registeredmembers;
            $arr2['memberemail'] = $_SESSION['email'];
            $regmemberdeets = $regmember->where($arr2);
            // print_r($regmemberdeets);
            $workoutid = $regmemberdeets[0]->workoutid;

            //if the workoutid is 0, store the flag as false
            if ($workoutid) {
                $data['flag'] = 1;

                //get the workoutplanid from the workoutplans table
                $workoutplan = new Workoutplans;
                $arr3['id'] = $workoutid;
                $workoutplandeets = $workoutplan->where($arr3);
                // print_r($workoutplandeets);
                $data['workoutplanid'] = $workoutplandeets[0]->id;

                //get the workoutplan from the workoutplans table
                $allmachines = [];
                $allexercise = [];
                $allreps = [];
                $allsets = [];
                $allmaxtimes = [];

                $machine = new Machine;
                $arr4['gymemail'] = $regmemberdeets[0]->gymemail;
                // print_r($arr3['gymemail']);
                for ($i=0; $i < count($workoutplandeets); $i++) { 
                    array_push($allmachines, $workoutplandeets[$i]->machine);
                    array_push($allexercise, $workoutplandeets[$i]->exercise);
                    array_push($allreps, $workoutplandeets[$i]->reps);
                    array_push($allsets, $workoutplandeets[$i]->sets);
                    $arr4['machineType'] = $workoutplandeets[$i]->machine;
                    $machinedeets = $machine->where($arr4);
                    // print_r($machinedeets);
                    array_push($allmaxtimes, $machinedeets[0]->maxtime);
                }

                $data['allmachines'] = $allmachines;
                $data['allexercises'] = $allexercise;
                $data['allreps'] = $allreps;
                $data['allsets'] = $allsets;
                $data['allmaxtimes'] = $allmaxtimes;

                
            }
            else {
                $data['flag'] = 0;
            }


            //if the workoutid is 1
                // store the flag as 1
                // get the workoutplanid from the workoutplans table
                // get the workoutplan from the workoutplans table
                // get the workoutequipments from the workoutequipments table
                // get the equipment from the equipments table
            
            

            $this->view('Member/memberviewworkoutplan', $data);
        }
   

}