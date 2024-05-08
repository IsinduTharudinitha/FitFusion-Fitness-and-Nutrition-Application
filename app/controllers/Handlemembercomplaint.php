<?php

class Handlemembercomplaint{
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
            if(!empty($complaintsdata) ){
                foreach($complaintsdata as $complaint){
                    $arr1['memberemail'] =$complaint->memberemail;
                    $reg_mem=$reg_members->where($arr1);
                    $gymname=$reg_mem[0]->gymname;
                    $arr2['gymName']=$gymname;
                   // print_r($arr2);
                    $gymdata=$gym->first($arr2);
                    //print_r($gymdata);
                    $mngemail=$gymdata->manageremail;
                    //print_r($mngemail);
                    if($_SESSION['email']==$mngemail){
                        //print_r($complaint);
                        $data[$i]=$complaint;
                    }
                    $i=$i+1;
                    $gymdata="aa";
                }
            }

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
                $complaints->update($_POST['id'],$_POST);
                redirect('handlemembercomplaint');
                print_r($_POST);
               // $data['errors'] = $usertable->errors;
            }
            if($_SERVER['REQUEST_METHOD']=='GET'){
                if(isset($_GET['deleteid'])){
                    $idd=$_GET['deleteid'];

                    $s=$complaints->delete($idd);
                    redirect('handlemembercomplaint');
                }
            }
    
            $this->view('handlemembercomplaint', $data);
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}