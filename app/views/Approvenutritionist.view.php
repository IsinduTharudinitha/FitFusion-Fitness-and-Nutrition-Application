<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
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
                            Gym
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="newmembersreport">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Reports
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="manageresources">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Machines
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="packages">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                deployed_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Packages
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="appliedinstructors">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Instructors
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="appliednutritionists">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Nutritionists
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="attendancememberlist">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                qr_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Assign QR
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="markattendance">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                person_add
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Attendance
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="handlemembercomplaint">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                report
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Complaint Handling
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
                    Welcome, Manager
                </div>
            </div>
    <div class="containera">
      <h1 class="form-title">Nutritionist Application</h1>
      <form action="#">
        <div class="main-user-info">
          <div class="user-input-box">
        
          </div>
          <div class="user-input-box">
            <img src="<?=ROOT?>/assets/uploadnutritionistimages/<?= $data[0]->imageurl ?>" alt="">
          </div>
          
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" value="<?= $data[0]->name ?>" />
          </div>
          <div class="user-input-box">
            <label for="experience">Experience in Years</label>
            <input type="text"
                    id="experience"
                    name="experience"
                    value="<?= $data[0]->experience ?> Years"/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    value="<?= $data[0]->nemail ?>"/>
          </div>
          <?php
            $text="";
            foreach($data['specialization'] as $sp){
                $text=$sp.", ".$text;
            }
          ?>
          <div class="user-input-box">
            <label for="specialization">specialization</label>
            <input type="text"
                    id="specialization"
                    name="specialization"
                    value="<?=$text?>"/>
          </div>
          <div class="user-input-box">
            <label for="banckandaccno">Banck Name  and Acc No</label>
            <input type="banckandaccno"
                    id="banckandaccno"
                    name="banckandaccno"
                    value="<?= $data['banckname']." ".$data['accno']?>">
          </div>
          <div class="user-input-box">
            <label for="birthdate">Birth Date</label>
            <input type="text"
                    id="birthdate"
                    name="birthdate"
                    value="<?= $data[0]->birthdate ?>">
          </div>
          <div class="user-input-box">
            <label for="gender">Gender</label>
            <input type="text"
                    id="gender"
                    name="gender"
                    value="<?= $data[0]->gender ?>"/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Certificates</span>
          <div class="gender-category">
            <?php
            if(isset($data['qualifiaction'])){
                foreach($data['qualifiaction'] as $qa){
                    echo'<a href="viewnutritionistapplication?filename='.$qa.'">'.$qa.'</a><br>';
                }
            }
            else{
                echo '<h5>No Certificates available</h5>';
            }
               
                
            ?>
          </div>
        </div>
        <!-- <div class="form-submit-btn">
            <a href="instructoragreementform?instructorid=<?= $data[0]->id ?>"><input type="button" value="Approve"></a>
        </div> -->

      </form>
    </div>
    </div>
  </body>
</html>