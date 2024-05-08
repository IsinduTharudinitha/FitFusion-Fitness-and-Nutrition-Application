<?php

class Admindash {
    use Controller;

    public function index() {
        $data = [];
        $user = new Gymmanager;
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $usertable = new User;

            if($user->validate($_POST) && $usertable->unique($_POST)){
                    $user->insert($_POST);
                    $usertable->insert($_POST);
            }
    
            $data['errors'] = $user->errors;
            $data = $user->findAll();
        }

        if(isset($_POST['callDelete'])) {

        }

        // public function index() {
        //     $data = [];
        //     $usertable = new Machine;
        //     $data=$usertable->findAll();
        //     if ($_SERVER['REQUEST_METHOD']=='POST') {
                
               
                
        //         $usertable->insert($_POST);
        //         redirect('manageresources');
        //        // $data['errors'] = $usertable->errors;
        //     }
    
        //     $this->view('manageresources', $data);
        // }
        $this->view('admindash',$data);
    }

    public function deleteUser() {
        echo "Inside function";
    }
}