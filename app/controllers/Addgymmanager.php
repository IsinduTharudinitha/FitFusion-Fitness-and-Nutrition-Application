<?php

class Addgymmanager {
    use Controller;

    public function index() {
        $data = [];
        $user = new Gymmanager;
        $usertable = new User;
        $data = $user->findAll();
        if($data==false){
            $data = [];
        }

        if(isset($_GET['deletemanager'])) {
            $email = $_GET['deletemanager'];
            $user->deleteByEmail($email);
            $usertable->deleteByEmail($email);
            redirect('addgymmanager');
        }
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            if($user->validate($_POST) && $usertable->unique($_POST)){
                    $user->insert($_POST);
                    $usertable->insert($_POST);
                    $data = $user->findAll();
            }
    
            $data['errors'] = $user->errors;
            redirect('addgymmanager');
        }

        $this->view('addgymmanager', $data);
    }
}