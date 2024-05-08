<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Signup {
    use Controller;

    public function index() {
        if(isset($_SESSION['email'])){
            // Redirect based on usertype
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
                redirect('gymmanagerdash');
                die();
            } else if($_SESSION['usertype']=="gymowner") {
                redirect('gymownerdash');
                die();
            } else if($_SESSION['usertype']=="admin") {
                redirect('admindash');
                die();
            }
        }
        
        $data = [];


        
        // Handle OTP verification and user insertion
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            if(isset($_POST['otp'])) {
                $otptbl = new Otp;
                $arr['email'] = $_POST['semail'];
                $otpdata = $otptbl->first($arr);
                // print_r($_POST);
                // print_r($otpdata);
                
                if(property_exists($otpdata, 'email')) {
                    if($otpdata->otpcode == $_POST['otp']) {
                        $arr2['name'] = $otpdata->name;
                        $arr2['lastname'] = $otpdata->lastname;
                        $arr2['email'] = $otpdata->email;
                        $arr2['password'] = $otpdata->password;
                        $arr2['usertype'] = $otpdata->usertype;
                        $user=new User;
                        $user->insert($arr2);
                       // print_r("hello isde confirmtion");
                       redirect('login');
                    } else {
                        $data['errors'] = "Incorrect OTP Code";
                    }
                }
            }
        }

        $this->view('Main/signup', $data);
    }

    public function submitform(){
            
            $_POST[] = json_decode(file_get_contents("php://input"), true);
            // If OTP is not set, handle signup process
            if(!isset($_POST['otp'])) {
                // print_r("hello");
                // print_r($_POST);
                
                //$user = new User;
                // Validate user input (currently set to always true)
                if(true) {
                    if($_POST['password']==$_POST['passwordConfirm']) {
                        $enc_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $_POST['usertype'] = "member";
                        $_POST['password'] = $enc_password;
                        $_POST['passwordConfirm'] = $enc_password;
                        $randomCode = rand(10000, 99999);
                        $_POST['otpcode'] = $randomCode;
                        $otptbl = new Otp;
                        $data['email'] = $_POST['email'];
                        $otptbl->insert($_POST);

                        // // Send OTP email
                        // require 'C:/xa/htdocs/FitFusion/public/assets/PHPMailer/src/Exception.php';
                        // require 'C:/xa/htdocs/FitFusion/public/assets/PHPMailer/src/PHPMailer.php';
                        // require 'C:/xa/htdocs/FitFusion/public/assets/PHPMailer/src/SMTP.php';
                        // require 'C:/xa/htdocs/FitFusion/public/assets/mailconfig.php';

                        // Send OTP email
                        require 'C:/wamp64/www/FitFusion/public/assets/PHPMailer/src/Exception.php';
                        require 'C:/wamp64/www/FitFusion/public/assets/PHPMailer/src/PHPMailer.php';
                        require 'C:/wamp64/www/FitFusion/public/assets/PHPMailer/src/SMTP.php';
                        require 'C:/wamp64/www/FitFusion/public/assets/mailconfig.php';
                        
                        $email = $_POST['email'];
                        $subject = "OTP Verification Email";
                        $message = $randomCode;
            
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Host = MAILHOST;
                        $mail->Username = USERNAME;
                        $mail->Password = PASSWORD;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;
                        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
                        $mail->addAddress($email);
                        $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
                        $mail->IsHTML(true);
                        $mail->Subject = $subject;
                        $mail->Body = $message;
                        $mail->AltBody = $message;
            
                        if(!$mail->send()) {
                           // print_r("email not sent");
                        } else {
                           // print_r("email sent");
                        }
                    }
                }
                //$data['errors'] = $user->errors;
            }
            $arr3['email']=$_POST['email'];
            $json=json_encode($arr3);
            echo $json;
            exit();
    }
}
?>
