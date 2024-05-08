<?php

class Members{
    use Controller;


        public function index() {


            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            $membertable = new Registeredmembers ;

               
                // $temp=$usertable->first($arr);
               
                // if($_SESSION['email']==$temp->manageremail){
                //     $data['id']=$temp->id;
                //     $data['failure']=$temp->failure;
                //     $data['notes']=$temp->notes;
                   
                //      print_r($data);

                //     $this->view('reportfailure', $data);
                // }
                // else{
                //     echo "UNAUTHORIZED ACCESS";
                // }
                
                

        
            $members = $membertable->findAll();
            
            
            foreach($members as $member){
                //  $data['id'] = $idd;
                $data[] = $member;
            }

           $data['workoutid']=$_GET['planid'];
            $this->view('members', $data);

           
          
            if(!isset($data['errors'])){
                $data['errors']='';
            }
           
 
        }


        public function assign(){
            if(isset($_GET['workoutid'])){
                echo '<script>alert("assigned!!");</script>';
              
                $idd['workoutid']=$_GET['workoutid'];
            $arr['workoutid']=$_GET['workoutid'];
               $mem= new Registeredmembers;
               
               $mem->update($_GET['memberid'],$arr);

        }
   
}

}