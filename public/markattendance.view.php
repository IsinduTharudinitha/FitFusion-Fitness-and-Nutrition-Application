<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/MarkAttendanceStyle.css">
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

                <a class="side-bar-tile-link" href="managerdash">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Gym
                        </div>
                    </li>
                </a>
                <a class="side-bar-tile-link" href="newmembersreport">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                        <div class="sb-tab-content">
                           Reports
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="manageresources">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                fitness_center
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Machines
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="packages">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                deployed_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Packages
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="appliedinstructors">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Instructors
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="appliednutritionists">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Nutritionists
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="attendancememberlist">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                qr_code
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Assign QR
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="markattendance">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                person_add
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Attendance
                        </div>
                    </li>
                </a>

                <a class="side-bar-tile-link" href="handlemembercomplaint">
                    <li class="side-bar-tile">
                        <div class="sb-tab-content">
                            <span class="material-symbols-outlined">
                                report
                            </span>
                        </div>
                        <div class="sb-tab-content">
                            Complaint Handling
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
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Member Attendance</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="<?=ROOT?>/assets/images/search-btn.png" alt="" alt="">
            </div>

            <!-- <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div> -->
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Member Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Time<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Weekday<span class="icon-arrow">&UpArrow;</span></th>
                        <!-- <th>View <span class="icon-arrow"></span></th> -->
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($data['attendance'])){
                    foreach($data['attendance'] as $x){
                    
                        echo '
                        <tr>
                            <td> '.$x->id.' </td>
                        
                            <td> '.$x->memberemail.'  </td>
                            <td>  '.$x->datee.' </td>
                            <td>  '.$x->time.' </td>
                            <td>  '.$x->weekdy.' </td>
                       
                        </tr>
                        ';
                    
                   
                    
                }
                }
                else{
                    echo '<tr><td>Currentyl no record available</td></tr>';
                }

                ?>
                    
                    
                </tbody>
            </table>
        </section>
    </main>
    <script src="<?=ROOT?>/assets/js/replymembercomplaint.js"></script>
    <div class="qr-container">
                <div class="scanner-con">
                    <h3 class="">Scan Your QR Code Here For Your Attedance</h3>
                    <video id="interactive" class="viewport" width="80%" style="margin: left 30px;">
                </div>

                <div class="qr-detected-container" style="display: none;">
                    <form action="" method="POST">
                        <h3 class="">Member QR Detected!</h3>
                        <input type="hidden" id="detected-qr-code" name="detected-qr-code">
                        <button type="submit">Submit Attendance</button>
                    </form>
                </div>
            </div>
    </div>
    
    <!-- instaScan -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>

        
        let scanner;

        function startScanner() {
            scanner = new Instascan.Scanner({ video: document.getElementById('interactive') });

            scanner.addListener('scan', function (content) {
                const qrcode = document.getElementById('detected-qr-code');
                qrcode.value=content;
                //$("#detected-qr-code").val(content);
                console.log(content);
                scanner.stop();
                document.querySelector(".qr-detected-container").style.display = '';
                document.querySelector(".scanner-con").style.display = 'none';
            });

            Instascan.Camera.getCameras()
                .then(function (cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                        alert('No cameras found.');
                    }
                })
                .catch(function (err) {
                    console.error('Camera access error:', err);
                    alert('Camera access error: ' + err);
                });
        }

        document.addEventListener('DOMContentLoaded', startScanner);

        // function deleteAttendance(id) {
        //     if (confirm("Do you want to remove this attendance?")) {
        //         window.location = "./endpoint/delete-attendance.php?attendance=" + id;
        //     }
        // }
    </script>
</div>
    
</body>
</html>