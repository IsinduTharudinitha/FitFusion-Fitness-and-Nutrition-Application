<?php

class Assignworkout{
    use Controller;
        public function index() {
            $data=[];
            $regins=new Registeredinstructor;
            $gym=new Gym;
            $regmems=new Registeredmembers;

            $arr1['instructoremail']=$_SESSION['email'];
            $instructor=$regins->where($arr1);
            // print_r($instructor);
            $manageremail=$instructor[0]->manageremail;
            $arr2['manageremail']=$manageremail;

            $gymdetail=$gym->where($arr2);
            $gymname=$gymdetail[0]->gymName;

            $arr3['gymName']=$gymname;
            $mememails=$regmems->where($arr3);
            // print_r($mememails);
            $data['mememail']=$mememails;

            if ($_SERVER['REQUEST_METHOD']=='GET') {
                $data['id']=$_GET['id'];
                $data['mememail']=$mememails;

            }



            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $arr4['workoutid']=$_POST['id'];
                $regmems->update($_POST['emailOption'],$arr4,'memberemail');
                //print_r($_POST);
            }



            $this->view('assignworkout', $data);
        }
}