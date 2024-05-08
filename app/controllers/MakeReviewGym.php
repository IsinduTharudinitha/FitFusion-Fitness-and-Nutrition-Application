<?php

class MakeReviewGym{
    use Controller;
        public function index() {
            $data = [];
            
            $user = new User;
            $arr1['email'] = $_SESSION['email'];
            $memberdeets = $user->first($arr1);
            $data['firstname'] = $memberdeets->name;
            $data['lastname'] = $memberdeets->lastname;

            $regmembers = new Registeredmembers;
            $arr['memberemail'] = $_SESSION['email'];
            $memberdetails = $regmembers->where($arr);
            $gymname = $memberdetails[0]->gymname;
            $data['gymname'] = $gymname;
            $gymemail = $memberdetails[0]->gymemail;
            $data['gymemail'] = $gymemail;
            // print_r($data);

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $review = new Review; // table content -> instructorID, timeSlot


                $memberemail = $_SESSION['email'];
                $reviewtype = "Gym";
                // print_r($_POST);

                $resArray = [
                    "reviewcontent" => $_POST["review"],
                    "reviewtype" => $reviewtype,
                    "typeemail" => $gymemail,
                    "memberemail" => $memberemail
                ];
                // print_r($resArray);
                // array_push($resArray,$memberemail,$reviewtype);
                // print_r($resArray);
                $review->insert($resArray);

                $data['errors'] = $review->errors;
            }


            $this->view('Member/makereviewgym', $data);
        }
}