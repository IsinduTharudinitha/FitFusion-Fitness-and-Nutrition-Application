<?php

class Addgym {
    use Controller;
 
    public function index() {
        if(!isset($_SESSION['email'])){
            redirect('login');
         }
        $data = [];

        $gyms = new Gym;
        $facilities=new Facilities;
        $addres=new Address;
        $openhours=new Openhours;
        $gymimages=new Gymimages;
        $notifications=new Managernotifications;

        if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES['images'])){


            $data1=[];
            $facility=[];
            $addressArr=[];
            $openhoursArr=[];
            $gymimagesArr=[];

            //print_r($_POST);
            $data1['gymName']=$_POST['gymName'];
            $data1['email']=$_POST['email'];
            $data1['description']=$_POST['description'];
            $data1['manageremail']=$_POST['manageremail'];
        
            if($gyms->validate($data1) && $gyms->unique($data1)){
                $gyms->insert($data1);
                //redirect('gymmanagerdash');
            }
            //insert facilities to the table
            $temp=["wifi","carparking","washrooms","changingrooms","locker","water","ac"];
            foreach($temp as $x){
                if(isset($_POST[$x])){
                    $facility['gymName']=$_POST['gymName'];
                    $facility['facility']=$_POST[$x];
                    //print_r($facility);
                    $facilities->insert($facility);
                    unset($facility['facility']);
                        
                }
            }

            //insert gym address
            $temp2=["location1","location2","location3"];
            $data2['gymName']=$_POST['gymName'];
            if($addres->unique($data2)){
                $addressArr['gymName']=$_POST['gymName'];
                foreach($temp2 as $x){
                    if(isset($_POST[$x])){
                        $addressArr[$x]=$_POST[$x];               
                    }
                }
                $addres->insert($addressArr);  
                //redirect('gymmanagerdash');
            }

            //insert gym open hours
            $temp3=["openhourswf","openhourswt","openhourssaf","openhourssat","openhourssuf","openhourssut"];
            $data3['gymName']=$_POST['gymName'];
            if($openhours->unique($data3)){
                    $openhoursArr['gymName']=$_POST['gymName'];
                    foreach($temp3 as $x){
                        if(isset($_POST[$x])){
                            $openhoursArr[$x]=$_POST[$x];                      
                        }
                    }
                    $openhours->insert($openhoursArr);
                
                //redirect('gymmanagerdash');
            }
            //insert notifications
            $notificationsdata['manageremail']=$_POST['manageremail'];
            $notificationsdata['nsub']="Insert Packages";
            $notificationsdata['nmsg']="Please insert your gym packages details.";
            $notifications->insert($notificationsdata);

            $notificationsdata['manageremail']=$_POST['manageremail'];
            $notificationsdata['nsub']="Insert Machines";
            $notificationsdata['nmsg']="Please insert your gym machines details.";
            $notifications->insert($notificationsdata);

            //insert gym images///////////////////////////////////////////////////////
            //print_r($_FILES);  
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $img_name = $_FILES['images']['name'][$key];
                $img_size = $_FILES['images']['size'][$key];
                $error = $_FILES['images']['error'][$key];
                $tmp_name = $_FILES['images']['tmp_name'][$key];

                    
          
            //print_r($_FILES);
                if($error===0){
                    if($img_size>125000){
                        $em="Sorry, your file is too large.";
                        //header("Location: index.php?error=$em");
                    }else{
                        $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                        $img_ex_lc=strtolower($img_ex);
            
                        $allowed_exs=array("jpg","jpeg","png");
            
                        if(in_array($img_ex_lc,$allowed_exs)){
                            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;

                            

                            $img_upload_path='C:/xa/htdocs/FitFusion/public/assets/uploadgymimages/'.$new_img_name;
                            move_uploaded_file($tmp_name,$img_upload_path);

                            $gymimagesArr['manageremail']=$_POST['manageremail'];
                            $gymimagesArr['image_url']=$new_img_name;
                            //print_r($gymimagesArr);
                            $gymimages->insert($gymimagesArr);


                            //redirect('gymmanagerdash');
            
                            //$sql="INSERT INTO images(image_url)VALUES('$new_img_name')";
                            //mysqli_query($conn,$sql);
                            //header("Location:view.php");
                        }
                        else{
                            $em="You can't upload files of this type";
                        // header("Location:index.php?error=$em");
                        }
                    }
                }
                else{
                    $em="unknown error occurred!";
                    //header("Location:index.php?error=$em");
                }
            }

            ///////////////////////////////////////////////////////////////////////////
          
    
            $data['errors'] = $gyms->errors;
            redirect('managerdash');
        }

        $this->view('addgym');
    }

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}