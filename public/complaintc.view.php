<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ComplaintStyle.css">
</head>
<body>
    <nav>
        <div class = "logo">
            <p>FitFusion</p>
        </div>

        <ul>
            <li><a href ="memberdash">Dashboard</a></li>
            <li><a href ="home">Log Out</a></li>
        </ul>
    </nav>
    
       
            <table>
                <thead>
                    <tr>
                    
                     
                        <td scope=cole></td>
                        <td scope=cole>id</td>
                        <td scope=cole>complaint</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for($x=0;$x<count($data);$x++){
                        $row=$data[$x];
                        $id=$row->id;
                        $complaint=$row->complaint;
                      

                        echo ' <tr>
                        <th scope="row"></th>
                        <td>'.$id.'</td>
                        <td>'.$complaint.'</td>
                     
                        <td>
                            <button><a href="deletemachine">Update</a></button>
                            <button><a href="complaintc?deleteid='.$id.'">Remove</a></button>
                        </td>
                        <br>
                    </tr> ';
                    }
                    //$raw= mysqli_fetch_assoc($data);
                    //echo '<pre>'; print_r($data); echo '</pre>';
                    //var_dump($data[0]);

                ?>
                </tbody>
            </table>
           
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

            
            
         <div class="container">
        <div class="addMachine">
            <h2>Make a Complain</h2>
            <form method="post">
                <div class="inputBx">
                    <span>Complain</span>
                    <input type="text" name="complaint" id="complaint">
                </div>
              
                <div class="inputBx">
                    <input type="submit" value="Add">
                </div>
               
            </form>
        </div>
    </div>

</body>
</html>