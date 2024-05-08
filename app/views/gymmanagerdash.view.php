<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManagerDashBoardStyle.css">
    <title>Admin Panel</title>
 
</head>
<body>

    <div class="side-menu">
        <div class="brand-name">  
            <h1>FIT FUSION</h1>
        </div>
        <ul>
            <li>&nbsp; <h5>Dashboard</h5> </li>
            <a href="gyminstructordash"><li><img src="<?=ROOT?>/assets/images/dashboards/home.jpg" alt="">&nbsp;<h6>Home</h6> </li></a>
            <a href="packages"><li><img src="<?=ROOT?>/assets/images/dashboards/profile.jpeg" alt="">&nbsp;<h6>Packages</h6> </li></a>
            <a href="handlemembercomplaint"><li><img src="<?=ROOT?>/assets/images/dashboards/schedule.jpeg" alt="">&nbsp;<h6>Member complaints</h6> </li></a>
            <a href="addgym"><li><img src="<?=ROOT?>/assets/images/dashboards/workout.jpeg" alt="">&nbsp;<h6>Add Gym</h6> </li></a>

            <a href="manageresources"><li><img src="<?=ROOT?>/assets/images/dashboards/failure.jpeg" alt="">&nbsp;<h6>Manage Gym Resources</h6> </li></a>
            <a href="editgym"><li><img src="<?=ROOT?>/assets/images/dashboards/setting.png" alt="">&nbsp;<h6>Edit Gym</h6> </li></a>
            <a href="appliednutritionists"><li><img src="<?=ROOT?>/assets/images/dashboards/meeting.jpeg" alt="">&nbsp;<h6>Approve Nutritionists</h6> </li>
            <a href="appliedinstructors"><li><img src="<?=ROOT?>/assets/images/dashboards/meeting.jpeg" alt="">&nbsp;<h6>Approve Instructors</h6> </li>
            <a href="attendancememberlist"><li><img src="<?=ROOT?>/assets/images/dashboards/failure.jpeg" alt="">&nbsp;<h6>Assign QR Code</h6> </li></a>
            <a href="markattendance"><li><img src="<?=ROOT?>/assets/images/dashboards/workout.jpeg" alt="">&nbsp;<h6>Mark Member Attendence</h6> </li></a>
            <a href="newmembersreport"><li><img src="<?=ROOT?>/assets/images/dashboards/setting.png" alt="">&nbsp;<h6>Reports</h6> </li></a>
            <a href="logout"><li><img src="<?=ROOT?>/assets/images/dashboards/help.jpeg" alt="">&nbsp; <h6>Logout</h6></li></a>

        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="<?=ROOT?>/assets/images/dashboards/search.jpeg" alt=""></button>
                </div>
                <div class="user">    
                <button onclick="toggleDropdown()">
                    <span class="counter"></span>
                    <img src="<?=ROOT?>/assets/images/dashboards/notification.jpeg" alt="">
                </button>
                    <ul class="dropdownList" id="dropdownList">
                        <!-- <li><a href="#">Germany jagath dammika</a></li>
                        <li><a href="#">Australia suagthdasa</a></li> -->
                    </ul> 
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>754</h1>
                        <h3>Members</h3>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>12</h1>
                        <h3>Nutritionists</h3>
                    </div>
                    <div class="icon-case">
                        <img src="teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2</h1>
                        <h3>Instructors</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>350000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Package</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Premium</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Premium</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Premium</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Premium</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Premium</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Premium</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Members</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td><img src="<?=ROOT?>/assets/images/dashboards/m1.jpeg" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="<?=ROOT?>/assets/images/dashboards/m2.jpeg" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="<?=ROOT?>/assets/images/dashboards/m3.jpeg" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="<?=ROOT?>/assets/images/dashboards/m4.jpeg" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleDropdown() {
            // Get the dropdown list element
            //alert("this is an alert");
            let baselink = window.location.origin
            let link = `${baselink}/FitFusion/public/gymmanagerdash/notification`
            console.log(link)
            fetch(link)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    // Parse the JSON in the response
                    return response.json();
                })
                .then(data => {
                    // // Display the notifications
                    // alert("Hey");
                    showNotifications(data);
                    //console.log(data);
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });

            
            

            var dropdown = document.getElementById('dropdownList');
           
            // Toggle the display property based on the current state
            dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
        }
        
        function showNotifications(notifications) {
                // alert("hey");
                var counter=0;
            // Get the notification list element
                const notificationList = document.getElementById('dropdownList');

                // Clear existing notifications
                notificationList.innerHTML = '';

                // Display each notification in the list
                notifications.forEach(notification => {
                    const listItem = document.createElement('li');
                    listItem.textContent = notification.nmsg;
                    notificationList.appendChild(listItem);
                    counter++;
                });
                var cnt = document.getElementById('counter');
                cnt.innerHTML=counter;

                // If there are no notifications, display a message
                if (notifications.length === 0) {
                    const noNotificationsMessage = document.createElement('li');
                    noNotificationsMessage.textContent = 'No new notifications';
                    notificationList.appendChild(noNotificationsMessage);
                }
        }
    </script>
</body>
</html>
