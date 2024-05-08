<?php

class Workoutcategory{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
             $data = [];
            // $machines = new Machine ;
            // $registeredinstructors = new Registeredinstructor;

            // $arr1['instructoremail'] = $_SESSION['email'];
            // $data=$registeredinstructors->where($arr1);
            // // print_r($data);

            // $arr2['manageremail'] = $data[0]->manageremail;
            // // print_r($arr2);
            // $data=$machines->where($arr2);
            // // print_r($data);
           
            //redirect('workoutcategory');
            $this->view('workoutcategory', $data);

            /////////////////////////////////////
      
            ////////////////////////////////

           
            // if($_SERVER['REQUEST_METHOD']=='GET'){
            //     if(isset($_GET['machineid'])){
            //         $idd=$_GET['machineid'];
                      
            //         $arr2['id'] = $idd;
               
            //         $temp=$usertable->first($arr2);
            //         if($_SESSION['email']==$temp->instructoremail)
            //         {
                       
            //             redirect('machinefailure');
            //         }
            //         else{
            //             echo "UNAUTHORIZED ACCESS";
            //         }

            //         //$s=$usertable->delete($idd);
                   
            //     }
            // // }
          
            // if(!isset($data['errors'])){
            //     $data['errors']='';
            // }
           
 
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}