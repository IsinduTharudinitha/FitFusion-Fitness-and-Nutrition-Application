<?php

class MakeReviewInstructor{
    use Controller;
        public function index() {
            $data = [];

            $user = new User;
            $arr1['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr1);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;

            $meeting = new InstrSchedule;
            $arr2['memberemail'] = $_SESSION['email'];
            $meetingdeets = $meeting->where($arr2);
            // print_r($meetingdeets);
            $instructoremail = $meetingdeets[0]->instructoremail;

            $user = new User;
            $arr3['email'] = $instructoremail;
            $instructordeets = $user->first($arr3);
            // print_r($instructordeets);
            $data['instructorfirstname'] = $instructordeets->name;
            $data['instructorlastname'] = $instructordeets->lastname;
            
            // $regmembers = new Registeredmembers;
            // $arr['memberemail'] = $_SESSION['email'];
            // $memberdetails = $regmembers->where($arr);
            // $gymname = $memberdetails[0]->gymname;
            // $data['gymname'] = $gymname;
            // print_r($data);

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $review = new Memberfeedback; // table content -> instructorID, timeSlot


                $memberemail = $_SESSION['email'];
                
                // print_r($_POST);

                $resArray = [
                    "name" => $data['firstname'],
                    "email" => $memberemail,
                    "feedback" => $_POST['review']
                ];
                // print_r($resArray);
                // array_push($resArray,$memberemail,$reviewtype);
                // print_r($resArray);
                $review->insert($resArray);

                $data['errors'] = $review->errors;
            }


            $this->view('Member/makereviewinstructor', $data);
        }
}