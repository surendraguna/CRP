<?php
session_start();

// Check if admin session token is set and matches the stored admin session token
if (!isset($_SESSION['admin_session_token']) || $_SESSION['admin_session_token'] !== $_SESSION['admin_session_token']) {
    // Redirect to login page if session token is missing or doesn't match
    header("Location: signin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/internal.css">
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
</head>
<body>
    <div class="body">
        <div class="left">
            <div class="leftDiv">
                <div class="lft-title">I'm Admin</div>
                <div class="logo" >

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
                    <form action="" class="add">
                        <div class="lft">
                            <input type="text" name="name" id="name" placeholder="Name">
                            <input type="email" name="email" id="email" placeholder="Email">
                            <input type="password" name="password" id="password" placeholder="Password">
                            <select name="type" id="type">
                                <option value="user">User</option>
                                <option value="head">Head</option>
                            </select>
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
                    </div>
                    <div class="user">
                        <div class="title">
                            Users Data
                        </div>
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