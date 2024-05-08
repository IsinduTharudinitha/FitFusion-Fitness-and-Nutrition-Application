<?php

class Manageresources{
    use Controller;

        
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            $usertable = new Machine;


            $arr1['manageremail'] = $_SESSION['email'];
            $data['machines']=$usertable->where($arr1);

            /////////////////////////////////////
            // if(isset($_GET['deleteid'])){
            //     $idd=$_GET['deleteid'];

            //     $arr2['id'] = $idd;
               
            //     $temp=$usertable->first($arr2);
            //     if($_SESSION['email']==$temp->manageremail)
            //     {
            //         $s=$usertable->delete($idd);
            //         redirect('manageresources');
            //     }
            //     else{
            //         echo "UNAUTHORIZED ACCESS";
            //     }
            // }
            ////////////////////////////////

            if ($_SERVER['REQUEST_METHOD']=='POST') {

                
                $arr['id']=$_POST['id'];
                if($usertable->unique($arr)  && $usertable->validate($_POST))
                {
                    // print_r($_POST);
                   
                    $usertable->insert($_POST);
                   redirect('manageresources');
                }
                else{
                    $data['errors'] = $usertable->errors;
                    $data['post']=$_POST;
                   // print_r($data);
                }
               // 

            }
            // if($_SERVER['REQUEST_METHOD']=='GET'){
            //     if(isset($_GET['deleteid'])){
            //         $idd=$_GET['deleteid'];

            //         //$s=$usertable->delete($idd);
            //         redirect('manageresources');
            //     }
            // }
            // if(!isset($data['post'])){
            //     $empty_post=['id'=>'','machineType'=>'','price'=>'','warranty'=>'','adjustability'=>''];
            //     $data['post']=$empty_post;
            // }
            if(!isset($data['errors'])){
                $data['errors']='';
            }
           

            $this->view('manageresources', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}