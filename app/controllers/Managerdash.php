<?php

class Managerdash {
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
        $gym=new Gym;
        $regmems=new Registeredmembers;
        $regnutri=new Registerednutritionist;
        $regins=new Registeredinstructor;
        $package=new Package;

        $arr1['manageremail']=$_SESSION['email'];
        $gymdata=$gym->where($arr1);
        $gymname=$gymdata[0]->gymName;
        $arr2['gymname']=$gymname;
        $regmemsdata=$regmems->where($arr2);
        if(!empty($regmemsdata)){
            $membercount=count($regmemsdata);
            $data['regmems']=$membercount;

        //find package details
        $pckarr=[];
        $count=0;
        foreach($regmemsdata as $x){
            $arr4['id']=$x->packageid;
            $packagedata=$package->where($arr4);
            
            $pckarr[$count]['memberemail']=$x->memberemail;
            $pckarr[$count]['registereddate']=$x->registereddate;
            $pckarr[$count]['packagetype']=$packagedata[0]->packagetype;
            $pckarr[$count]['packagegroup']=$packagedata[0]->packagegroup;
            $pckarr[$count]['amount']=$packagedata[0]->amount;

            $count++;

        }

        }
        else{
            $data['regmems']="No members yet";
        }
      
        $arr3['manageremail']=$_SESSION['email'];
        $reginsdata=$regins->where($arr3);
        if(!empty($reginsdata)){
            $inscount=count($reginsdata);
            $data['regins']=$inscount;
        }
        else{
            $data['regins']="No Instructors yet";
        }

        $regnutridata=$regnutri->where($arr3);
        if(!empty($regnutridata)){
            $nutricount=count($regnutridata);
            $data['regnutri']=$nutricount;
        }
        else{
            $data['regnutri']="No Nutritionist yet";
        }

        
       // $regnutricount=count($regnutri->where($arr3));



         
        // $arr['age'] = 30;

        // $result = $user->findAll();

        // show($result);
        // show("from the index function");
        $data['package']=$pckarr;
        //print_r($pckarr);
        $this->view('Manager/managerdash',$data);
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