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
                <li><a href ="admindash">Dashboard</a></li>
                <li><a href ="home">Log Out</a></li>
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

        <div class="add-manager-main-container">
        <form method="POST">
            <div class="add-manager-container">
                <div class="box"><h2>Add Owner</h2></div>
                <div class="box">Name <input type="text" name="name" id="name"></div>
                <div class="box">Email <input type="text" name="email" id="email"></div>
                <div class="box">Username <input type="text" name="username" id="username"></div>
                <div class="box">Password <input type="password" name="password" id="password"></div>
                <div class="box">Type
                    <select name="usertype" id="usertype">
                        <option value="gymowner">Gym Owner</option>
                    </select> 
                </div>
                <?php if(!empty($errors)):?>
                    <div class="alert">
                        <?= implode("<br>", $errors)?>
                    </div>
                <?php endif ;?>
                <div class="box"><input type="submit" value="Add Owner"></div>
            </div>
        </form>

        <div class="add-manager-form-container">
            <table>
                <thead>
                    <tr>
                        <td scope=cole></td>
                        <!-- <td scope=cole></td> -->
                        <td scope=cole>Name</td>
                        <td scope=cole>Email</td>
                        <td scope=cole>Username</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // if(!empty($data)){
                        for($x=0;$x<count($data);$x++){
                            $row=$data[$x];
                            $id=$row->id;
                            $name=$row->name;
                            $email=$row->email;
                            $username=$row->username;
    
                            echo ' <tr>
                            <th scope="row"></th>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$username.'</td>
                            <td>
                                <button>Update</button>
                                <button><a href="addgymowner?deleteowner='.$email.'">Remove</a></button>
                            </td>
                            <br>
                        </tr> ';
                        }
                    // }
                    // else {
                    //     echo 'error';
                    // }
                    
                    //$raw= mysqli_fetch_assoc($data);
                    //echo '<pre>'; print_r($data); echo '</pre>';
                    //var_dump($data[0]);

                ?>
                </tbody>
            </table>  

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