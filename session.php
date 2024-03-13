<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: signin.php");
    }
    if (isset($_SESSION['email'])) {
        header("Location: user.php");
    }

?>