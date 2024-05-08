

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/ManageResourcesStyle.css">
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
            position: absolute;
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
            background-color: orange;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .feedback-card button:hover {
            background-color: #f55;
        }
    </style>
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
<div class="maincontainer">
    <div class="tbl">
        <table>
            <thead>
            <tr>
                <td scope="col"></td>
                <td scope="col">Member id</td>
                <td scope="col">Name</td>
                <td scope="col">Email</td>
                <td scope="col">Actions</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $workoutid=$data['workoutid'];
for ($x = 0; $x < count($data)-1; $x++) {
    $row = $data[$x];
    $memberid = $row->id;
    $name = $row->gymname;
    $email = $row->memberemail;
    
    // Use htmlspecialchars to escape special characters
    echo '<tr>
                <th></th>
                <td>' . $memberid . '</td>
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td>
                    <a href="members/assign?memberid=' . $memberid . '&workoutid=' . $workoutid . '"><button>Assign</button></a>
                </td>
            </tr>';
}
?>

            </tbody>
        </table>
    </div>
</div>


</body>
</html>

