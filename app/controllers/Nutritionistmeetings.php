<?php

class Nutritionistmeetings{
    use Controller;


        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
            }
            
            $data = [];
            $meetingtable = new Nutritionistschedule;

            $meetingrequests = $meetingtable->where(['nutritionistemail' => $_SESSION['email']]);
  
            foreach($meetingrequests as $request){
                if($request->memberemail!=''){
                    $data[] = $request;
                }
               
            }

           
            $this->view('nutritionistmeetings', $data);

           
          
            if(!isset($data['errors'])){
                $data['errors']='';
            }
            
             
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Get the ID of the row to update
                $id = $_POST['idd'];
                $arr['status'] = 'Done';
                $meetingtable->update($id, $arr);
        
             }
          

 
        }

 
        
       
        
       
    }