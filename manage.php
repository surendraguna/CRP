<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
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
    <title>Manage User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/internal.css">  
    <link rel="stylesheet" href="./css/use.css">
    <style>
        body{
            width: 100%;
            height: 100%;
            background-color: #d0ddff;
            margin: 0;
            padding: 0;

        }
        .body{
            width: 100%;
        }
        #manage{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="body">
        <section id="manage">
            <div class="title">
                <h1>Manage Members</h1>
            </div>
            <div class="ad">
                <form action="add_member.php" class="add" method="post">
                    <div class="lft">
                        <input type="text" name="name" id="name" placeholder="Name" required style="cursor: auto">
                        <input type="email" name="email" id="email" placeholder="Email" required style="cursor: auto">
                        <select name="role" id="role" required style="cursor: auto">
                            <option value="user">User</option>
                            <option value="head">Head</option>
                        </select>
                        <?php
                        // Check if there's a message stored in the session
                        if(isset($_SESSION['status']) && isset($_SESSION['message'])) {
                            // Display the message based on the status
                            if($_SESSION['status'] == "success") {
                                echo "<p style='color: green;'>".$_SESSION['message']."</p>";
                            } elseif($_SESSION['status'] == "error") {
                                echo "<p style='color: red; '>".$_SESSION['message']."</p>";
                            }
                        
                            // Unset the session variables to clear the message
                            unset($_SESSION['status']);
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>
                    <div class="rgt">
                        <input type="submit" value="Add Member" class="button" style="width: 25vw; height: 6vh;">
                    </div>
                </form>
            </div>
            <div class="manage-div">
                <div class="head">
                    <div class="title">
                        Head Data
                    </div>
                    <?php
                        // Fetch data for users with role 'user' from MySQL
                    $sql = "SELECT * FROM user WHERE role = 'head'";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and display the data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <link rel="stylesheet" type="text/css" href="./css/internal.css">
                                <div class="user-details">
                                    <div class="name">
                                        ' . $row['name'] . '
                                    </div>
                                    <div class="remove">
                                        <a class="remove" href="remove_user.php?id=' . $row['id'] . '&role=head">Remove</a><br>
                                    </div>
                                </div>
                            ';
                        }
                    } else {
                        echo '<div class="no-data">No user data available</div>';
                    }
                    ?>
                </div>
                <div class="user">
                     <div class="title">
                        User Data
                    </div>
                    <?php
                    // Fetch data for users with role 'user' from MySQL
                    $sql = "SELECT * FROM user WHERE role = 'user'";
                    $result = mysqli_query($conn, $sql);

                        // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and display the data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <link rel="stylesheet" type="text/css" href="./css/internal.css">                                    
                                <div class="user-details">
                                    <div class="name">
                                        ' . $row['name'] . '
                                    </div>
                                    <div class="remove">
                                        <a class="remove" href="remove_user.php?id=' . $row['id'] . '&role=user">Remove</a><br>
                                    </div>
                                </div>
                            ';
                        }
                    } else {
                        echo '<div class="no-data">No user data available</div>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
