<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ApproveinstructorStyle.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
        </div>>
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
      <h1 class="form-title">Manager Agreement</h1>
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="main-user-info">
          
          
        
          <div class="user-input-box">
            <label for="registereddate">Registered Date</label>
            <input type="date"
                    id="registereddate"
                    name="registereddate"
                    max="<?php echo date('Y-m-d'); ?>"
                    required
            />
          </div>
          <div class="user-input-box">
            <label for="agreementduration">Agreement Closing Date</label>
            <input type="date"
                    id="agreementduration"
                    name="agreementduration"
                    min="<?php echo date('Y-m-d'); ?>"
                    required
            />
          </div>
          <div class="user-input-box">
            <label for="pwd">Tempory Password</label>
            <input type="password"
                    id="pwd"
                    name="pwd"
                    placeholder="Password"
                    required
            />
          </div>
          <div class="user-input-box">
            <label for="pdfFile">Select Agreement PDF File</label>
                        <input type="file" name="pdfFile"  id="pdfFile" required>
          </div>
          <input type="hidden"
                    id="manageremail"
                    name="manageremail"
                    value="<?php echo $data['manageremail'];?>"
                    required
            />
        </div>
        
        <div class="form-submit-btn">
          <input type="submit" value="Add Manager">
        </div>
      </form>
    </div>
    </div>
</div>
  </body>
</html>