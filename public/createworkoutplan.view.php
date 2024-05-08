<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Workout Plan</title>
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/CreatedworkoutplansStyle.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- <link rel="stylesheet" href="<?=ROOT?>/assets/css/HandleMemberComplaintStyle.css"> -->
    <style>
        /* Add CSS styles for the buttons */
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */
        .con2{
            /* margin-left:200px; */
            width:80vw;
            background-color:#27496A;
            /* padding-top:50px; */
            height:100vh;
            /* margin-top:940px; */
            /* margin-right:200px; */
            overflow:auto;
        }
        /* .con2 body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        } */

        .con2 nav {
            padding: 20px;
            background-color: orange;
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .con2 .logo p {
            font-size: 30px;
            font-weight: bold;
            color: black;
            text-transform: uppercase;
            cursor: pointer;
            margin: 0;
        }

        .con2 ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .con2 li {
            margin-right: 20px;
        }

        .con2 li a {
            font-size: 16px;
            color: black;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .con2 li a:hover {
            color: white;
        }

        .con2 form {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 70%;
            /* margin-top: 20px; */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            margin-left:80px;
            margin-top:20px;
            
        
        }

        .con2 h1 {
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
        }

        .con2 label {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
            margin-top:7px;
   
        }

        .con2 input[type="text"],
        select,
        button {
            width: 60%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .con2 select {
            text-align:center;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="#666" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 18px auto;
            padding-right: 30px;
        }

        .con2 button[type="submit"] {
            margin-top: 20px;
            margin-left: 500px;
            width: 20%;
            background-color: grey;
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .con2 button:hover {
            background-color: #0056b3;
        }

        .con2 table {
            width: 100%;
            border-collapse: collapse;
        }

        .con2 th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color:white;
        }

        .con2 th {
            background-color: #0C243D;
        }

        .con2 input[type="time"],
        select {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .con2 input[type="text"],.nums1,
        select {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top:15px;
        }
        .con2 .nums2{
            width: 70px;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top:0px;
        }

        .con2 select[id="workout_type"] {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .con2 .add-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
            width: 10%;
            margin-left: 500px;
        }

        .con2 .add-row-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<div class="main-container">
<div class="side-bar-container">
            <div class="logo-tab">
                FITFUSION
            </div>
            <ul class="side-bar-content">
                
                <!-- <li class="current-side-bar-tile">
                    <div class="sb-tab-content">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                    </div>
                    <div class="sb-tab-content">
                        Dashboard
                    </div>
                </li> -->

                <a class="side-bar-tile-link" href="instructordash">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Dashboard
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="createworkoutplan">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Create Workout Plan
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="viewworkoutplans">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           View Workout Plan
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="selectunavailableslot">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Select Unavailble Time Slots
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="instructormeetings">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                deployed_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                        Meetings
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="memberfeed">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                         Feedbacks
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="logout">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                        </div>
                        <div class="sb-tab-content">Logout</div>
                    </li>
                </a>

            </ul>
        </div>
        
    <div class="con2">
    <div class="body-header">
                <div class="pfp">
                    <!-- LET THE INSTRUCTOR UPLOAD A PFP, OR KEEP A DEFAULT IMAGE -->
                    <img src="#" alt="">
                </div>
                <div class="welcome-user">
                    <!-- TODO - SHOW LOGGED IN INSTRUCTOR'S NAME -->
                    Welcome, Instructor
                </div>
    </div>

    <form id="workoutForm" method="POST">
        <script>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" ): ?>
            alert("Workout Plan created successfully");
            <?php endif; ?>
        </script>
        <h1>Create Workout Plan</h1>




        <label for="workoutname"><b>workout name:</b></label>
        <input type="text" id="workoutname" name="workoutname" required>

        <label for="main_goal"><b>Main Goal:</b></label>
        <input type="text" id="main_goal" name="main_goal" required>

        <label for="workout_Type"><b>Workout Type:</b></label>
        <select id="workout_Type" name="workout_Type" required>
            <option value="cardio">Cardio</option>
            <option value="strength">Strength Training</option>
            <option value="flexibility">Flexibility</option>
            <option value="other">Other</option>
        </select>

        <label for="training_level"><b>Training Level:</b></label>
        <select id="training_level" name="training_level" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <label for="program_duration"><b>Program Duration (months):</b></label>
        <input class="nums1" type="number" id="program_duration" name="program_duration" min="0" required><br>
        <br>
        <label for="days_per_week"><b>Days per week:</b></label>
        <input class="nums1" type="number" id="days_per_week" name="days_per_week" min="0" required>

        <label for="workout_id"><b>workout id:</b></label>
        <input type="text" id="workout_id" name="workout_id" required>

        <!-- <label for="target_gender"><b></b></label>
        <input type="text" id="target_gender" name="target_gender" required> -->
        <br>
        <label for="target_gender"><b>Target Gender:</b></label>
        <select id="target_gender" name="target_gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <!-- <label for="supplements"><b>Recommended Supps:</b></label>
        <div style="display: flex; gap: 20px;">
            <div>
                <input type="checkbox" id="protein" name="supplements[]" value="protein">
                <label for="protein">Protein Powder</label>
            </div>
            <div>
                <input type="checkbox" id="creatine" name="supplements[]" value="creatine">
                <label for="creatine">Creatine</label>
            </div>
            <div>
                <input type="checkbox" id="bcaa" name="supplements[]" value="bcaa">
                <label for="bcaa">BCAA</label>
            </div>
            <div>
                <input type="checkbox" id="multivitamin" name="supplements[]" value="multivitamin">
                <label for="multivitamin">Multivitamin</label>
            </div>
        </div> -->

        <?php if (isset($data['errors'])): ?>
            <div style="color: red;"><?php echo $data['errors']; ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Exercise</th>
                    <th>Machine</th>
                    <th>Sets</th>
                    <th>Reps</th>
                    <th>Time(mins)</th>
                    <th>Rest Time(mins)</th>
                </tr>
            </thead>
            <tbody id="exerciseTableBody">
                <label for="exercises"><b>Exercises:</b></label>
                <tr>

                    <td>
                        <select name="exercises[0][exercise]" required>
                            <option value="">Select exercise...</option>
                            <option value="pushups">Pushups</option>
                            <option value="squats">Squats</option>
                            <option value="plank">Plank</option>
                            <option value="lunges">Lunges</option>
                            <option value="deadlifts">Deadlifts</option>
                            <option value="burpees">Burpees</option>
                            <!-- Add more exercise options as needed -->
                        </select>
                    </td>
                    <td>
                        <select name="exercises[0][machine]" required>
                            <?php
                                foreach($data as $x){
                                    echo '
                                        <option value="'.$x.'">'.$x.'</option>
                                    ';
                                }
                            ?>
                            <!-- <option value="">Select machine...</option>
                            <option value="1">Treadmill</option>
                            <option value="2">Bench Press</option>
                            <option value="3">Exercise Bike</option>
                            <option value="4">Leg Press Machine</option>
                            <option value="5">Rowing Machine</option> -->
                        </select>
                    </td>
                    <td>
                        <!-- <select name="exercises[0][sets]">
                            <option value="">Select sets...</option>
                            <option value="1">1 set</option>
                            <option value="2">2 sets</option>
                            <option value="3">3 sets</option>
                            <option value="4">4 sets</option>
                            <option value="5">5 sets</option>
                        </select> -->
                        <input class="nums2"  type="number" name="exercises[0][sets]" min="0" required>
                    </td>
                    <td>
                        <!-- <select name="exercises[0][reps]">
                            <option value="">Select reps...</option>
                            <option value="1">1 Rep</option>
                            <option value="2">2 Reps</option>
                            <option value="3">3 Reps</option>
                            <option value="4">4 Reps</option>
                            <option value="5">5 Reps</option>
                        </select> -->
                        <input class="nums2" type="number" name="exercises[0][reps]" min="0" required>
                    </td>
                    <td>
                        <input class="nums2" type="number" name="exercises[0][time]" min="0" required>
                    </td>
                    <td>
                        <input class="nums2" type="number" name="exercises[0][rest_time]" min="0" required>
                    </td>
                </tr>

                
                
                <!-- Add more rows for additional exercises -->
            </tbody>
        </table>



        <button type="button" class="add-btn" onclick="duplicateRow()">ADD</button>
        <button type="submit"><b>Create</b></button>
    </form>
    </div>
    <!-- </div> -->
    <script>
    function duplicateRow() {
        // Get the table body
        var tableBody = document.getElementById("exerciseTableBody");
        
        // Create a new row
        var newRow = document.createElement("tr");
        
        // HTML content for the new row
        newRow.innerHTML = `
            <td>
                <select name="exercises[${tableBody.rows.length}][exercise]" required>
                    <option value="">Select exercise...</option>
                    <option value="pushups">Pushups</option>
                    <option value="squats">Squats</option>
                    <option value="plank">Plank</option>
                    <option value="lunges">Lunges</option>
                    <option value="deadlifts">Deadlifts</option>
                    <option value="burpees">Burpees</option>
                    <!-- Add more exercise options as needed -->
                </select>
            </td>
            <td>
                <select name="exercises[${tableBody.rows.length}][machine]" required>
                    <option value="">Select machine...</option>
                    <option value="1">Treadmill</option>
                    <option value="2">Bench Press</option>
                    <option value="3">Exercise Bike</option>
                    <option value="4">Leg Press Machine</option>
                    <option value="5">Rowing Machine</option>
                </select>
            </td>
            <td>
                <input class="nums2" type="number" name="exercises[${tableBody.rows.length}][sets]" min="0" required>
            </td>
            <td>
                <input class="nums2" type="number" name="exercises[${tableBody.rows.length}][reps]" min="0" required>
            </td>
            <td>
                <input class="nums2" type="number" name="exercises[${tableBody.rows.length}][time]" min="0" required>
            </td>
            <td>
                <input class="nums2" type="number" name="exercises[${tableBody.rows.length}][rest_time]" min="0" required>
            </td>
        `;
        
        // Append the new row to the table body
        tableBody.appendChild(newRow);
    }
</script>



   
</div>

</body>

</html>