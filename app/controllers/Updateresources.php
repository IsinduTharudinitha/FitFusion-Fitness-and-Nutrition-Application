<?php

class Updateresources{
    use Controller;

   
       

        public function index() {
            $data = [];
            $usertable = new Machine;
            //$data=$usertable->findAll();
            /////////////////////////////////////
            if(isset($_GET['updateid'])){
                $idd=$_GET['updateid'];
                $arr['id'] = $idd;
               
                $temp=$usertable->first($arr);
                if($_SESSION['email']==$temp->manageremail){
                    $data['id']=$temp->id;
                    $data['machineType']=$temp->machineType;
                    $data['price']=$temp->price;
                    $data['warranty']=$temp->warranty;
                    $data['adjustability']=$temp->adjustability;
                    
                }
                else{
                    echo "UNAUTHORIZED ACCESS";
                }
              
                //redirect('manageresources');
            }
            ////////////////////////////////

            if ($_SERVER['REQUEST_METHOD']=='POST') {
                
                $usertable->update($_POST['id'],$_POST);
                redirect('manageresources');
                die();
               // $data['errors'] = $usertable->errors;
            }
            // if($_SERVER['REQUEST_METHOD']=='GET'){
            //     if(isset($_GET['deleteid'])){
            //         $idd=$_GET['deleteid'];

            //         //$s=$usertable->delete($idd);
            //         redirect('manageresources');
            //     }
            // }
            $this->view('updateresources', $data);
           
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}