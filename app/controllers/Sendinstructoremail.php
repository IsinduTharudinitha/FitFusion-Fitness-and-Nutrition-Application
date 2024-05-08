<?php

class Sendinstructoremail{
    use Controller;

    

       
   // C:\xa\htdocs\FitFusion\public\assets\fpdf\fpdf.php
        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            
            

            

           
          
            $this->view('sendinstructoremail',$_POST);
            
    
            
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}