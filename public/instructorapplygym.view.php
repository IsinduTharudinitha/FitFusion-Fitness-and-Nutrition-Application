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
    <div class="side-menu">
        <div class="brand-name">
            <h1>FIT FUSION</h1>
        </div>
        <ul>
            <li>&nbsp; <h5>Dashboard</h5> </li>
            <a href="packages"><li><img src="<?=ROOT?>/assets/images/dashboards/profile.jpeg" alt="">&nbsp;<h6>Packages</h6> </li></a>
            <a href="handlemembercomplaint"><li><img src="<?=ROOT?>/assets/images/dashboards/schedule.jpeg" alt="">&nbsp;<h6>Member complaints</h6> </li></a>
            <a href="addgym"><li><img src="<?=ROOT?>/assets/images/dashboards/workout.jpeg" alt="">&nbsp;<h6>Add Gym</h6> </li></a>

            <a href="manageresources"><li><img src="<?=ROOT?>/assets/images/dashboards/failure.jpeg" alt="">&nbsp;<h6>Manage Gym Resources</h6> </li></a>

            <a href="editgym"><li><img src="<?=ROOT?>/assets/images/dashboards/task list.jpeg" alt="">&nbsp;<h6>Edit Gym</h6> </li></a>
            <a href="appliedinstructors"><li><img src="<?=ROOT?>/assets/images/dashboards/meeting.jpeg" alt="">&nbsp;<h6>Approve Instructors</h6> </li>
            <a href="logout"><li><img src="<?=ROOT?>/assets/images/dashboards/help.jpeg" alt="">&nbsp; <h6>Logout</h6></li></a>
            <a href="newmembersreport"><li><img src="<?=ROOT?>/assets/images/dashboards/setting.png" alt="">&nbsp;<h6>Reports</h6> </li></a>
        </ul>
    </div>
    <div class="container">
    <div class="containera">
      <h1 class="form-title">Instructor Application</h1>
      <form  method="POST" enctype="multipart/form-data">
        <div class="main-user-info">
          <div class="user-input-box">
        
          </div>
          <div class="user-input-box">
            <!-- <img src="<?=ROOT?>/assets/uploadinstructorimages/<?= $data[0]->imageurl ?>" alt=""> -->
          </div>
          
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName"  />
          </div>
          <div class="user-input-box">
            <label for="experience">Experience in Years</label>
            <input type="text"
                    id="experience"
                    name="experience"
                    />
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                   />
          </div>
          <!-- <?php
            $text="";
            foreach($data['specialization'] as $sp){
                $text=$sp.", ".$text;
            }
          ?> -->
          
          <div class="user-input-box">
            <label for="banckname">Banck Name </label>
            <input type="text"
                    id="banckname"
                    name="banckname"
                    >
          </div>
          <div class="user-input-box">
            <label for="accno">Account No</label>
            <input type="text"
                    id="accno"
                    name="accno"
                    >
          </div>
          <div class="user-input-box">
            <label for="birthdate">Birth Date</label>
            <input type="text"
                    id="birthdate"
                    name="birthdate"
                   >
          </div>
          <div class="user-input-box">
            <label for="gender">Gender</label>
            <input type="text"
                    id="gender"
                    name="gender"
                 />
          </div>
        </div>
        <div class="user-input-box">
            <label for="specialization">Specialization</label>
            <div class="specialization">
                <input type="checkbox" id="pilates" name="pilates" value="pilates">
                <label for="pilates"> Pilates</label><br>
                <input type="checkbox" id="yoga" name="yoga" value="yoga">
                <label for="yoga"> Yoga</label><br>
                <input type="checkbox" id="bodybuilding" name="bodybuilding" value="bodybuilding">
                <label for="bodybuilding"> Body Building</label><br>     
                <input type="checkbox" id="athletic" name="athletic" value="athletic">
                <label for="athletic"> Athletic Trainer</label><br>
                <input type="checkbox" id="aerobics" name="aerobics" value="aerobics">
                <label for="aerobics"> Aerobics Istructor</label><br>
                <input type="checkbox" id="physical therapist" name="physical therapist" value="physical therapist">
                <label for="physical therapist"> Physical Therapist</label><br>
                <input type="checkbox" id="weight lifting" name="weight lifting" value="weight lifting">
                <label for="weight lifting"> Weight Lifting</label><br>
            </div>
          </div>
        <div class="instructorimage">
            <span>Select Your Image</span><br><br> 
            <input type="file" name="images" accept="image/*" required><br>
            <br>
         </div>
         <div class="certificates">
            <span>Select Your Certificates</span><br><br> 
            <input type="file" name="pdf_file[]" multiple accept="application/pdf" required>
            
        </div>
        
        <div class="form-submit-btn">
            <input type="submit" value="Apply">
        </div>

      </form>
    </div>
    </div>
  </body>
</html>