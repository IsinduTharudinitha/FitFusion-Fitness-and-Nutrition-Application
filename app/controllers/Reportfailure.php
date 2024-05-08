<?php

class Reportfailure{
    use Controller;

   
        public function index() {
            $data = [];
            $usertable = new Machinefailure;
            //$data=$usertable->findAll();
            /////////////////////////////////////
            if(isset($_GET['machineid'])){
                $idd=$_GET['machineid'];
                $data['id'] = $idd;
               
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
               
            }
            ////////////////////////////////

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
               if( !empty($_POST['failure']) && !empty($_POST['notes'])){
                    $_POST['id']=$data['id'];
                    $usertable->insert($_POST);
                    //redirect('machinefailure');
                }
                else{
                    $data['errors']='Please fill all the fields';
                }
                
                // $usertable->update($_POST['id'],$_POST);
                // redirect('machinefailure');
               // $data['errors'] = $usertable->errors;
            }
            // if($_SERVER['REQUEST_METHOD']=='GET'){
            //     if(isset($_GET['deleteid'])){
            //         $idd=$_GET['deleteid'];

            //         //$s=$usertable->delete($idd);
            //         redirect('manageresources');
            //     }
            // }
             $this->view('reportfailure', $data);
           
        }

         
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}