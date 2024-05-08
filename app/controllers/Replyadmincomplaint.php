<?php

class Replyadmincomplaint{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            $complaints = new Membercomplaints;
            $reg_members=new Registeredmembers;
            $gym=new Gym;
            $complaintsdata=$complaints->findAll();
            //print_r($complaints);
            $i=0;


            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                

                //$arr3['reply']=$_POST['reply'];
                if(isset($_POST['id'])){
                $complaints->update($_POST['id'],$_POST);
                redirect('admincomplaints');
                //print_r($_POST);
                }
               // $data['errors'] = $usertable->errors;
            }
            if($_SERVER['REQUEST_METHOD']=='GET'){
                if(isset($_GET['deleteid'])){
                    $arr4['id']=$_GET['deleteid'];  
                    $data=$complaints->where($arr4);
                    $data['deleteid']=$_GET['deleteid'];
                    $idd=$_GET['deleteid'];
                   // print_r($data);
                   // $s=$complaints->delete($idd);
                   // redirect('admincomplaint');
                }
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['deleteid'])){
                    $idd=$_POST['deleteid'];
                   // print_r($data);
                    $s=$complaints->delete($idd);
                    redirect('admincomplaints');
                }
            }
            if($_SERVER['REQUEST_METHOD']=='GET'){
                if(isset($_GET['viewid'])){
                    $arr3['id'] =$_GET['viewid'];
                    $data=$complaints->where($arr3);
                    $data['viewid']=$_GET['viewid'];
                    //print_r($data);
            }
             }

             if($_SERVER['REQUEST_METHOD']=='GET'){
                if(isset($_GET['replyid'])){
                    $arr5['id'] =$_GET['replyid'];
                    $data=$complaints->where($arr5);
                    $data['replyid']=$_GET['replyid'];
                    //print_r($data);
            }
             }
    
            $this->view('replyadmincomplaint', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}