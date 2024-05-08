<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ApproveinstructorStyle.css" />
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
  </head>
  <body>

    <div class="container">
    <div class="containera">
      <h1 class="form-title">Manager Application</h1>
      <form  method="POST" enctype="multipart/form-data">
        <div class="main-user-info">
          <div class="user-input-box">
        
          </div>
          <div class="user-input-box">
            <!-- <img src="<?=ROOT?>/assets/uploadinstructorimages/<?= $data[0]->imageurl ?>" alt=""> -->
          </div>
          
          <div class="user-input-box">
            <label for="gymname">Gym Name</label>
            <input type="text" id="gymname" name="gymname" required />
          </div>
          <div class="user-input-box">
            <label for="gymemail">Gym Email </label>
            <input type="email"
                    id="gymemail"
                    name="gymemail"
                    required
                    />
          </div>
          <div class="user-input-box">
            <label for="managername">Manager Name</label>
            <input type="managername"
                    id="managername"
                    name="managername"
                    required
                   />
          </div>
   
          
          <div class="user-input-box">
            <label for="manageremail">Manager Email</label>
            <input type="text"
                    id="manageremail"
                    name="manageremail"
                    required
                    >
          </div>
          <div class="user-input-box">
            <label for="gymaddress">Gym Address</label>
            <input type="text"
                    id="gymaddress"
                    name="gymaddress"
                    required
                    >
          </div>
 

        </div>

         <div class="certificates">
            <span>Select Business License</span><br><br> 
            <input type="file" name="pdf_file"  accept="application/pdf" required>
            
        </div>
        
        <div class="form-submit-btn">
            <input type="submit" value="Apply">
        </div>

      </form>
    </div>
    </div>
  </body>
</html>