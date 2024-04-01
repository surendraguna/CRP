<?php
session_start();

// Check if the user is signed in as a regular user
if (isset($_SESSION['user_session_token'])) {
    // Redirect to profile page
    header("Location: user.php");
    exit();
} 

// Check if the user is signed in as an admin
elseif (isset($_SESSION['admin_session_token'])) {
    header("Location: admin.php");
    exit();
} 

else {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <script src="./js/script.js"></script>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/logo1.png" alt="">
        </div>
        <marquee behavior="scroll" direction="right" scrollamount="20">
            <div class="text">
                <h1>Crime report portal</h1>
                <p>Empowering People with Information Technology</p>
            </div>
        </marquee>
    </header>
    <div class="outer">
        <div class="inner">
            <div class="top">
                <img src="./images/logo.png" alt="">
                <p>Sign in</p>
            </div>
            <div class="bottom">
                <form action="signin_val.php" method="POST">
                    <div class="input-box">
                        <input type="email" id="email" name="email" required>
                        <span>
                            <label class="material-symbols-outlined">
                                mail
                            </label>
                        </span>
                        <label>E-mail</label>         
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" name="password" required>
                        <span>
                            <label class="material-symbols-outlined">
                                lock
                            </label>
                        </span>
                        <label for="">Password</label>
                        <span class="show-password-btn" onclick="togglePasswordVisibility()">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </span>
                    </div>  
                    <div class="foot">
                        <div class="msg">
                            <?php
                                // Check if error message is set and display it
                                if (isset($_SESSION['message']) && $_SESSION['message'] == "error") {
                                    echo "<p style='color: red; text-align: center; margin: 10px; padding: 0;'>".$_SESSION['error']."</p>";
                                    unset($_SESSION['message']);
                                    unset($_SESSION['error']);
                                }
                                // else if (isset($_SESSION['message']) && $_SESSION['message'] == "success") {
                                //     echo "<p style='color: green; text-align: center; margin: 10px; padding: 0;'>".$_SESSION['success']."</p>";
                                //     unset($_SESSION['message']);
                                //     unset($_SESSION['success']);
                                // }
                            ?>
                        </div>
                        <div class="btn-top">
                            <a href="signup.php" class="btn-sub">Don't have an account ?</a>
                            <input type="submit" class="btn-sub" value="Sign in">
                        </div>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</body>
</html>
