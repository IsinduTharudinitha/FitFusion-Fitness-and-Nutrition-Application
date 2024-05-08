<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/HandleMemberComplaintStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
</head>
<body>
<style>
        /* Add CSS styles for the feedback card */
        .feedback-card {
            display: none;
            height: 300px;
            width: 400px;
            padding: 50px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }


        .feedback-card h3 {
            margin-bottom: 20px;
        }

        .feedback-card p {
            margin-bottom: 20px;
        }

        .feedback-card button {
            margin-top: 50px;
            padding: 10px 20px;
            background-color: #0C243D;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .feedback-card button:hover {
            background-color: #f55;
        }
    </style>
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
                           Select Unavailable Time Slots
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
    <div class="container">
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
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Feedbacks from Members</h1>
            <!-- <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="<?=ROOT?>/assets/images/search-btn.png" alt="" alt="">
            </div>
  -->
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Member Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Actions<span class="icon-arrow">&UpArrow;</span></th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($data as $x){
                    
                    echo '
                    <tr>
                        <td> '.$x->id.' </td>
                    
                        <td> '.$x->name.'  </td>
                        <td>  '.$x->email.' </td>
                        <td>
                            <button class="status view" onclick="showFeedbackCard(' . $x->id . ')">View&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        </td>
                    </tr>
                    ';
                }
                ?>
                    
                    
                </tbody>
            </table>
        </section>
    </main>
    <div id="feedbackCard" class="feedback-card">
        <h3>Feedback</h3>
        <!-- Placeholder for feedback content -->
        <p id = "feedbackContent"></p>
        <button onclick="hideFeedbackCard()">Close</button>
    </div>
    </div>
    <script src="<?=ROOT?>/assets/js/replymembercomplaint.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
function showFeedbackCard(id) {
    const idd = { i: id };
    let baselink = window.location.origin;
    let link = `${baselink}/Fitfusion/public/memberfeed/feedback`;

    document.getElementById('feedbackCard').style.display = 'block';

    // Fetch feedback data using AJAX
    $.ajax({
        type: "POST",
        url: link,
        data: idd,
        cache: false,
        success: function(res) {
            // Parse the JSON response
            const feedbackData = JSON.parse(res);
            console.log(feedbackData);
            // Set the fetched feedback content to the feedback card
            document.getElementById('feedbackContent').textContent = feedbackData;
        },
        error: function(xhr, status, error) {
            console.error('Error fetching feedback:', error);
        }
    });
}

function hideFeedbackCard() {
    // Hide the feedback card
    document.getElementById('feedbackCard').style.display = 'none';
}
    </script>
    </div>
</body>
</html>