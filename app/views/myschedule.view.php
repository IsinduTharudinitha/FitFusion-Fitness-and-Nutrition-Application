<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/MyscheduleStyle.css" />
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
  </head>
  <body>
    
    <div class="container">
    <div class="containera">
    <h1 class="form-title">My Schedule</h1>
    <div class=formHeader>
        <h2>Machine Type</h2>
        <h2>Machine Id</h2>
        <h2>From Time</h2>
        <h2>&nbsp;To Time</h2>
    </div>
    
    <form action="#" method="POST" enctype="multipart/form-data">
        <?php
        foreach($data as $x){
            echo '<div class="main-user-info">
                    <div class="user-input-box">
                        <input type="text" name="machineType[]" value="' . $x->machineType . '" readonly required/>
                    </div>
                    <div class="user-input-box">
                        <input type="text" name="id[]" value="' . $x->id . '" readonly required/>
                    </div>
                    <div class="user-input-box">
                        <input type="text" name="fromTime[]" value="' . $x->fromTime . '" readonly required/>
                    </div>
                    <div class="user-input-box">
                        <input type="text" name="toTime[]" value="' . $x->toTime . '" readonly required/>
                    </div> 
                </div>';
        }
        ?>
    </form>
</div>

    </div>
  </body>
</html>