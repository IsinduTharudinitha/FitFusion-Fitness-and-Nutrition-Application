<?php

class Approvemanager{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
           $regmanager=new Registeredmanager;

            

            if(isset($_GET['manageremail'])){
                $arr['manageremail']=$_GET['manageremail'];
                $managerdata=$regmanager->first($arr);
       
                $data[0]=$managerdata;

                

             
                //$data="";
                //$data=$instructordata;
                //print_r($data);
                $this->view('approvemanager',$data);
                



            }
            //print_r($data);
          

            
    
            
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}