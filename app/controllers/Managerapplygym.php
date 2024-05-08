<?php

class Managerapplygym {
    use Controller;

    public function index() {
        $data = [];
        $regmanager=new Registeredmanager;
 
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {
           // var_dump($_FILES);

            //insert  to instructor detail table
           $arr1['gymname']=$_POST['gymname'];
           $arr1['gymemail']=$_POST['gymemail'];
           $arr1['managername']=$_POST['managername'];
           $arr1['manageremail']=$_POST['manageremail'];
           $arr1['gymaddress']=$_POST['gymaddress'];

            //insert ceratificaets
        
            $file_name = $_FILES['pdf_file']['name'];
            $file_size = $_FILES['pdf_file']['size'];
            $error = $_FILES['pdf_file']['error'];
            $tmp_name = $_FILES['pdf_file']['tmp_name'];

                    
          
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

                            

                            $file_upload_path='C:/xa/htdocs/FitFusion/public/assets/gymlicenses/'.$new_file_name;
                            move_uploaded_file($tmp_name,$file_upload_path);

                           
                            $arr1['businesslicense']=$new_file_name;
                            //print_r($gymimagesArr);
                            $regmanager->insert($arr1);


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
            



            //////////////////////////
            ///////////////////////////

            
           
        }

        

       
        $this->view('managerapplygym',$data);
    }

   
}