<?php

class Newmembersreport{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }
            
            $data = [];
           
        
            //print_r($data);
            if ($_SERVER['REQUEST_METHOD']=='POST'){
               
                $data['startdate']=$_POST['startdate'];                 
                $data['enddate']=$_POST['enddate'];                     
                 
            }
          
            $this->view('newmembersreport',$data);
            
    
            
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}