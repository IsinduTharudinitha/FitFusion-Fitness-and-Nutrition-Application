<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManageResourcesStyle.css">
</head>
<body>
    <nav>
        <div class = "logo">
            <p>FitFusion</p>
        </div>

        <ul>
            <li><a href ="#">Home</a></li>
            <li><a href ="#">AboutUs</a></li>
            <li><a href ="#">Services</a></li>
            <li><a href ="login">Logout</a></li>
        </ul>
    </nav>
            <div class="maincontainer">
              <h2><b>Already Reported!</b></h2>

              <?php
                
                  
                $id=$data['id'];
                $failure=$data['failure'];
                $notes=$data['notes'];
              
            
            //$raw= mysqli_fetch_assoc($data);
            //echo '<pre>'; print_r($data); echo '</pre>';
            //var_dump($data[0]);

            ?>
                            
                <div class="frm">
                                <div class="container">
                        <div class="addMachine">
                            <h2>Machine failure</h2>
                            <form method="post">
                                
                                <div class="inputBx">
                                    <span>id</span>
                                    <input type="text" name="id" id="id"  value="<?= $id?>">
                                </div>
                              
                                <div class="inputBx">
                                    <span>failure</span>
                                    <input type="text" name="failure" id="failure" value="<?= $failure?>">
                                </div>
                                <div class="inputBx">
                                    <span>notes</span>
                                    <input type="text" name="notes" id="notes" value="<?= $notes?>">
                                </div>
                                
<!--                                 
                                <div class="inputBx">
                                    <input ytpe="submit" value="Submit">
                                </div> -->
                            
                            </form>
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

            
            
         

</body>
</html>