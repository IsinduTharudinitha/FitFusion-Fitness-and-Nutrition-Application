<?php

class Gymmanagerdash {
    use Controller;

    public function index() {
        //echo "user session id =".$_SESSION['email'];
        if(isset($_SESSION['email'])){
            if($_SESSION['usertype']=="member") {
                redirect('memberdash');
                die();
            } else if($_SESSION['usertype']=="gyminstructor") {
                redirect('gyminstructordash');
                die();
            } else if($_SESSION['usertype']=="nutritionist") {
                redirect('nutritionistdash');
                die();
            } else if($_SESSION['usertype']=="gymmanager") {
              //  redirect('Manager/gymmanagerdash');
               // die();
            } else if($_SESSION['usertype']=="gymowner") {
                redirect('gymownerdash');
                die();
            } else if($_SESSION['usertype']=="admin") {
                redirect('admindash');
                die();
            }
            }
        else{
            redirect("login");
        }

        $data=[];

         
        // $arr['age'] = 30;

        // $result = $user->findAll();

        // show($result);
        // show("from the index function");
        $this->view('gymmanagerdash');
    }

    public function notification(){
        $data=[];
        $notifications = new Managernotifications;
         $arr['manageremail'] = $_SESSION['email'];
         $notificationsdata=$notifications->where($arr);
        // print("Helloo");
        // print_r($notificationsdata);
         foreach($notificationsdata as $nt){
            $arr2['nmsg']=$nt->nmsg;
            $arr2['nsub']=$nt->nsub;
            array_push($data,$arr2);

         }
         //print_r($notificationsdata);
         $notifications = array(
            array('id' => 1, 'message' => 'New message 1'),
            array('id' => 2, 'message' => 'New message 2'),
            // ... add more notifications as needed
        );

        // $data  = [
        //     'lsd'=>'adsd'
        // ];
         echo json_encode($data);
         exit();
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}