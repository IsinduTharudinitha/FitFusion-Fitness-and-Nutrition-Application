<?php

class Highmemberday{
    use Controller;

   
       

        public function index() {

            $att=new Memberattendance;
            if(!isset($_SESSION['email'])){
                redirect('login');
             }
            
            $data = [];
           
        
            //print_r($data);
            if ($_SERVER['REQUEST_METHOD']=='GET'){
               
                $data['startdate']=$_GET['startdate'];                 
                $data['enddate']=$_GET['enddate'];      
                

                $start_date = $_GET['startdate']; // YYYY-MM-DD format
                $end_date = $_GET['enddate'];   // YYYY-MM-DD format

                // Initialize an array to store the count of each weekday
                $weekday_count = array(
                    'Sunday' => 0,
                    'Monday' => 0,
                    'Tuesday' => 0,
                    'Wednesday' => 0,
                    'Thursday' => 0,
                    'Friday' => 0,
                    'Saturday' => 0
                );

                // Loop through each date in the time period
                $current_date = $start_date;
                while (strtotime($current_date) <= strtotime($end_date)) {
                    // Get the day of the week for the current date
                    $weekday = date('l', strtotime($current_date));
                    
                    // Increment the count for the corresponding weekday
                    $weekday_count[$weekday]++;
                    
                    // Move to the next day
                    $current_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
                }
                $noofmemweekday=$att->popularDays($_SESSION['email'],$_GET['startdate'],$_GET['enddate']);
                $finalarr=[];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $arr=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                foreach($arr as $x){
                    if(isset($noofmemweekday[$x])){
                        $finalarr[$x]=$noofmemweekday[$x]/$weekday_count[$x];
                    }
                    else{
                        $noofmemweekday[$x]=0;
                        $finalarr[$x]=0;
                    }
                }

                
                // print_r($weekday_count);
                // print_r($noofmemweekday);
                // print_r($finalarr);
                // $data=$finalarr;
                $data['noofmemweekday']=$noofmemweekday;
                $data['finalarr']=$finalarr;
                 
            }
          
            $this->view('highmemberday',$data);
            
    
            
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}