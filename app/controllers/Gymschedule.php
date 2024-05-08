<?php

class Gymschedule
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

        // SHOW THE EQUIPMENT OF THE MEMBER

        $arr10['memberemail'] = $_SESSION['email'];
        $arr10['status'] = 1;
        $testscheduletable = new Schedule;
        $testschedule = $testscheduletable->where($arr10);
        if ($testschedule) {
            redirect('gymscheduleview');
        }

        // step 1 -> get the workout ID
        $regmember = new Registeredmembers;
        $arr2['memberemail'] = $_SESSION['email'];
        // print_r($arr2['memberemail']);
        $regmemberdeets = $regmember->first($arr2);
        $_SESSION['gymemail'] = $regmemberdeets->gymemail;
        $_SESSION['gymname'] = $regmemberdeets->gymname;


        // print_r($regmemberdeets);
        $data['workoutid'] = $regmemberdeets->workoutid;
        // print_r($data['workoutid']);

        if ($data['workoutid'] != 0) {
            $data['flag'] = 1;
            // step 2 -> get the workout plan rows
            $workoutplantable = new Workoutplans;
            $arr3['id'] = $data['workoutid'];
            $allworkoutplandeets = $workoutplantable->where($arr3);
            // print_r($allworkoutplandeets);

            // step 3 -> get all the machines into an array
            $allmachines = [];
            for ($i = 0; $i < count($allworkoutplandeets); $i++) {
                array_push($allmachines, $allworkoutplandeets[$i]->machine);
            }
            // print_r($allmachines);

            // step 4 -> add the machines array to the $data
            $data['allmachines'] = $allmachines;
            $_SESSION['allmachines'] = $allmachines;
            // print_r($data);
        } else {
            $data['flag'] = 0;
        }

        


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // redirect to gymschedulefordate page with the selected date
            $dateInput = $_POST['date'];
            $date = new DateTime($dateInput);
            $_SESSION['date'] = $date;
            redirect('gymschedulefordate',$_SESSION);
            // print_r('hiiiiiiii');
            // check what day the selected date is
            $dateInput = $_POST['date'];
            $date = new DateTime($dateInput);
            $dayOfWeek = $date->format('N');

            if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
                $dayType = "Weekday";
            } elseif ($dayOfWeek == 6) {
                $dayType = "Saturday";
            } elseif ($dayOfWeek == 7) {
                $dayType = "Sunday";
            }
            // print_r("The day is a " . $dayType);

            // check the daytype and get the openhours of the gym
            $gymtable = new Gym;

            $arr4['email'] = $regmemberdeets->gymemail;
            $gymdeets = $gymtable->where($arr4);
            // print_r($arr4['email']);
            // print_r($gymdeets);

            $openhrstable = new Openhours;
            $arr5['gymName'] = $gymdeets[0]->gymName;
            // print_r($gymdeets[0]->gymName);
            $openhoursdeets = $openhrstable->first($arr5);
            // print_r($openhoursdeets);



            if ($dayType == 'Weekday') {
                $opentime = $openhoursdeets->openhourswf;
                $closetime = $openhoursdeets->openhourswt;
            } elseif ($dayType == 'Saturday') {
                $opentime = $openhoursdeets->openhourssaf;
                $closetime = $openhoursdeets->openhourssat;
            } elseif ($dayType == 'Sunday') {
                $opentime = $openhoursdeets->openhourssuf;
                $closetime = $openhoursdeets->openhourssut;
            }

            // $opentime = substr($opentime, 0, 2);
            // $closetime = substr($closetime, 0, 2);
            $opentime = DateTime::createFromFormat('H:i:s', $opentime);
            $data['opentime'] = $opentime;
            $closetime = DateTime::createFromFormat('H:i:s', $closetime);
            $data['closetime'] = $closetime;

            // print_r($opentime);
            // print_r($closetime);


            //get all relavent records from schedule table --- no need
            $scheduletable = new Schedule;
            $arr6['gymemail'] = $regmemberdeets->gymemail;
            $arr6['date'] = $dateInput;
            $arr6['status'] = 1;
            $scheduledeets = $scheduletable->where($arr6);
            // print_r($scheduledeets);

            $startingtime = $_POST['time'];
            // $startingtime = substr($startingtime, 0, 2);
            $startingtime = DateTime::createFromFormat('H:i', $startingtime);
            // print_r($startingtime);
            $machinelist = $data['allmachines'];
            // show($machinelist);
            // die();

            //while $machinelist is not empty
            while (!empty($machinelist)) {
                if ($startingtime < $opentime) {
                    // TODO error

                    break;
                } elseif ($startingtime > $closetime) {
                    // TODO error

                    break;
                } else {
                    //get all records from the machines table by giving the machineType and the gymemail
                    $arr7['machineType'] = $machinelist[0];
                    $arr7['gymemail'] = $regmemberdeets->gymemail;
                    $machinetable = new Machine;
                    $machinedeets = $machinetable->where($arr7);
                    // print_r($machinedeets);

                    // get the max time from the first record taken
                    $maxtime = $machinedeets[0]->maxtime;
                    // print_r($maxtime);

                    // store the number of records taken in count1
                    if ($machinedeets) {
                        $count1 = count($machinedeets);
                        // print_r($count1);
                    }

                    // get the records from the schedule table by giving the starting time, machineType and the gymemail
                    $scheduletable = new Schedule;
                    $arr8['gymemail'] = $regmemberdeets->gymemail;
                    $arr8['date'] = $dateInput;
                    $arr8['status'] = 1;
                    // print_r($startingtime);
                    $arr8['startingtime'] = $startingtime->format('H:i:s');
                    $relaventschedules = $scheduletable->where($arr8);
                    // print_r($relaventschedules);

                    // store that number of records as count2
                    $count2 = 0;
                    if ($relaventschedules) {
                        $count2 = count($relaventschedules);
                        // print_r($count2);
                    }

                    if ($count2 == $count1) {
                        // cannot schedule
                        // pop the first element in the $machinelist and append it to the end of the array
                        array_push($machinelist, array_shift($machinelist));
                    } elseif ($count2 == 0 or $count2 < $count1) {
                        // can schedule
                        // insert the row
                        $newschedule = new Schedule;
                        $arr9['date'] = $_POST['date'];
                        $arr9['startingtime'] = $startingtime->format('H:i:s');
                        $arr9['machine'] = $machinelist[0];
                        $arr9['gymemail'] = $regmemberdeets->gymemail;
                        $arr9['memberemail'] = $_SESSION['email'];
                        $arr9['status'] = 1;
                        $newschedule->insert($arr9);
                        // print_r($newschedule);

                        // startingtime = startingtime + maxtime;
                        $interval = new DateInterval('PT' . $maxtime . 'M');
                        $startingtime->add($interval);
                        // echo $startingtime->format('Y-m-d H:i:s');
                        // print_r($startingtime);

                        // pop the first element in machinelist
                        array_shift($machinelist);
                    }
                }
            }

            redirect('gymscheduleview');
        }



        $this->view('Member/gymschedule', $data);
    }

    // Example Controller Method in PHP
    public function getDate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           $data=$_POST['date'];
        }
        header('Content-Type: application/json');

        echo json_encode($data);
        // $data = json_decode(file_get_contents('php://input'), true);
        // $dateInput = $data[0]['date'];

        // if ($dateInput) {
        //     $date = new DateTime($dateInput);
        //     $dayOfWeek = $date->format('N');
        //     $dayType = $this->determineDayType($dayOfWeek);
        //     $gymDetails = $this->fetchGymDetails($_SESSION['gymname'], $dayType);
        //     $machineDetails = $this->fetchMachineDetails($_SESSION['allmachines'],$date);


        //     echo json_encode([
        //         'openTime' => $gymDetails['openTime'],
        //         'closeTime' => $gymDetails['closeTime'],
        //         'dayType' => $dayType,
        //         'machineDetails' => $machineDetails
        //     ]);
        // } else {
        //     echo json_encode(['error' => 'No date provided']);
        // }
    }

    private function determineDayType($dayOfWeek)
    {
        if ($dayOfWeek >= 1 && $dayOfWeek <= 5) {
            return "Weekday";
        } elseif ($dayOfWeek == 6) {
            return "Saturday";
        } else {
            return "Sunday";
        }
    }

    private function fetchGymDetails($gymname, $dayType)
    {
        // Fetch gym open/close times based on dayType
        //if the dayType is a weekday
        $openhours = new Openhours;
        if ($dayType == 'Weekday') {
            $openTime = $openhours->fetchGymOpenTime($gymname, 'openhourswf');
            $closeTime = $openhours->fetchGymOpenTime($gymname, 'openhourswt');
        } elseif ($dayType == 'Saturday') {
            $openTime = $openhours->fetchGymOpenTime($gymname, 'openhourssaf');
            $closeTime = $openhours->fetchGymOpenTime($gymname, 'openhourssat');
        } else {
            $openTime = $openhours->fetchGymOpenTime($gymname, 'openhourssuf');
            $closeTime = $openhours->fetchGymOpenTime($gymname, 'openhourssut');
        }
        return [
            'openTime' => $openTime,
            'closeTime' => $closeTime
        ];
           
    }

    private function fetchMachineDetails($machineTypes, $date)
    {
        $machineDetails = [];
        foreach ($machineTypes as $machineType) {
            $machine = new Schedule;
            $machineDetails[$machineType] = $machine->fetchMachineSchedule($machineType, $_SESSION['gymemail'], $date);
        }
        return $machineDetails;
    }
}
