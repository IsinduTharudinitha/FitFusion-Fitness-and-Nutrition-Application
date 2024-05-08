<?php

class Viewworkoutplans{
    use Controller;
        public function index() {
            $data=[];
            $workoutplans=new Workoutplans;
           // $arr1['iemail']=$_SESSION['email'];
            $data['workouttype']=$workoutplans->selectworkouttypes($_SESSION['email']);

            if ($_SERVER['REQUEST_METHOD']=='POST') {


            }



            $this->view('viewworkoutplans', $data);
        }
        public function selectworkout(){
           // print_r($_GET);
            //print_r("hello");
            $workoutplans=new Workoutplans;
            //$arr2['iemail']=$_SESSION['email'];
            $data['workoutname']=$workoutplans->selectworkoutnames($_SESSION['email'],$_GET['selectedValue']);
            //$arr2['name']="jagath";
            //$arr2['age']=30;
            $json=json_encode($data['workoutname']);
            echo $json;
           
        }

        public function getworkoutdetails(){
            $workoutplans=new Workoutplans;
            $arr1['iemail']=$_SESSION['email'];
            $arr1['workoutname']=$_GET['selectedValue'];
            $json=json_encode($workoutplans->where($arr1));
            echo $json;
        }
}

// public function updateWorkout() {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {int 
//         // Handle the update logic here
//         // Example: Update workout details in the database

//         // Redirect back to the view after updating
//         header('Location: viewworkoutplans');
//         exit;
//     }
// }