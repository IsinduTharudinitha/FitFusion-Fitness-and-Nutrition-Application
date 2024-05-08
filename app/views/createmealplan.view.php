<!DOCTYPE html>
<html>
<head>
    <title>Meal Plan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            /* padding: 20px; */
        }
        .meal{
            background-color:#27496A;
            height:100vh;
            overflow:auto;
            width:80vw;
        }

        .meal h2 {
            text-align: center;
            color: white;
            padding-top:10px;
            padding-bottom:30px;
            margin-left:35px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            margin-left:300px;
            padding-top:20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        .food-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .food-item input[type="text"],
        .food-item input[type="number"],select,input {
            width: calc(50% - 10px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin:7px;
        }

        .food-item input[type="number"] {
            margin-left: 10px;
        }

        button[type="button"], input[type="submit"] {
            background-color: #0C243D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="button"]:hover, input[type="submit"]:hover {
            background-color: #5C8EB4;
        }
        /* .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .popup-content {
            text-align: center;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #555;
        } */
    </style>
    <script>
        function addFoodItem(mealTime) {
        var container = document.getElementById(mealTime + '-container');
        var foodItemWrapper = document.createElement('div');
        foodItemWrapper.classList.add('food-item');
        
        var selectFoodItem = document.createElement('select');
        selectFoodItem.name = mealTime + '_name[]';
        var optionPlaceholder = document.createElement('option');
        optionPlaceholder.value = "";
        optionPlaceholder.disabled = true;
        optionPlaceholder.selected = true;
        optionPlaceholder.hidden = true;
        optionPlaceholder.textContent = "Select Food Item";
        selectFoodItem.appendChild(optionPlaceholder);
        
        // Append options for food items
        <?php
        foreach($data['fooddetails'] as $x){
            echo "var option = document.createElement('option');";
            echo "option.value = '$x->fooditem';";
            echo "option.textContent = '$x->fooditem';";
            echo "selectFoodItem.appendChild(option);";
        }
        ?>

        var inputQuantity = document.createElement('input');
        var inputCalories = document.createElement('input');

        inputQuantity.type = 'text';
        inputQuantity.name = mealTime + '_quantity[]';
        inputQuantity.placeholder = 'Quantity';

        inputCalories.type = 'number';
        inputCalories.name = mealTime + '_calories[]';
        inputCalories.placeholder = 'Calories';

        foodItemWrapper.appendChild(selectFoodItem);
        foodItemWrapper.appendChild(inputQuantity);
        foodItemWrapper.appendChild(inputCalories);
        container.appendChild(foodItemWrapper);
    }

    </script>

       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
     <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
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

                <a class="side-bar-tile-link" href="nutritionistdash">
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
                <a class="side-bar-tile-link" href="createmealplan">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Create Meal Plan
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="nutritionistviewmealplan">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           View Meal Plan
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="nutritionistmeetings">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Meetings
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="nutritionistunavailable">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Unavailable Times
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                deployed_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                        Complaints
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="addfooditems">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                         Add Food Items
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
<div class="meal">
<div class="body-header">
                <div class="pfp">
                    <!-- LET THE INSTRUCTOR UPLOAD A PFP, OR KEEP A DEFAULT IMAGE -->
                    <img src="#" alt="">
                </div>
                <div class="welcome-user">
                    <!-- TODO - SHOW LOGGED IN INSTRUCTOR'S NAME -->
                    Welcome, Nutritionist
                </div>
            </div>

<h2>Create Meal Plan</h2>

<form action="" method="post" onsubmit="showSuccessMessage()">
    <!-- <div class="popup" id="success-popup">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <div class="popup-content">
            <h3>Success!</h3>
            <p>Meal plan created successfully!</p>
        </div>
    </div> -->
    <?php if(!empty($errors)):?>
        <div class="alert" style="background-color: #ffcccc; color: red; padding: 10px; border-radius: 5px;">
            <?= implode("<br>", $errors)?>
        </div>
    <?php endif ;?>
    <label for="mememail">Select Member:</label><br>
    <select id="mememail" name="mememail" class="mememail" required>
        <?php
        foreach ($data['mememail'] as $mememail) {
            echo "<option value=\"$mememail\" >$mememail</option>";
        }
        ?>
    </select>
    <br><br>

    <label for="planname">Meal Plan Name:</label><br>
    <input type="text" name="planname" placeholder="Meal Plan Name" required><br><br>

    <!-- <label for="day">Select Day:</label><br>
    <select id="day" name="day" class="day">
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wendsday">Wendsday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
    </select>
    <br><br> -->

    <label for="breakfast">Breakfast:</label><br>
    <div id="breakfast-container">
        <!-- Initial input fields for breakfast -->
        <div class="food-item">
            <select name="breakfast_name[]" id="" required>
                <option value="" disabled selected hidden>Select Food Item</option>
                <?php
                foreach($data['fooddetails'] as $x){
                    echo "<option value='$x->fooditem' >$x->fooditem</option>";
                }
                ?>
            </select>
            <!-- <input type="text" name="breakfast_name[]" placeholder="Food item"> -->
            <input type="text" name="breakfast_quantity[]" placeholder="Quantity" min=0 required>
            <input type="number" name="breakfast_calories[]" placeholder="calories" min=0 required>
        </div>
    </div>
    <button type="button" onclick="addFoodItem('breakfast')">Add Food Item</button><br><br>

    <label for="snack1">Snack 1:</label><br>
    <div id="snack1-container">
        <!-- Initial input fields for snack1 -->
        <div class="food-item">
            <select name="snack1_name[]" id="" required>
                <option value="" disabled selected hidden>Select Food Item</option>
                <?php
                foreach($data['fooddetails'] as $x){
                    echo "<option value='$x->fooditem'>$x->fooditem</option>";
                }
                ?>
            </select>
            <!-- <input type="text" name="snack1_name[]" placeholder="Food item"> -->
            <input type="text" name="snack1_quantity[]" placeholder="Quantity" min=0 required>
            <input type="number" name="snack1_calories[]" placeholder="calories" min=0 required>
        </div>
    </div>
    <button type="button" onclick="addFoodItem('snack1')">Add Food Item</button><br><br>

    <label for="lunch">Lunch:</label><br>
    <div id="lunch-container">
        <!-- Initial input fields for lunch -->
        <div class="food-item">
            <select name="lunch_name[]" id="" required>
                <option value="" disabled selected hidden>Select Food Item</option>
                <?php
                foreach($data['fooddetails'] as $x){
                    echo "<option value='$x->fooditem'>$x->fooditem</option>";
                }
                ?>
            </select>
            <!-- <input type="text" name="lunch_name[]" placeholder="Food item"> -->
            <input type="text" name="lunch_quantity[]" placeholder="Quantity" min=0 required>
            <input type="number" name="lunch_calories[]" placeholder="calories" min=0 required>
        </div>
    </div>
    <button type="button" onclick="addFoodItem('lunch')">Add Food Item</button><br><br>

    <label for="snack2">Snack 2:</label><br>
    <div id="snack2-container">
        <!-- Initial input fields for snack2 -->
        <div class="food-item">
            <select name="snack2_name[]" id="" required>
                <option value="" disabled selected hidden>Select Food Item</option>
                <?php
                foreach($data['fooddetails'] as $x){
                    echo "<option value='$x->fooditem'>$x->fooditem</option>";
                }
                ?>
            </select>
            <!-- <input type="text" name="snack2_name[]" placeholder="Food item"> -->
            <input type="text" name="snack2_quantity[]" placeholder="Quantity" min=0 required>
            <input type="number" name="snack2_calories[]" placeholder="calories" min=0 required>
        </div>
    </div>
    <button type="button" onclick="addFoodItem('snack2')">Add Food Item</button><br><br>

    <label for="dinner">Dinner:</label><br>
    <div id="dinner-container">
        <!-- Initial input fields for dinner -->
        <div class="food-item">
            <select name="dinner_name[]" id="" required>
                <option value="" disabled selected hidden>Select Food Item</option>
                <?php
                foreach($data['fooddetails'] as $x){
                    echo "<option value='$x->fooditem'>$x->fooditem</option>";
                }
                ?>
            </select>
            <!-- <input type="text" name="dinner_name[]" placeholder="Food item"> -->
            <input type="text" name="dinner_quantity[]" placeholder="Quantity"  min=0 required>
            <input type="number" name="dinner_calories[]" placeholder="calories" min=0 required>
        </div>
    </div>
    <button type="button" onclick="addFoodItem('dinner')">Add Food Item</button><br><br>
    <!-- Add similar sections for other meal times -->

    <input type="submit" value="Submit">
</form>
</div>
</div>
    <script>
        function showSuccessMessage() {
            alert("Meal plan created successfully!"); // You can replace this with a custom modal dialog if you prefer
        }
    </script>
</body>
</html>
