<?php

class Memberfeed{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            $feedbacktable = new Memberfeedback ;
        
            $feedbacks = $feedbacktable->where(['instructoremail'=> $_SESSION['email']]);
            
            foreach($feedbacks as $feedback){
                $data[] = $feedback;
            }

           
            $this->view('memberfeed', $data);

           
          
            if(!isset($data['errors'])){
                $data['errors']='';
            }
           
 
        }
        public function  feedback(){
            //$id=$_POST['id'];
            //$data = json_decode(file_get_contents('php://input'), true);
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $feedbacktable = new Memberfeedback ;
                $arr2['id']=$_POST['i'];
                $fd = $feedbacktable->where($arr2);
                $arr['feedback']=$fd[0]->feedback;
                echo json_encode($fd[0]->feedback);
            }
            
            
            //print_r($fd);
            
            // exit();


        }
   
       

    
}