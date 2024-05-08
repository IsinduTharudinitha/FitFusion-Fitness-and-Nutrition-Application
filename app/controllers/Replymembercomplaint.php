<?php

class Replymembercomplaint{
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
            // foreach($complaintsdata as $complaint){
            //     $arr1['memberemail'] =$complaint->memberemail;
            //     $reg_mem=$reg_members->where($arr1);
            //     $gymname=$reg_mem[0]->gymname;
            //     $arr2['gymName']=$gymname;
            //    // print_r($arr2);
            //     $gymdata=$gym->first($arr2);
            //     //print_r($gymdata);
            //     $mngemail=$gymdata->manageremail;
            //     //print_r($mngemail);
            //     if($_SESSION['email']==$mngemail){
            //         //print_r($complaint);
            //         $data[$i]=$complaint;
            //     }
            //     $i=$i+1;
            //     $gymdata="aa";
            // }
           // print_r($data);
           
            /////////////////////////////////////
            // if(isset($_GET['deleteid'])){
            //     $idd=$_GET['deleteid'];

            //     //$s=$usertable->deletecomplaint($idd);
            //     redirect('complaintc');
            // }
            // ////////////////////////////////

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                

                //$arr3['reply']=$_POST['reply'];
                if(isset($_POST['id'])){
                $complaints->update($_POST['id'],$_POST);
                redirect('handlemembercomplaint');
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
                   // redirect('handlemembercomplaint');
                }
            }
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['deleteid'])){
                    $idd=$_POST['deleteid'];
                   // print_r($data);
                    $s=$complaints->delete($idd);
                    redirect('handlemembercomplaint');
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
    
            $this->view('replymembercomplaint', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}