<?php

class Viewqrcode {
    use Controller;

    public function index() {
        $data = [];
        if(isset($_SESSION['email'])){
            if($_SESSION['usertype']=="member") {
                // redirect('memberdash');
                // die();
            } else if($_SESSION['usertype']=="gyminstructor") {
                redirect('gyminstructordash');
                die();
            } else if($_SESSION['usertype']=="nutritionist") {
                redirect('nutritionistdash');
                die();
            } else if($_SESSION['usertype']=="gymmanager") {
               redirect('gymmanagerdash');
               die();
            } else if($_SESSION['usertype']=="gymowner") {
                redirect('gymownerdash');
                die();
            } else if($_SESSION['usertype']=="admin") {
                redirect('admindash');
                die();
            }
            }
        else{
            redirect("login");
        }

        $user = new User;
        $arr2['email'] = $_SESSION['email'];
        $memberdeets = $user->first($arr2);

        $data['firstname'] = $memberdeets->name;
        $data['lastname'] = $memberdeets->lastname;

        $registeredMember = new Registeredmembers;
        $array3['memberemail'] = $_SESSION['email'];
        $member = $registeredMember->first($array3);
        $code = $member->generatedcode;

        $data['code'] = $code;



      

        $this->view('Member/viewqrcode', $data);
    }

   
}