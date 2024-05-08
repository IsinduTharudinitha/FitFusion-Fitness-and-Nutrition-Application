<?php

class Nutritionistapplygym {
    use Controller;

    public function index() {
        $data = [];
        $insdetails=new Nutritionistdetails;
        $insbanck=new Nutritionistbanckaccount;
        $insspecialization=new Nutritionistspecialization;
        $insqualification=new Nutritionistqualification;
 
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {
           // var_dump($_FILES);

            //insert  to Nutritionist detail table
           $arr1['name']=$_POST['fullName'];
           $arr1['birthdate']=$_POST['birthdate'];
           $arr1['gender']=$_POST['gender'];
           $arr1['nemail']=$_SESSION['email'];
           $arr1['experience']=$_POST['experience'];
           $arr1['memail']=$_GET['manageremail'];
///////////////////////////////////////////////////
/////////////////////////////////////////////////            
        //    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $img_name = $_FILES['images']['name'];
                $img_size = $_FILES['images']['size'];
                $error = $_FILES['images']['error'];
                $tmp_name = $_FILES['images']['tmp_name'];

                    
            
            //print_r($_FILES);
                if($error===0){
                    if($img_size>325000){
                        $em="Sorry, your file is too large.";
                        //header("Location: index.php?error=$em");
                    }else{
                        $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                        $img_ex_lc=strtolower($img_ex);
            
                        $allowed_exs=array("jpg","jpeg","png");
            
                        if(in_array($img_ex_lc,$allowed_exs)){
                            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;

                            

                            $img_upload_path='C:/xa/htdocs/FitFusion/public/assets/uploadnutritionistimages/'.$new_img_name;
                            move_uploaded_file($tmp_name,$img_upload_path);

                            //$gymimagesArr['manageremail']=$_POST['manageremail'];
                            $arr1['imageurl']=$new_img_name;
                            //print_r($gymimagesArr);
                           // $gymimages->insert($gymimagesArr);


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
            

           $insdetails->insert($arr1);

           //insert banck details
            $arr2['nemail']=$_SESSION['email'];
            $arr2['banckname']=$_POST['banckname'];
            $arr2['accno']=$_POST['accno'];
            $insbanck->insert($arr2);

            //Nutritionist specialization

            $temp=["CNS","RDN","BCHN","CNC"];
            foreach($temp as $x){
                if(isset($_POST[$x])){
                    $specialization['nemail']=$_SESSION['email'];
                    $specialization['specialization']=$_POST[$x];
                    //print_r($specialization);
                    $insspecialization->insert($specialization);
                    unset($specialization['specialization']);
                        
                }
            }

            //insert ceratificaets
            foreach ($_FILES['pdf_file']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['pdf_file']['name'][$key];
                $file_size = $_FILES['pdf_file']['size'][$key];
                $error = $_FILES['pdf_file']['error'][$key];
                $tmp_name = $_FILES['pdf_file']['tmp_name'][$key];

                    
          
            //print_r($_FILES);
                if($error===0){
                    if($file_size>125000){
                        $em="Sorry, your file is too large.";
                        //header("Location: index.php?error=$em");
                    }else{
                        $file_ex=pathinfo($file_name,PATHINFO_EXTENSION);
                        $file_ex_lc=strtolower($file_ex);
            
                        $allowed_exs=array("pdf");
            
                        if(in_array($file_ex_lc,$allowed_exs)){
                            $new_file_name=uniqid("PDF-",true).'.'.$file_ex_lc;

                            

                            $file_upload_path='C:/xa/htdocs/FitFusion/public/assets/nutritionistcertificates/'.$new_file_name;
                            move_uploaded_file($tmp_name,$file_upload_path);

                            $certifiactes['nemail']=$_SESSION['email'];
                            $certifiactes['filename']=$new_file_name;
                            //print_r($gymimagesArr);
                            $insqualification->insert($certifiactes);


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



            //////////////////////////
            ///////////////////////////

            
           
        }

        

       
        $this->view('nutritionistapplygym',$data);
    }

   
}