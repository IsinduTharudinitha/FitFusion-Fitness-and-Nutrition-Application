<?php

class Appliedinstructors{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            $instructordetails = new Instructordetails;
            $instructordata=$instructordetails->findAll();
            //print_r($complaints);
            $i=0;
            foreach($instructordata as $instructor){
                if($_SESSION['email']==$instructor->memail){
                    $data[$i]=$instructor;
                    $i=$i+1;
                }
                
            }
            //print_r($data);
          

            
    
            $this->view('appliedinstructors', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}