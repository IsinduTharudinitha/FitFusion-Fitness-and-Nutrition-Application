<!DOCTYPE html>


<html>
    <head>
        <title>FitFusion</title>
      
        <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    </head>
    <body>
        <!-- <header> -->
            <!-- <a href="#" class = "logo">
                <img src="<?=ROOT?>/assets/images/LogoFinal.png" alt="logo">
            </a> -->
            <!-- <ul class="navmenu"> -->
                <!-- <li><a href ="home">Home</a></li>
                <li><a href ="signup">Sign Up</a></li> -->
                <!-- <li><a href ="home">Log Out</a></li>
            </ul> -->

            <!-- <div class="nav-icon"> -->
                <!-- <a href="#"><i class='bx bx-search-alt'></i></a>
                <a href="searchgyms"><i class='bx bx-dumbbell' ></i></a>
                <a href="searchnutritionists"><i class='bx bxs-bowl-rice'></i></a> -->

                <!-- <div class="bx bx-menu" id="menu-icon"></div> -->
                <!-- <label for="check" class="checkbtn">
                    <i class="fa fa-bars"></i>
                </label>
            </div>
        </header> -->

        <!-- <nav>
            <ul>
                <li>
                    <a href="#" class="sidebar-logo">
                    <img src="<?=ROOT?>/assets/images/Logo.png" alt="">
                    <span class="nav-item">Member Dashboard</span>
                </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-symbols-outlined">account_circle</span>
                        <span class="nav-item">Profile</span>                    
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-symbols-outlined">schedule</span> 
                        <span class="nav-item">Gym Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="scheduleinterface">
                        <span class="material-symbols-outlined">schedule</span> 
                        <span class="nav-item">My Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-symbols-outlined">monitoring</span> 
                        <span class="nav-item">My Progress</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-symbols-outlined">task</span> 
                        <span class="nav-item">Task List</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="material-symbols-outlined">groups</span> 
                        <span class="nav-item">Meetings</span>
                    </a>
                </li>
                <li>
                    <a href="complaintc">
                        <span class="material-symbols-outlined">star</span> 
                        <span class="nav-item">Make Complaints</span>
                    </a>
                </li>
                <li>
                    <a href="logout" class="logout">
                        <span class="material-symbols-outlined">logout</span> 
                        <span class="nav-item">Logout</span>
                    </a>
                </li>
            </ul>
        </nav> -->


        <!-- //////////////////////////// -->

        <!-- //////////////////////////// -->

        <!-- ADDED THE CONTAINER CLASS -->
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
   
               
           
                <!-- <?php



                    for($x=0;$x<count($data);$x++){
                    echo '<a href="gympagetest?id='.$data[$x]['id'].'">
                    <div class="gym-row">
                    <img src="'.ROOT.'/assets/uploadgymimages/'.$data[$x]['gymimages'].'" alt="">
                    
                    <div class="gym-text">
                        <h5>'.$data[$x]['location2'].', '.$data[$x]['location3'].'</h5>
                    </div>
                    
                    <div class="rating">
                        <i class="bx bx-star" ></i>
                        <i class="bx bx-star" ></i>
                        <i class="bx bx-star" ></i>
                        <i class="bx bx-star" ></i>
                        <i class="bx bx-star" ></i>

                    </div>
                    <div class="price">
                        <h4>'.$data[$x]['gymName'].'</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>   </a> '  ;
                    }
                ?> -->
                

               
            </div>
        </section>



    </div>
    <!-- CLOSED THE CONTAINER CLASS DIV -->

        <!-- footer -->
     
<!-- 
        <script src="<?=ROOT?>/assets/js/java.js"></script> -->
</div>
    </body>
</html>