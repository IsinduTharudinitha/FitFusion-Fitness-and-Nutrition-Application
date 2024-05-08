<?php

class Nutrifeed{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            $feedbacktable = new Membernutrifeedback ;////////////////////////////////
        
            $feedbacks = $feedbacktable->where(['nutritionistemail'=> $_SESSION['email']]);
            if(!empty($feedbacks)){
                foreach($feedbacks as $feedback){
                    $data[] = $feedback;
                }
            }
           

           
            $this->view('nutrifeed', $data);

           
          
            if(!isset($data['errors'])){
                $data['errors']='';
            }
           
 
        }
        public function  feedback(){
            //$id=$_POST['id'];
            //$data = json_decode(file_get_contents('php://input'), true);
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $feedbacktable = new Membernutrifeedback ;//////////////
                $arr2['id']=$_POST['i'];
                $fd = $feedbacktable->where($arr2);
                $arr['feedback']=$fd[0]->feedback;
                echo json_encode($fd[0]->feedback);
            }
            
            
            //print_r($fd);
            
            // exit();


        }
   

    
}