<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManageResourcesStyle.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/HandleMemberComplaintStyle.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- <link rel="stylesheet" type="" href="<?=ROOT?>/assets/css/Manager/manager-main-template.css">
    <link rel="stylesheet" type="" href="<?=ROOT?>/assets/css/Manager/manager-body-template.css"> -->
</head>
<body>
    <!-- <div class="side-menu">
        <div class="brand-name">  
            <h1>FIT FUSION</h1>
        </div>
        <ul>
            <li>&nbsp; <h5>Dashboard</h5> </li>
            <a href="gymmanagerdash"><li><img src="<?=ROOT?>/assets/images/dashboards/home.jpg" alt="">&nbsp;<h6>Home</h6> </li></a>
            <a href="packages"><li><img src="<?=ROOT?>/assets/images/dashboards/profile.jpeg" alt="">&nbsp;<h6>Packages</h6> </li></a>
            <a href="handlemembercomplaint"><li><img src="<?=ROOT?>/assets/images/dashboards/schedule.jpeg" alt="">&nbsp;<h6>Member complaints</h6> </li></a>
            <a href="addgym"><li><img src="<?=ROOT?>/assets/images/dashboards/workout.jpeg" alt="">&nbsp;<h6>Add Gym</h6> </li></a>

            <a href="manageresources"><li><img src="<?=ROOT?>/assets/images/dashboards/failure.jpeg" alt="">&nbsp;<h6>Manage Gym Resources</h6> </li></a>
            <a href="editgym"><li><img src="<?=ROOT?>/assets/images/dashboards/setting.png" alt="">&nbsp;<h6>Edit Gym</h6> </li></a>
            <a href="appliednutritionists"><li><img src="<?=ROOT?>/assets/images/dashboards/meeting.jpeg" alt="">&nbsp;<h6>Approve Nutritionists</h6> </li>
            <a href="appliedinstructors"><li><img src="<?=ROOT?>/assets/images/dashboards/meeting.jpeg" alt="">&nbsp;<h6>Approve Instructors</h6> </li>
            <a href="attendancememberlist"><li><img src="<?=ROOT?>/assets/images/dashboards/failure.jpeg" alt="">&nbsp;<h6>Assign QR Code</h6> </li></a>
            <a href="markattendance"><li><img src="<?=ROOT?>/assets/images/dashboards/workout.jpeg" alt="">&nbsp;<h6>Mark Member Attendence</h6> </li></a>
            <a href="newmembersreport"><li><img src="<?=ROOT?>/assets/images/dashboards/setting.png" alt="">&nbsp;<h6>Reports</h6> </li></a>
            <a href="logout"><li><img src="<?=ROOT?>/assets/images/dashboards/help.jpeg" alt="">&nbsp; <h6>Logout</h6></li></a>

        </ul>
    </div> -->
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
            <div class="maincontainer">
            <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Manage Gym Resources</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <img src="<?=ROOT?>/assets/images/search-btn.png" alt="" alt="">
                </div>
    
            </section>
            <section class="table__body">
                
            <table>
                <thead>
                    <tr>
                        <th> Machine Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Machine Type <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Price<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Max Time(mins)<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Warranty (years)<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Update <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data['machines'] as $row){
                    //$row=$data[$x];
                    echo '
                    <tr>
                        <td> '.$row->id.' </td>
                    
                        <td> '.$row->machineType.'  </td>
                        <td>  '.$row->price.' </td>
                        <td>  '.$row->maxtime.' </td>
                        <td>'.$row->warranty.'</td>
                        <td>'.$row->adjustability.'</td>
                        

                        <td>
                            <a href="updateresources?updateid='.$row->id.'"><p class="status view"> Status</p></a>
                        </td>
                        
                   
                    </tr>
                    ';
                }
                ?>
                    
                    
                </tbody>
            </table>
        </section>
        </main>
            <!-- <script>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
    alert("Machine Details added successfully");
<?php endif; ?>
        </script> -->
                <div class="frm">
                    
                                <div class="secondcontainer">
                        <div class="addMachine">
                        <?php if(!empty($errors)):?>
                <div class="alert" style="background-color: #ffcccc; color: red; padding: 10px; border-radius: 5px;">
                    <?= implode("<br>", $errors)?>
                </div>
                <?php endif ;?>
                            <h2>Add Machine</h2>
                            <form method="post">
                                <input type="hidden" name="manageremail" id="manageremail" value="<?= $_SESSION['email']?>">
                                <div class="inputBx">
                                    <span>Machine Type</span>
                                    <input type="text" name="machineType" id="machineType" >
                                </div>
                                <div class="inputBx">
                                    <span>Machine ID</span>
                                    <input type="" name="id" id="id" >
                                </div>
                                <div class="inputBx">
                                    <span>Price</span>
                                    <input type="number" name="price" id="price" >
                                </div>
                                <div class="inputBx">
                                    <span>Max Time(mins)</span>
                                    <input type="number" name="maxtime" id="maxtime" >
                                </div>
                                <div class="inputBx">
                                    <span>Warranty (years)</span>
                                    <input type="number" name="warranty" id="warranty" >
                                </div>
                                
                                <div class="inputBx">
                                    <input type="hidden" name="adjustability" id="adjustability" value="working">
                                </div>
                                <!-- <div>
                                    <?php
                                        if($data['errors']!=''){
                                            for($x=0;$x<count($data['errors']);$x++){
                                                echo '<h5 style="color: red; font-family: Arial; ">'.array_values($data['errors'])[$x].'</h5>';
                                            }
                                            //print_r(array_values($data['errors']));
                                        }
                                    ?>

                                </div> -->
                                <div class="inputBx">
                                    <input type="submit" value="Submit">
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
                        
                </div>
                </div>
            
       
            
           
            <!-- <div class="machine">
                <div class="c1">
                    <img src="../CSS/ma1.jpeg" alt=""><br><br>  
                </div>
                <div class="c2">
                    <h4>Machine Id : s100</h4><br>
                    <h4>Description : Soozier 100 lb stack Multi </h4><br>
                    <h4>Status : working</h4>
                    <input type="submit" value="Update">
                    <input type="submit" value="Remove">
                </div>   
            </div> -->

            
            <script src="<?=ROOT?>/assets/js/replymembercomplaint.js"></script>
    </div>
         

</body>
</html>