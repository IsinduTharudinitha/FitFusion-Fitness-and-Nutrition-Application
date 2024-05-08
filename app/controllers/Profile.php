<?php

class Profile{
    use Controller;
 


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
             $data = [];
        //     $table1 = new Memberfeedback ;
           
        //     $feedbacks = $table1->findAll();

        //     // Convert the fetched cardio plan to an associative array
        //   //  $data['cardioPlan'] = (array) $cardioPlan;

        //      $data['feedbacks'] = [];  
    
            // foreach($feedbacks as $temp){
               
            //     $data['feedbacks'][]  = [
            //         'id' => $temp->id,
            //         'name' => $temp->name,
            //         'email' => $temp->email,
            //         'feedback' => $temp->feedback
                  
            //     ];            
            // }

             $this->view('profile', $data);
          // redirect('profile');
            

            if(!isset($data['errors'])){
                $data['errors']='';
            }
           
 
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}