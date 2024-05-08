<?php

class Admincomplaints{
    use Controller;
    public function index() {

        if(!isset($_SESSION['email'])){
            redirect('login');
         }

        $data = [];
        $complaints = new Membercomplaints;

        $complaintsdata=$complaints->findAll();
        $i=0;
        foreach($complaintsdata as $complaint){
            if($complaint->type=="SYSTEM"){
                $data[$i]=$complaint;
                $i=$i+1;
            }
        }
        //print_r($data);


        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            

            //$arr3['reply']=$_POST['reply'];
            $complaints->update($_POST['id'],$_POST);
            redirect('admincomplaints');
            print_r($_POST);
           // $data['errors'] = $usertable->errors;
        }
        if($_SERVER['REQUEST_METHOD']=='GET'){
            if(isset($_GET['deleteid'])){
                $idd=$_GET['deleteid'];

                $s=$complaints->delete($idd);
                redirect('admincomplaints');
            }
        }

        $this->view('admincomplaints',$data);
    }
}