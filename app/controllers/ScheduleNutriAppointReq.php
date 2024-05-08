<?php

class ScheduleNutriAppointReq{
    use Controller;
        public function index() {
            $data = [];

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $nutrischedule = new Nutrischedule; // table content -> instructorID, timeSlot

                if($nutrischedule->exists($_POST)) {
                    $data['errors'] = $nutrischedule->errors;    
                } else {
                    
                }

                $data['errors'] = $user->errors;
            }

            $regmembers = new Registeredmembers;
            $arr['memberemail'] = $_SESSION['email'];
            $memberdetails = $regmembers->where($arr);
            $gymemail = $memberdetails[0]->gymemail;
            $data['gymemail'] = $gymemail;

            $regnutritionists = new Registerednutritionist;
            // print_r($reginstructors);
            $arr2['gymemail'] = $gymemail;
            // print_r($arr2['gymemail']);
            $nutritionistdetails = $regnutritionists->where($arr2); // array of details are here

            // echo $instructordetails;
            // echo "hiiiii";
            // $instructoremails = [];
            $nutrinamelist = [];
            for ($i=0; $i < count($nutritionistdetails); $i++) { 

                $nutritionistemails = $nutritionistdetails[$i]->nutritionistemail;
                // print_r($instructoremails);
                $data['nutritionistemail'] = $nutritionistemails;
                // print_r($data['instructoremail']);

                $nutritionists = new Nutritionist;
                // print_r($instructors);
                $arr3['email'] = $nutritionistemails;
                // print_r($arr3['email']);
                $nutridetails = $nutritionists->where($arr3);
                $nutrinames = $nutridetails[0]->name;
                // print_r($instrnames);
                // print_r($instrdetails);
                // print_r($instructors->where($arr3));
                array_push($nutrinamelist, $nutrinames);
            }

            $data['nutritionistlist'] = $nutrinamelist;

            // print_r($instrnamelist);
            // print_r($data['instructorlist']);

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $selectedNutritionist = $_POST['selectedName'];
                // print_r($selectedInstructor);
                echo "Selected Name: " . $selectedNutritionist;
            }

            // $selectedInstructor = $_POST['selectedName'];
            // print_r($selectedInstructor);
            


            $this->view('Appointments/scheduleNutriAppointReq', $data);
        }

}