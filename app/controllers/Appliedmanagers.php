<?php

class Appliedmanagers{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            $managerdetails = new Registeredmanager;
            $managerdata=$managerdetails->findAll();
            //print_r($complaints);
            $i=0;
            foreach($managerdata as $manager){
                    $data[$i]=$manager;
                    $i=$i+1;      
            }
            //print_r($data);
          

            
    
            $this->view('appliedmanagers', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}