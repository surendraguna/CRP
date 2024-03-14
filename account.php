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
    <title>Account Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/internal.css">  
    <link rel="stylesheet" href="./css/use.css">
    <script>
        function toggleCurrentPasswordVisibility() {
            var currentPassword = document.getElementById('current');
            var showPasswordBtn = document.querySelector(".show-password-btn");
            if (currentPassword.type === "password") {
                currentPassword.type = "text";
                showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility_off</span>';
            } else {
                currentPassword.type = "password";
                showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility</span>';
            }
        }
        function toggleNewPasswordVisibility() {
            var currentPassword = document.getElementById('new');
            var showPasswordBtn = document.querySelector(".show-password-btn1");
            if (currentPassword.type === "password") {
                currentPassword.type = "text";
                showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility_off</span>';
            } else {
                currentPassword.type = "password";
                showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility</span>';
            }
        }
        
    </script>
</head>
<body>
    <div class="body">
    <section id="account">
            <div class="title">
                <h1>Account Management</h1>
            </div>
            <div class="inner">
                <div class="pass">
                    <form action="changePassword.php" method="POST">
                        <div class="password">
                            <label for="current">Current Password</label>
                            <input type="password" name="current" id="current" required>
                            <span class="show-password-btn" onclick="toggleCurrentPasswordVisibility()">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </span>
                        </div>
                        <div class="password">
                            <label for="new">New Password</label>
                            <input type="password" name="new" id="new" required>
                            <span class="show-password-btn1" onclick="toggleNewPasswordVisibility()">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </span>
                        </div>
                        <input type="submit" value="Change Password" class="button">   
                    </form>
                </div>

                <?php
                // Check if there's a message stored in the session
                if (isset($_SESSION['message'])) {
                    // Display the message
                    if ($_SESSION['message'] == 'success') {
                        echo '<div style="color: green;">' . $_SESSION['success'] . '</div>';
                    } elseif ($_SESSION['message'] == 'error') {
                        echo '<div style="color: red;">' . $_SESSION['error'] . '</div>';
                    }
                    // Unset the message to avoid displaying it again on subsequent page loads
                    unset($_SESSION['message']);
                    unset($_SESSION['success']);
                    unset($_SESSION['error']);
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
