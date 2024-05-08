<?php

class Newmemberspdf{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
                
             }

             $data = [];
            

             //print('hey');
            $gym=new Gym;
            $members=new Registeredmembers;
            $arr1['manageremail']=$_SESSION['email'];
            $gymdata=$gym->first($arr1);
            $gymname=$gymdata->gymName;
            $arr2['gymname']=$gymname;
            $membersdata=$members->where($arr2);

            if ($_SERVER['REQUEST_METHOD']=='GET'){
                $startdate=$_GET['startdate'];
                $enddate=$_GET['enddate'];

                $i=0;
                foreach($membersdata as $mem){
                    if($mem->registereddate<=$enddate &&$mem->registereddate>=$startdate){
                        $data[$i]=$mem; 
                        $i++;
                    }
                }
            }
            
            
            //print_r($membersdata);
           
            
            
          
            $this->view('newmemberspdf',$data);
            
    
            
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}