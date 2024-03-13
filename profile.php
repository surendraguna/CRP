<?php
session_start();

// Check if user session token is set and matches the stored user session token
if (!isset($_SESSION['user_session_token']) || $_SESSION['user_session_token'] !== $_SESSION['user_session_token']) {
    // Redirect to login page if session token is missing or doesn't match
    header("Location: signup.php");
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
    <title>Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/use.css">
</head>
<body>
    <div class="body">
        <div class="pro">
            <div class="pro-inf">
                <p>Profile picture</p>
                <!--    <a href="">click here to change picture</a> -->
                <form action="changeImg.php" method="post" enctype="multipart/form-data" target="_top">
                    <input type="file" name="upload" id="upload">
                    <input type="submit" value="Upload" name="submit">
                </form>
                <div class="logo">
                    <?php
                        echo '
                            <style> 
                                img{
                                    width: 100%;
                                    height: 100%;
                                    objext-fit: cover;
                                    border-radius: 50%;
                                    cursor: pointer;
                                }
                            </style>
                            <img src="data:image/png;base64,' . $row['photo'] . '" alt="Default Image">
                        ';
                    ?>
                </div>
            </div>
            <div class="pro-inf">
                <p>Name </p>
                <p><?php echo $row['name']; ?></p>
                <!-- <a href="">Change Name</a> -->
            </div>
            <div class="pro-inf">
                <p>Email </p>
                <p><?php echo $row['email']; ?></p>
                <!-- <a href="">Change Email</a> -->
            </div>
        </div>
    </div>
</body>
</html>
