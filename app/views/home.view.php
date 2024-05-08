<!-- <h1>Home Page View</h1> -->
<!-- <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/images/style.css"> -->
<!-- <img src="<?=ROOT?>/assets/images/image.jpg"> -->

<!-- only use loops and echos of php in the view files. not anything more than that. anything more should go to the controllers -->
<!-- <h1>Home Page View</h1>
<button><a href="signup">Sign Up</a></button> -->
<!-- <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/images/style.css"> -->
<!-- <img src="<?=ROOT?>/assets/images/image.jpg"> -->

<!DOCTYPE html>

<html>
    <head>
        <title>FitFusion</title>
        <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/style.css">

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <header>
            <a href="#" class = "logo">
                <img src="<?=ROOT?>/assets/images/LogoFinal.png" alt="logo">
            </a>
            <ul class="navmenu">
                <li><a href ="home">Home</a></li>
                    <li><a href ="signup">Sign Up</a></li>
                <li><a href ="login">Log In</a></li>
            </ul>

            <div class="nav-icon">
                <a href="#"><i class='bx bx-search-alt'></i></a>
                <a href="searchgyms"><i class='bx bx-dumbbell' ></i></a>
                <a href="searchnutritionists"><i class='bx bxs-bowl-rice'></i></a>

                <!-- <div class="bx bx-menu" id="menu-icon"></div> -->
                <label for="check" class="checkbtn">
                    <i class="fa fa-bars"></i>
                </label>
            </div>
        </header>

        <section class="main-home">
            <div class="main-text">
                <h5>Find your potential</h5>
                <h1>FitFusion</h1>
                <p>Stay true to your goal</p>

                <a href="signup" class="main-btn">Join Us<i class='bx bx-right-arrow-alt' ></i></a>
            </div>

            <!-- <div class="down-arrow">
                <a href="#trending" class="down"><i class='bx bx-down-arrow-alt' ></i></a>
            </div> -->
        </section>

        <!-- Gyms section -->
        <section class="gym" id="gym">
            <div class="center-text">
                <h2>Find the <span>Best Gyms</span></h2>
            </div>
            <div class="gym-list">
                <!-- GYM 1 -->
                <div class="gym-row">
                    <img src="<?=ROOT?>/assets/images/gym8.jpg" alt="">
                    
                    <div class="gym-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div>
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>
                    <div class="price">
                        <h4>Colombo Fitness Gym</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 2 -->
                <div class="gym-row">
                    <img src="<?=ROOT?>/assets/images/gym2.jpg" alt="">
                    <div class="gym-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div>
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Colombo Fitness Gym</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 3 -->
                <div class="gym-row">
                    <img src="<?=ROOT?>/assets/images/gym3.jpg" alt="">
                    
                    <div class="gym-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div>
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Colombo Fitness Gym</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 4 -->
                <div class="gym-row">
                    <img src="<?=ROOT?>/assets/images/gym4.jpg" alt="">
                    
                    <div class="gym-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div>
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Colombo Fitness Gym</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 5 -->
                <div class="gym-row">
                    <img src="<?=ROOT?>/assets/images/gym5.jpg" alt="">
                    
                    <div class="gym-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div>
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Colombo Fitness Gym</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 6 -->
                <div class="gym-row">
                    <img src="<?=ROOT?>/assets/images/gym6.jpg" alt="">
                    <div class="gym-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div>
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Colombo Fitness Gym</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nutritionist List -->
        <section class="nutritionist" id="nutritionist">
            <div class="center-text">
                <h2>Get your own <span>Nutritionist</span></h2>
            </div>
            <div class="nutri-list">
                <!-- NUTRI 1 -->
                <div class="nutri-row">
                    <img src="<?=ROOT?>/assets/images/nutri1.jpg" alt="">
                    
                    <!-- <div class="nutri-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div> -->
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>
                    <div class="price">
                        <h4>Nutritionist1</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 2 -->
                <div class="nutri-row">
                    <img src="<?=ROOT?>/assets/images/nutri2.jpg" alt="">
                    <!-- <div class="nutri-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div> -->
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Nutritionist2</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 3 -->
                <div class="nutri-row">
                    <img src="<?=ROOT?>/assets/images/nutri3.jpg" alt="">
                    
                    <!-- <div class="nutri-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div> -->
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Nutritionist3</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 4 -->
                <div class="nutri-row">
                    <img src="<?=ROOT?>/assets/images/nutri4.jpg" alt="">
                    
                    <!-- <div class="nutri-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div> -->
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Nutritionist4</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 5 -->
                <div class="nutri-row">
                    <img src="<?=ROOT?>/assets/images/nutri5.jpg" alt="">
                    
                    <!-- <div class="nutri-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div> -->
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Nutritionist5</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>

                <!-- GYM 6 -->
                <div class="nutri-row">
                    <img src="<?=ROOT?>/assets/images/nutri6.jpg" alt="">
                    <!-- <div class="nutri-text">
                        <h5>Nugegoda, Colombo</h5>
                    </div> -->
                    <div class="heart-icon">
                        <i class='bx bx-heart'></i>
                    </div>
                    <div class="rating">
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                        <i class='bx bx-star' ></i>
                    </div>

                    <div class="price">
                        <h4>Nutritionist6</h4>
                        <p>Rs. 3000 onwards</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        <section class="footer">
            <div class="footer-info">
                <img src="<?=ROOT?>/assets/images/LogoFinal.png" alt="logo">
            </div>
        </section>

        <script src="<?=ROOT?>/assets/js/java.js"></script>
    </body>
</html>
