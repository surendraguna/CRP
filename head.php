<?php
session_start();

// Check if head session token is set and matches the stored user session token
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'head') {
    header("Location: signout.php");
    exit();
}


require_once 'db_connection.php';

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
    <title>Head</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/user.css">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>
<body>
    <div class="body">
        <div class="body-left">
            <div class="leftDiv">
                <div class="lft-title">
                <?php
                    echo '
                        <style>
                            .name span {
                                font-size: 1rem;
                                color: #d0ddff;
                                margin: 0;
                            } 
                            .name {
                                font-size: 2.5rem;
                                color: white;
                                margin: 0;
                                display: grid;
                                place-items: center;
                            }
                        </style>';
                        echo '<span class="name">' . ucfirst(strtolower($name)) . '<span>Welcome to CRP</span></span>';
                ?>
                </div>
                <div class="logo">
                <?php
                    echo '
                        <style> 
                            img{
                                width: 100%;
                                height: 100%;
                                objext-fit: cover;
                            }
                        </style>
                        <img src="data:image/png;base64,' . $row['photo'] . '" alt="Default Image">
                    ';
                ?>
                </div>
                <div class="details">
                    <a href="#profile"><span class="material-symbols-outlined">
                        person
                        </span>Personal info</a>
                    <a href="#complaints"><span class="material-symbols-outlined">
                        database
                        </span>List of complaint
                    </a>
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
        <div class="body-right">
            <div class="body-main" id="profile">
                <iframe src="./profile.php" frameborder="0"></iframe>
            </div>     
            <div class="body-main" id="complaints">
                <iframe src="./list_of_complaints.php" frameborder="0"></iframe>
            </div>
            <div class="body-main" id="account">
                <iframe src="./account.php" frameborder="0"></iframe>
            </div>       
        </div>
    </div>
</body>
</html>