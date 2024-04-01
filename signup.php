<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="./css/style.css">
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
                <p>Sign up</p>
            </div>
            <div class="bottom">
                <form action="signup_val.php" method="POST">
                    <div class="input-box">
                        <input id="name" name="name" type="text" required>
                        <label for="">Name</label>
                        <span>
                            <label class="material-symbols-outlined">
                                person
                            </label>
                        </span>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" id="email" required>
                        <span>
                            <label class="material-symbols-outlined">
                                mail
                            </label>
                        </span>
                        <label for="">E-mail</label>
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" name="password" required>
                        <span>
                            <label class="material-symbols-outlined">
                                lock
                            </label>
                        </span>
                        <label for="">Create Password</label>
                        <span class="show-password-btn" onclick="togglePasswordVisibility()">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </span>
                    </div>
                    </div>  
                    <div class="foot">
                        <div class="msg">
                            <?php
                            if(isset($_SESSION['message'])) {
                                if ($_SESSION['message'] == "error" && isset($_SESSION['error'])) {
                                    echo "<p style='color: red; text-align: center; margin: 10px; padding: 0;'>".$_SESSION['error']."</p>";
                                    unset($_SESSION['error']); // Clear the error message after displaying
                                } elseif ($_SESSION['message'] == "success" && isset($_SESSION['success'])) {
                                    echo "<p style='color: green; text-align: center; margin: 10px; padding: 0;'>".$_SESSION['success']."</p>";
                                    unset($_SESSION['success']); // Clear the success message after displaying
                                }
                                unset($_SESSION['message']); // Clear the message type after displaying
                            }
                            ?>
                        </div>
                        <div class="btn-top">
                            <a href="signin.php" class="btn-sub">Already have an account ?</a>
                            <input type="submit" class="btn-sub" value="Sign up">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>