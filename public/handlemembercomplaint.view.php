<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/HandleMemberComplaintStyle.css">
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
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Member Complaints</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="<?=ROOT?>/assets/images/search-btn.png" alt="" alt="">
            </div>
 
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Member Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Complaint<span class="icon-arrow">&UpArrow;</span></th>
                        <!-- <th> About Whom <span class="icon-arrow">&UpArrow;</span></th> -->
                        <th>Reply Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th>View <span class="icon-arrow"></span></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data as $x){
                    if($x->reply==""){
                        $x->reply="Not Replied";
                    }
                    else{
                        $x->reply="Replied";
                    }
                    echo '
                    <tr>
                        <td> '.$x->id.' </td>
                    
                        <td> '.$x->memberemail.'  </td>
                        <td>  '.$x->description.' </td>
                        <td>
                        <p > '.$x->reply.' </p>
                        </td>
                        <td>';
                        
                        if($x->reply=="Replied"){
                            echo '
                            <a href="replymembercomplaint?viewid='.$x->id.'"><p class="status view"> View </p></a>
                            <a href="replymembercomplaint?deleteid='.$x->id.'"><p class="status Not Replied"> Delete </p></a>
                            ';
                        }
                        
                        
                        if($x->reply=="Not Replied"){
                            echo '<a href="replymembercomplaint?replyid='.$x->id.'"><p class="status  Replied"> Reply </p></a>';
                        }
                        echo '
                        
                        </td>
                   
                    </tr>
                    ';
                }
                ?>
                    
                    
                </tbody>
            </table>
        </section>
    </main>
    </div>
    <script src="<?=ROOT?>/assets/js/replymembercomplaint.js"></script>

</body>
</div>
</html>