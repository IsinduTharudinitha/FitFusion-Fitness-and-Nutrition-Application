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

                <a class="side-bar-tile-link" href="instructordash">
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

                <a class="side-bar-tile-link" href="selectunavailableslot">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Select Unavailable Time Slots
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
                    Welcome, Instructor
                </div>
            </div>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Meeting Requests from Members</h1>
            <!-- <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="<?=ROOT?>/assets/images/search-btn.png" alt="" alt="">
            </div> -->
 
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Instructor Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Timeslot<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Member Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Member Name <span class="icon-arrow"></span></th>
                        <th>Member Age<span class="icon-arrow"></span></th>
                        <th>Goal <span class="icon-arrow"></span></th>
                        <th>Illness <span class="icon-arrow"></span></th>
                        <th>Status <span class="icon-arrow"></span></th>
                        <th>Action <span class="icon-arrow"></span></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data as $x){
                    
                    echo '
                    <tr>
                        <td> '.$x->id.' </td>
                    
                        <td> '.$x->instructoremail.'  </td>
                        <td>  '.$x->date.' </td>
                        <td>'.$x->timeslot.'</td>
                        <td>'.$x->memberemail.'</td>
                        <td>'.$x->membername.'</td>
                        <td>'.$x->memberage.'</td>
                        <td>'.$x->goal.'</td>
                        <td>'.$x->illness.'</td>
                        <td>'.$x->status.'</td>
                        <td>';
                        if($x->status=="Pending"){
                            echo '
                            <form method="POST">
                            <input type="hidden" name="idd" id="idd" value="'.$x->id.'">
                            <button type="submit" class="status Replied" name="submit" >Done&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <button type="button" class="status Not Replied" onclick="deactivateConfirmButton(this)"><a href="sendmemberemail?email='.$x->memberemail.' & id='.$x->id.' & status=cancel">cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></button>
                            <button type="button" class="status view" ><a href="sendmemberemail?email='.$x->memberemail.' & id='.$x->id.'">Send Email</a></button>
                            </form>
                            ';
                        }
                        echo'

                        </td>
                    </tr>
                    ';
                }
                ?>
                    
                    <!-- <button type="submit" class="confirm" name="submit"><a href="sendmemberemail?email='.$x->memberemail.' & id='.$x->id.' & status=confirm">confirm</a></button> -->
                </tbody>
            </table>
        </section>
    </main>
    </div>
    <script src="<?=ROOT?>/assets/js/replymembercomplaint.js"></script>
   
</body>
</html>