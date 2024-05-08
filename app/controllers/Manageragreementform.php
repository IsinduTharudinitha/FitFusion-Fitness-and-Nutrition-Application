<?php

class Manageragreementform{
    use Controller;

   
       

        public function index() {

            if(!isset($_SESSION['email'])){
                redirect('login');
             }

            $data = [];
            $managerdetails = new Registeredmanager;
            $mngagr=new Manageragreement;
            $user=new User;
            

            

            if(isset($_GET['instructorid'])){
                $data['manageremail']=$_GET['instructorid'];
        
            }
            //print_r($data);
            if ($_SERVER['REQUEST_METHOD']=='POST'){

                // $arr['id']=$_POST['manageremail'];
                // $managerdata=$managerdetails->first($arr);
                // $email=$managerdata->iemail;
                // $_POST['iemail']=$email;
                $arr['manageremail']=$_POST['manageremail'];
                $managerdata=$managerdetails->first($arr);
                //print_r($instructordata);
                $email=$managerdata->manageremail;

                //add new user
                $arr3['name']=$managerdata->managername;
                $arr3['lastname']="kaml";
                $arr3['email']=$email;
                $arr3['password']= password_hash($_POST['pwd'], PASSWORD_DEFAULT);
                $arr3['usertype']="gymmanager";
                if($user->unique($arr3)){
                    $user->insert($arr3);
                }
                else{
                    $data['errors']="Email already exist";
                }
                

                

                $_POST['iemail']=$email;
                

                //upload agreement pdf 
                $targetDir="C:/xa/htdocs/FitFusion/public/assets/manageragreement/";
                $targetfile=$targetDir.basename($_FILES["pdfFile"]["name"]);
                $filetype=strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));

                if($filetype!="pdf" || $_FILES["pdfFile"]["size"]>2000000){
                    echo "Error: Only PDF files less than 2 MB are allowed to upload";
                }
                else{
                    if(move_uploaded_file($_FILES["pdfFile"]["tmp_name"],$targetfile)){
                        $filename=$_FILES["pdfFile"]["name"];
                        $folder_path=$targetDir;
                        
                        $_POST['agreementurl']=$filename;
                    }
                    else{
                        echo "Error uploading file";
                    }
                }
                
                
                if($mngagr->unique($_POST)){
                    $arr2['registered']=true;
                    $managerdetails->update($_POST['manageremail'],$arr2,'manageremail');

                    //////////////////////////

                    //unset($_POST['managerid']);
                    $mngagr->insert($_POST);
                    redirect("appliedmanagers");

                    
                    
                    //print_r($_POST);
                }
                
            }
          
            $this->view('manageragreementform',$data);
            
    
            
        }
   

    // public function edit($a = '', $b = '', $c = '') {
    //     show("from the edit function");
    //     $this->view('home');
    // }
}