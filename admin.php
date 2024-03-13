<?php
session_start();
require_once 'db_connection.php';

// Check if admin session token is set and matches the stored admin session token
if (!isset($_SESSION['admin_session_token']) || $_SESSION['admin_session_token'] !== $_SESSION['admin_session_token']) {
    // Redirect to login page if session token is missing or doesn't match
    header("Location: signin.php");
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
            var newPassword = document.getElementById('new');
            if (newPassword.type === "password") {
                newPassword.type = "text";
                showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility_off</span>';
            } else {
                newPassword.type = "password";
                showPasswordBtn.innerHTML = '<span class="material-symbols-outlined">visibility</span>';
            }
        }
    </script>
    <link rel="stylesheet" href="./css/internal.css">
</head>
<body>
    <div class="body">
        <div class="left">
            <div class="leftDiv">
                <div class="lft-title">I'm Admin</div>
                <div class="logo">
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
                <a href="#manage" class="btn"><img src="./images/next-arrow.png" alt=""></a>
            </section>
            <section id="manage">
                <div class="title">
                    <h1>Manage Members</h1>
                </div>
                <div class="ad">
                    <form action="add_member.php" class="add" method="post">
                        <div class="lft">
                            <input type="text" name="name" id="name" placeholder="Name" required>
                            <input type="email" name="email" id="email" placeholder="Email" required>
                            <select name="role" id="role" required>
                                <option value="user">User</option>
                                <option value="head">Head</option>
                            </select>
                            <?php
                            // Check if there's a message stored in the session
                            if(isset($_SESSION['status']) && isset($_SESSION['message'])) {
                                // Display the message based on the status
                                if($_SESSION['status'] == "success") {
                                    echo "<p style='color: green; margin-bottom: 1rem'>".$_SESSION['message']."</p>";
                                } elseif($_SESSION['status'] == "error") {
                                    echo "<p style='color: red;'>".$_SESSION['message']."</p>";
                                }
                            
                                // Unset the session variables to clear the message
                                unset($_SESSION['status']);
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>
                        <div class="rgt">
                            <input type="submit" value="Add Member" class="button">
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
                <a href="#account" class="btn"><img src="./images/next-arrow.png" alt=""></a>
            </section>
            <section id="account">
                <div class="title">
                    <h1>Account Mangement</h1>
                </div>
                <div class="inner">
                    <div class="pass">
                        <form action="changePassword.php" method="POST">
                            <div class="password">
                                <label for="">Current Password</label>
                                <input type="password" name="current" id="current" required>
                                <span class="show-password-btn" onclick="toggleCurrentPasswordVisibility()">
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </span>
                            </div>
                            <div class="password">
                                <label for="">New Password</label>
                                <input type="password" name="new" id="new" required>
                                <span class="show-password-btn" onclick="toggleNewPasswordVisibility()">
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
                <a href="#" class="btn"><img src="./images/next-arrow.png" alt=""></a>
            </section>
        </div>
    </div>
</body>
</html>