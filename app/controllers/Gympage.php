<?php

class Gympage {
    use Controller;

    public function index() {
        //echo "user session id =".$_SESSION['email'];
        if(!isset($_SESSION['email'])){
           redirect('login');
        }
        // $member = new Member;
        // $arr['name'] = "Mary";
        // $arr['age'] = 30;

        // $result = $user->findAll();

        // show($result);
        // show("from the index function");
        $this->view('gympage');
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}