<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: signout.php");
    exit();
}

$id = $_SESSION['user_id'];
//find name of id
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/internal.css">
</head>
<body>
    <div class="body">
        <div class="left">
            <div class="leftDiv">
                <div class="lft-title">I'm Admin</div>
                <div class="logo" style="border-radius: 50%;">
                <?php
                echo '
                    <style> 
                        img{
                            width: 100%;
                            height: 100%;
                            objext-fit: cover;
                            border-radius: 50%;
                        }
                    </style>
                    <img src="data:image/png;base64,' . $row['photo'] . '" alt="Default Image">
                ';
                ?>
                </div>
                <div class="details">
                    <a href="#dashboard"><span class="material-symbols-outlined">
                        dashboard
                        </span>Dashbord</a>
                    <a href="#profile"><span class="material-symbols-outlined">
                        person
                        </span>Personal info
                    </a>
                    <a href="#manage"><span class="material-symbols-outlined">
                        group
                        </span>Manage Users</a>
                    <a href="#account">
                        <span class="material-symbols-outlined">
                        settings
                        </span>
                        Account
                    </a>
                    <a href="signout.php">
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="right">
            <section id="dashboard">
                <div class="title">
                    <h1>Dashboard</h1>
                </div>
                <div class="top">
                    <div class="box">
                        <span class="material-symbols-outlined">
                            how_to_reg
                        </span>
                        <p>Registered</p>
                    </div>
                    <div class="box">
                        <span class="material-symbols-outlined">
                            pending
                        </span>
                        <p>Pending</p>
                    </div>
                    <div class="box">
                        <span class="material-symbols-outlined">
                            verified
                        </span>
                        <p>Sloved</p>
                    </div>
                </div>
                <div class="top">
                    <div class="box">
                        <span class="material-symbols-outlined">
                            groups
                        </span>
                        <p>Total Members</p>
                    </div>
                    <div class="box">
                        <span class="material-symbols-outlined">
                            shield_person
                        </span>
                        <p>Head</p>
                    </div>
                    <div class="box">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        <p>User</p>
                    </div>
                </div>
            </section>
            <div class="body-right">
                <div class="body-main" id="profile">
                    <iframe src="./profile.php" frameborder="0"></iframe>
                </div>   
                <div class="body-main" id="manage">
                    <iframe src="./manage.php" frameborder="0"></iframe>
                </div>    
                <div class="body-main" id="account">
                    <iframe src="./account.php" frameborder="0"></iframe>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>