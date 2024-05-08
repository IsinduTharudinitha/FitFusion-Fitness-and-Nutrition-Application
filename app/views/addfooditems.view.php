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
        .food{
            background-color:#27496A;
            height:100vh;
            width:80vw;
        }

        .food h2 {
            text-align: center;
            color: white;
            margin-bottom:20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
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
            background-color: #5C8EB4
        }
        
    </style>
    <script>
        // JavaScript function to dynamically add input fields for food items and quantities
        function addFoodItem(mealTime) {
            var container = document.getElementById(mealTime + '-container');
            var foodItemWrapper = document.createElement('div');
            foodItemWrapper.classList.add('food-item');
            
            var inputName = document.createElement('input');
            var inputQuantity = document.createElement('input');

            inputName.type = 'text';
            inputName.name = 'item_name[]';
            inputName.placeholder = 'Food item';

            inputQuantity.type = 'number';
            inputQuantity.name = "calories[]";
            inputQuantity.placeholder = 'Calories';

            foodItemWrapper.appendChild(inputName);
            foodItemWrapper.appendChild(inputQuantity);
            container.appendChild(foodItemWrapper);
        }
    </script>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
        <div class="food">
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
            <h2>Add Food Items</h2>
           
            <form action="" method="post">
            <script>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
                alert("Food items added successfully");
                <?php endif; ?>
            </script>
                
               <?php if(!empty($errors)):?>
                <div class="alert" style="background-color: #ffcccc; color: red; padding: 10px; border-radius: 5px;">
                    <?= implode("<br>", $errors)?>
                </div>
                <?php endif ;?>

                <div id="breakfast-container">
                    <div class="food-item">
                        <input type="text" name="item_name[]" placeholder="Food item" required>
                        <input type="number" name="calories[]" placeholder="Calories" required>
                    </div>
                </div>
                <button type="button" onclick="addFoodItem('breakfast')">Add Food Item</button><br><br>

                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
