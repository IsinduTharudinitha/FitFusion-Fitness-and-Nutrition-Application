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

                <a class="side-bar-tile-link" href="admindash">
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
                <a class="side-bar-tile-link" href="appliedmanagers">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Manager Applications
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="admincomplaints">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Complaints
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            #
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
                    Welcome, Admin
                </div>
            </div>
    <div class="containera">
      <h1 class="form-title">Manager Application</h1>
      <form action="#">
        <div class="main-user-info">         
          <div class="user-input-box">
            <label for="gymname">Gym Name</label>
            <input type="text" id="gymname" name="gymname" value="<?= $data[0]->gymname ?>" />
          </div>
          <div class="user-input-box">
            <label for="gymemail">Gym Email </label>
            <input type="text"
                    id="gymemail"
                    name="gymemail"
                    value="<?= $data[0]->gymemail ?>"/>
          </div>
          <div class="user-input-box">
            <label for="managername">Manager Name</label>
            <input type="managername"
                    id="managername"
                    name="managername"
                    value="<?= $data[0]->managername ?>"/>
          </div>
    
          <div class="user-input-box">
            <label for="manageremail">Manager Email</label>
            <input type="text"
                    id="manageremail"
                    name="manageremail"
                    value="<?=$data[0]->manageremail?>"/>
          </div>
          <div class="user-input-box">
            <label for="gymaddress">Gym Address</label>
            <input type="gymaddress"
                    id="gymaddress"
                    name="gymaddress"
                    value="<?= $data[0]->gymaddress?>">
          </div>

        </div>
        <div class="gender-details-box">
          <span class="gender-title">Business License</span>
          <div class="gender-category">
            <?php
            if(isset($data[0]->businesslicense)){
                    echo'<a href="viewmanagerapplication?filename='.$data[0]->businesslicense.'">'.$data[0]->businesslicense.'</a><br>';
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
</div>
  </body>
</html>