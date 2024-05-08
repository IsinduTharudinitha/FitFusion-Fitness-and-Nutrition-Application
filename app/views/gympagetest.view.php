<!DOCTYPE html>


<html>
    <head>
        <title>FitFusion</title>
        <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/GympagetestStyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" /> 
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <nav>
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
                    <a href="#">
                        <span class="material-symbols-outlined">star</span> 
                        <span class="nav-item">Rate and Review</span>
                    </a>
                </li>
                <li>
                    <a href="logout" class="logout">
                        <span class="material-symbols-outlined">logout</span> 
                        <span class="nav-item">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>

        <section class="search-container">
            <form action="" class="search-bar">
                <input type="text" placeholder="Seach for a Gym or a Nutritionist" name="search">
                <button type="submit"><img src="<?=ROOT?>/assets/images/search-btn.png" alt="search"></button>
            </form>
            <h3>Head Count:34</h3>
        </section>


        <div class="container">

        <div class="secondblock">
            <div class="left">
                <div class="imageblock">
                    <div class="imageblock-1">
                        <img src="<?=ROOT?>/assets/uploadgymimages/<?=$data['image'][0]?>" alt="">
                    </div> 
                           
                             
                    <div class="imageblock-2">
                        <?php
                        $x=0;
                        foreach($data['image'] as $im){
                            //echo $im;
                            echo '<img src="' . ROOT . '/assets/uploadgymimages/' . $data['image'][$x+1] . '" alt="">';
                            $x=$x+1;
                            if($x==3){
                                break;
                            }

                        }
                        ?>
                        
                    </div> 
                </div>
                <div class="gymname">
                    <h3>Fitness First-WTC</h3>
                    <a href="">rate this gym</a>
                </div>
                
                <div class="leftcontent">
                    <h3>Description</h3>
                    <p><?=$data['description']?>
                    </p>
                </div>
                
                <div class="leftcontent">
                    <h3>Open Hours</h3>
                    <h5>Weekdays<?=$data['openhourswf']?> - <?=$data['openhourswt']?></h5><br> 
                    <h5>Saturday<?=$data['openhourssaf']?> - <?=$data['openhourssat']?></h5><br>
                    <h5>Sunday<?=$data['openhourssuf']?> - <?=$data['openhourssut']?></h5><br>
                </div>
                <div class="equipment">
                    <h3>Equipments</h3>
                    <div class="equipment-1">
                        <h5> 1.Battle Rope</h5><br>
                        <h5> 2.Lat Pull</h5><br>
                        <h5> 3.Lat Pull</h5><br>
                        <h5> 4.Lat Pull</h5><br>
                        <h5> 5.Spin Bikes</h5><br>
                    </div>
                    <div class="equipment-1">
                        <h5> 6.Battle Rope</h5><br>
                        <h5> 7.Lat Pull</h5><br>
                        <h5> 8.Lat Pull</h5><br>
                        <h5> 9.Lat Pull</h5><br>
                        <h5> 10.Spin Bikes</h5><br>
                    </div>
                    <div class="equipment-1">
                        <h5> 11.Battle Rope</h5><br>
                        <h5> 12.Lat Pull</h5><br>
                        <h5> 13.Lat Pull</h5><br>
                        <h5> 14.Lat Pull</h5><br>
                        <h5> 15.Spin Bikes</h5><br>
                    </div>
                        
                        
                </div>
                
            </div>
            <div class="right"> 
                <div class="location">
                    <img src="<?=ROOT?>/assets/images/dashboards/location.jpeg" alt="">
                    <h5><?=$data['location1']?> ,<?=$data['location2']?> ,<?=$data['location3']?> </h5>
                </div>
                <div class="packages">

                    <h2>Gym Membership Packages</h2>
                    <?php
                        for($x=0;$x<$data['limit'];$x++){
                            echo'
                            <div class="package">
                                <h5>'.$data[$x]['packagetype'].' - LKR '.$data[$x]['amount'].'</h5>
                            </div>';
                        }
                    ?>
                    
                    
                </div>
                <div class="allpackages">
                    <a href="viewallpackages?memail=<?php echo $data['manageremail'];?>"><h5>View All packages</h5></a>
                </div>
                <div class="singleentry">
                    <a href="#"><h5>Purchase Single Entry</h5></a>
                </div>
                <div class="facilities">
                    <div>
                        <h2>Facilities</h2><br>
                    </div>
                    
                    <div class="facility">
                        <img src="<?=ROOT?>/assets/images/dashboards/wifi.jpeg" alt="">
                        <h6>Wifi</h6>
                    </div><br>
                    <div class="facility">
                        <img src="<?=ROOT?>/assets/images/dashboards/chngeroom.jpeg" alt="">
                        <h6>Changing <br>Rooms</h6>
                    </div>
                    <div class="facility">
                        <img src="<?=ROOT?>/assets/images/dashboards/personltarning.jpeg" alt="">
                        <h6>Personal<br> Training</h6>
                    </div>
                    <div class="facility">
                        <img src="<?=ROOT?>/assets/images/dashboards/open 24.jpeg" alt="">
                        <h6>Open 24*7</h6>
                    </div>
                   
                </div>
                <div class="apply">
                    <a href="instructorapplygym?id=<?php echo $data['id'];?>&manageremail=<?php echo $data['manageremail'];?>"><h5>Apply as an Instructor</h5></a>
                </div>
                <div class="apply">
                    <a href="nutritionistapplygym?id=<?php echo $data['id'];?>&manageremail=<?php echo $data['manageremail'];?>"><h5>Apply as a Nutritionist</h5></a>
                </div>

            </div>
        </div>
       
    </div>
      

        <!-- footer -->
        <section class="footer">
        <div class="footer-info">
            <img src="<?=ROOT?>/assets/images/LogoFinal.png" alt="logo">
        </div>
        </section>

        <script src="<?=ROOT?>/assets/js/java.js"></script>

    </body>
</html>