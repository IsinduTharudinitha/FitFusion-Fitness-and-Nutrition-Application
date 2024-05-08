<?php

class Nutritionistunavailable{
    use Controller;

        
       

        public function index() {
            

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            



            $arr1['manageremail'] = $_SESSION['email'];

            if ($_SERVER['REQUEST_METHOD']=='POST') {

  

            }

            if(!isset($data['errors'])){
                $data['errors']='';
            }
           

            $this->view('nutritionistunavailable', $data);
        }
   
        public function submitslots(){
            $nutrischedule = new Nutritionistschedule;
            $postData = json_decode(file_get_contents("php://input"), true);
            //print_r($postData);
            foreach($postData['timeslots'] as $x){
                $arr['nutritionistemail']=$_SESSION['email'];
                $arr['date']=$postData['date'];
                $arr['status']="Unavailable";
                $arr['timeslot']=$x;
                $nutrischedule->insert($arr);
            }
            //$data['workoutname']=$postData['date'];
            // if ($_SERVER['REQUEST_METHOD']=='POST') {
            //     $data['h']="hello jaga";
            //     $json=json_encode($data);
            //     echo $json;
  

            // }
            
           
            // $arr['instructoremail']=$_SESSION['email'];
            // $arr['date']="2021-01-09";
            // $arr['timeslot']="09:00AM";
            // $arr['memberemail']="hhhh";
            // $arr['membername']="gjj";
            // $arr['memberage']=9;
            // $arr['goal']="dkdk";
            // $arr['illness']="ddjd";
            // // $arr['status']="skksk"
            // $arr['status']="Unavailable";
            // $instrschedule->insert($arr);
           // exit();
        }
}