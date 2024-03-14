<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signout.php");
    exit();
}

$id = $_SESSION['user_id'];
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
                <p>Change Profile picture</p>
                <form action="changeImg.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="upload" id="upload">
                    <input class="btn" type="submit" value="Upload" name="submit">
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
                <table>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>
