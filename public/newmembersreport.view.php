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
      <h1 class="form-title">Generate  Reports</h1>
      <form action="#" method="POST">
        <div class="main-user-info">
          
    
          <div class="user-input-box">
            <label for="startdate">Start Date</label>
            <input type="date"
                    id="startdate"
                    name="startdate"
                    required
            />
          </div>
          <div class="user-input-box">
            <label for="enddate">End  Date</label>
            <input type="date"
                    id="enddate"
                    name="enddate"
                    required
            />
          </div>
           
        </div>
        
        <div class="form-submit-btn">
          <input type="submit" value="Generate Report">

        </div>
        <?php
if(isset($data['startdate'])){
    echo '
    <a href="newmemberspdf?startdate='.$data['startdate'].'&enddate='.$data['enddate'].'" style="margin-right:10px;margin-bottom:50px;margin-top:50px;display: inline-block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);">New Member Report</a>
    <a href="highmemberday?startdate='.$data['startdate'].'&enddate='.$data['enddate'].'" style="margin-right:10px;margin-bottom:50px;display: inline-block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);">Busy Days Report</a>
    <a href="revenuereport" style="margin-right:10px;margin-bottom:50px;display: inline-block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);">Revenue Report</a>
    ';
}
?>
      </form>
      
    </div>

    </div>
</div>
  </body>
</html>