<?php

class Viewnutritionistapplication{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            if(isset($_GET['filename'])){
                $data['filename']=$_GET['filename'];
            }
            //print_r($data);
          

            
    
            $this->view('viewnutritionistapplication', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}