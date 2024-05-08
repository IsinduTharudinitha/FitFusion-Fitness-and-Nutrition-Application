<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ApproveinstructorStyle.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
  </head>
  <body>
   <div class="main-container">
   <div class="side-bar-container">
            <div class="logo-tab">
                FITFUSION
            </div>
            <ul class="side-bar-content">
                
                <!-- <li class="current-side-bar-tile">
                    <div class="sb-tab-content">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                    </div>
                    <div class="sb-tab-content">
                        Dashboard
                    </div>
                </li> -->

                <a class="side-bar-tile-link" href="managerdash">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Dashboard
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="createworkoutplan">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Create Workout Plan
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="viewworkoutplans">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           View Workout Plan
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="machinefailure">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Machine Failure
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="instructormeetings">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                deployed_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                        Meetings
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="memberfeed">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                         Feedbacks
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="logout">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                        </div>
                        <div class="sb-tab-content">Logout</div>
                    </li>
                </a>

            </ul>
        </div>

    <div class="container">
    <div class="body-header">
                <div class="pfp">
                    <!-- LET THE INSTRUCTOR UPLOAD A PFP, OR KEEP A DEFAULT IMAGE -->
                    <img src="#" alt="">
                </div>
                <div class="welcome-user">
                    <!-- TODO - SHOW LOGGED IN INSTRUCTOR'S NAME -->
                    Welcome, Nutritionist
                </div>
            </div>
    <div class="containera">
    <script>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
      alert("Email sent successfully");
      <?php endif; ?>
    </script>
      <h1 class="form-title">Send Email to Member </h1>
      <form action="#" method="POST" >
        <div class="main-user-info">
          
          
        
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= isset($data['email']) ? $data['email'] : '' ?>" />

          </div>
          <div class="user-input-box">
            <label for="subject">Enter a Subject</label>
            <input type="text"
                    id="subject"
                    name="subject"
                    required
            />
          </div>
          <div class="user-input-box">
            <label for="message">Enter the Message</label>
            <textarea id="message" name="message" rows="7" cols="33" required></textarea><br>
          </div>
          
          
        </div>
        
        <div class="form-submit-btn">
          <input type="submit" value="Send Email">
        </div>
      </form>
      <?php
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
       if(isset($_POST['email']))
        {
          
        require 'C:/xa/htdocs/FitFusion/public/assets/PHPMailer/src/Exception.php';
        require 'C:/xa/htdocs/FitFusion/public/assets/PHPMailer/src/PHPMailer.php';
        require 'C:/xa/htdocs/FitFusion/public/assets/PHPMailer/src/SMTP.php';
    
        require 'C:/xa/htdocs/FitFusion/public/assets/mailconfig.php';
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];

        $mail=new PHPMailer(true);

        $mail->isSMTP();

        $mail->SMTPAuth=true;

        $mail->Host=MAILHOST;

        $mail->Username=USERNAME;

        $mail->Password=PASSWORD;

        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port=587;

        $mail->setFrom(SEND_FROM,SEND_FROM_NAME);

        $mail->addAddress($email);
        $mail->addReplyTo(REPLY_TO,REPLY_TO_NAME);

        $mail->IsHTML(true);
        $mail->Subject=$subject;
        $mail->Body=$message;
        $mail->AltBody=$message;

        if(!$mail->send()){
            //return "Email not send.Please try again";
        }else{
            //return "Success";
        }

        }
    
      
      
      ?>
    </div>
    </div>
    </div>
  </body>
</html>