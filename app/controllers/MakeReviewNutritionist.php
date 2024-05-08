<?php

class MakeReviewNutritionist{
    use Controller;
        public function index() {
            $data = [];

            $user = new User;
            $arr1['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr1);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;

            $meeting = new Nutritionistschedule;
            $arr2['memberemail'] = $_SESSION['email'];
            $meetingdeets = $meeting->where($arr2);
            // print_r($meetingdeets);
            $nutritionistemail = $meetingdeets[0]->nutritionistemail;

            $user = new User;
            $arr3['email'] = $nutritionistemail;
            $nutritionistdeets = $user->first($arr3);
            // print_r($instructordeets);
            $data['nutritionistfirstname'] = $nutritionistdeets->name;
            $data['nutritionistlastname'] = $nutritionistdeets->lastname;
            
            // $regmembers = new Registeredmembers;
            // $arr['memberemail'] = $_SESSION['email'];
            // $memberdetails = $regmembers->where($arr);
            // $gymname = $memberdetails[0]->gymname;
            // $data['gymname'] = $gymname;
            // print_r($data);

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $review = new Membernutrifeedback; // table content -> instructorID, timeSlot


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


            $this->view('Member/makereviewnutritionist', $data);
        }
}