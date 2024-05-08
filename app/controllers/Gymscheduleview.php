<?php

class Gymscheduleview
{
    use Controller;


    public function index()
    {
        $data = [];

        $user = new User;
        $arr1['email'] = $_SESSION['email'];
        $memberdeets = $user->first($arr1);
        $data['firstname'] = $memberdeets->name;
        $data['lastname'] = $memberdeets->lastname;

        // print_r($memberdeets);

        // GET THE EQUIPMENT OF THE MEMBER

        // step 1 -> get the workout ID
        $regmember = new Registeredmembers;
        $arr2['memberemail'] = $_SESSION['email'];
        // print_r($arr2['memberemail']);
        $regmemberdeets = $regmember->first($arr2);

        // print_r($regmemberdeets);
        $data['workoutid'] = $regmemberdeets->workoutid;
        // print_r($data['workoutid']);

        // step 2 -> get the workout plan rows
        $workoutplantable = new Workoutplans;
        $arr3['id'] = $data['workoutid'];
        $allworkoutplandeets = $workoutplantable->where($arr3);
        // print_r($allworkoutplandeets);

        // $allmachines = [];
        // for ($i=0; $i < count($allworkoutplandeets); $i++) { 
        //     array_push($allmachines, $allworkoutplandeets[$i]->machine);
        // }
        // // print_r($allmachines);

        // // step 4 -> add the machines array to the $data
        // $data['allmachines'] = $allmachines;
        // // print_r($data);

        $scheduletable = new Schedule;
        $arr4['memberemail'] = $_SESSION['email'];
        $arr4['status'] = 1;
        $allscheduledeets = $scheduletable->where($arr4);
        // print_r($allscheduledeets);

        if ($allscheduledeets) {
            $data['date'] = $allscheduledeets[0]->date;
        }


        $allmachines = [];
        $alltimes = [];
        for ($i = 0; $i < count($allscheduledeets); $i++) {
            array_push($allmachines, $allscheduledeets[$i]->machine);

            $time24 = $allscheduledeets[$i]->startingtime;
            $dateTime = DateTime::createFromFormat('H:i:s', $time24);
            $time12 = $dateTime->format('h:i A');
            array_push($alltimes, $time12);
        }
        // print_r($allmachines);

        // step 4 -> add the machines array to the $data
        $data['allmachines'] = $allmachines;
        $data['alltimes'] = $alltimes;
        // print_r($data);            



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $memberemail = $_SESSION['email'];
            // $arr5['status'] = 0;
            // $scheduletable->update($memberemail,$arr5,'memberemail');
            // redirect('gymschedule');
            // $memberemail = $_SESSION['email'];
            // $arr5['status'] = 0;
            // $scheduletable->update($memberemail,$arr5,'memberemail');

        }



        $this->view('Member/gymscheduleview', $data);
    }

    public function redirectToSchedule()
    {
        $scheduletable = new Schedule;
        $memberemail = $_SESSION['email'];
        $arrupdate['status'] = 0;
        $scheduletable->update($memberemail,$arrupdate,'memberemail');

        redirect('gymschedule');

    }
}
