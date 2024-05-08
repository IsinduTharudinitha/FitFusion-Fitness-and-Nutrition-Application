<?php

class Searchnutritionists {
    use Controller;

    public function index($a = '', $b = '', $c = '') {
        // $user = new User;
        // $arr['name'] = "Mary";
        // $arr['age'] = 30;

        // $result = $user->findAll();

        // show($result);
        // show("from the index function");
        $this->view('searchnutritionists');
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}