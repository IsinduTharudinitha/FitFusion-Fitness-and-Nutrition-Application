<?php

class Sendmemberemail{
    use Controller;

    

       
   // C:\xa\htdocs\FitFusion\public\assets\fpdf\fpdf.php
        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            $meetingtable = new Instructormeeting ;


            if(isset($_GET['email'])){
                $email=$_GET['email'];
               // echo "Email: " . $email; // Add this line for debugging
                $data['email'] = $email;
            }
            
            
            
    
            if ($_SERVER['REQUEST_METHOD']=='GET') {
                if(isset($_GET['status'])){
                    if($_GET['status']=="cancel"){
                        $id = $_GET['id'];
                        $arr['status'] = 'Cancelled';
                        $meetingtable->update($id, $arr);
                    }
                }

             }
            

           
          
            $this->view('sendmemberemail',$data);
            
    
            
        }
   
        
    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}