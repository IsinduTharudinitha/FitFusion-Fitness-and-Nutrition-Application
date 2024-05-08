<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/sidebarfinal.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/scheduleAppointRe.css">
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/tasklist.css">
    
   
</head>

<body>
    <div class="side-bar">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="nav-container">
                <div class="top-container">
                    <div class="center-image">
                        <img src="<?=ROOT?>/assets/images/LogoFinal.png" alt="logo">
                    </div>
                    <div style="width: 100%">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="menu-title">My Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="taskList">
                                    <span class="menu-title">Task List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="current-nav-link" href="attendance">
                                    <span class="menu-title">Attendance</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="memberpackages">
                                    <span class="menu-title">Packages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="scheduleInstrAppointReq">
                                <span class="menu-title">Meetings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="makeComplaint">
                                    <span class="menu-title">Complaints</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="makereview">
                                    <span class="menu-title">Reviews</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="menu-title">Payments</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bottom-container">
                    <button class="logout-button">
                        <a  href="#">
                            <span>Logout</span>
                        </a>
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <div class="form" style="margin-left:30%">
        <div class="form-item">
                <p>Attendance</p>
        </div>

        <!-- <div class="form-item">
            <input type="checkbox" id="machine1" name="machine1" value="machine1">
            <p>Treadmill</p>
        </div>
        <div class="form-item">
            <input type="checkbox" id="machine2" name="machine2" value="machine2">
            <p>Leg Extension</p>
        </div>
        <div class="form-item">
            <input type="checkbox" id="machine3" name="machine3" value="machine3">
            <p>Chest Press</p>
        </div>
        <div class="form-item">
            <input type="checkbox" id="machine4" name="machine4" value="machine4">
            <p>Leg Curl</p>
        </div> -->

        <div class="container">
            <div id="newtask">
                <input type="text" placeholder="Add Date">
                <button id="push">Mark Attendance</button>
            </div>
            <div id="tasks"></div>

            <script>
                document.querySelector('#push').onclick = function(){
                    if(document.querySelector('#newtask input').value.length == 0){
                        alert("Kindly Enter Date!!!!")
                    }

                    else{
                        document.querySelector('#tasks').innerHTML += `
                            <div class="task">
                                <span id="taskname">
                                    ${document.querySelector('#newtask input').value}
                                </span>
                                <button class="delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        `;

                        var current_tasks = document.querySelectorAll(".delete");
                        for(var i=0; i<current_tasks.length; i++){
                            current_tasks[i].onclick = function(){
                                this.parentNode.remove();
                            }
                        }
                    }
                }
            </script>

        </div>

    </div>
</body>

</html>