<?php

class Getfeedback{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            
        
            
 
        }
       
}