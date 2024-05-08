<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/CreatedworkoutplansStyle.css">
</head>

<body>
    <nav>
        <div class="logo">
            <p>FitFusion</p>
        </div>

        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">AboutUs</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="login">Logout</a></li>
        </ul>
    </nav>
    <h2><b>Basic Cardio Plans</b></h2>
    <div class="maincontainer">
        <!-- //<h2><b>Workout Plans</b></h2> -->

        <?php foreach ($data['cardioPlans'] as $cardioPlan): ?>


            <!-- print_r($data);
                  
                $id=$data['id'];
                $iemail=$data['iemail'];
                $maingoal=$data['maingoal'];
                $workouttype=$data['workouttype'];
                $traininglevel=$data['traininglevel'];
                $programduration=$data['programduration'];
                $daysperweek=$data['daysperweek'];
                $targetgender=$data['targetgender'];
                $suppliment=$data['suppliment'];
                $equipment=$data['equipment'];
            
            //$raw= mysqli_fetch_assoc($data);
            //echo '<pre>'; print_r($data); echo '</pre>'; 
            //var_dump($data[0]);
              
            ?> -->

            <div class="frm">
                <div class="container">
                    <div class="addMachine">
                        <h2><u>Plan</u></h2>
                        <form method="post">

                            <div class="inputBx">
                                <span><b>id</b></span>
                                <input type="text" name="id" id="id" value="<?= $cardioPlan['id'] ?>">
                            </div>

                            <div class="inputBx">
                                <span><b>Instructor email</b></span>
                                <input type="text" name="iemail" id="iemail" value="<?= $cardioPlan['iemail'] ?>">
                            </div>
                            <div class="inputBx">
                                <span><b>Main goal</b></span>
                                <input type="text" name="maingoal" id="maingoal" value="<?= $cardioPlan['maingoal'] ?>">
                            </div>
                            <div class="inputBx">
                                <span><b>Workouttype</b></span>
                                <input type="text" name="workouttype" id="workouttype"
                                    value="<?= $cardioPlan['workouttype'] ?>">
                            </div>
                            <div class="inputBx">
                                <span><b>Training Level</b></span>
                                <input type="text" name="traininglevel" id="traininglevel"
                                    value="<?= $cardioPlan['traininglevel'] ?>">
                            </div>
                            <div class="inputBx">
                                <span><b>Program Duration</b></span>
                                <input type="text" name="programduration" id="programduration"
                                    value="<?= $cardioPlan['programduration'] ?>">
                                <div class="inputBx">
                                    <span><b>DaysPerWeek</b></span>
                                    <input type="text" name="daysperweek" id="daysperweek"
                                        value="<?= $cardioPlan['daysperweek'] ?>">
                                </div>
                                <div class="inputBx">
                                    <span><b>Target Gender</b></span>
                                    <input type="text" name="targetgender" id="targetgender"
                                        value="<?= $cardioPlan['targetgender'] ?>">
                                </div>
                                <div class="inputBx">
                                    <span><b>Suppliments</b></span>
                                    <?php if (is_array($cardioPlan['suppliment'])): ?>
                                        <ul>
                                            <?php foreach ($cardioPlan['suppliment'] as $suppliment): ?>
                                                <li>
                                                    <?= $suppliment->suppliment ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <input type="text" name="suppliment" id="suppliment"
                                            value="<?= $cardioPlan['suppliment'] ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="inputBx">
                                    <span><b>Equipments</b></span>
                                    <?php if (is_array($cardioPlan['equipment'])): ?>
                                        <ul>
                                            <?php foreach ($cardioPlan['equipment'] as $equip): ?>
                                                <li>
                                                    <?= $equip->equipment ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <input type="text" name="equipment" id="equipment"
                                            value="<?= $cardioPlan['equipment'] ?>">
                                    <?php endif; ?>
                                </div>


                                <a href="members?planid=<?= $cardioPlan['id'] ?>"><u>Assign to a member</u></a>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>




</body>

</html>