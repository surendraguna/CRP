<?php
session_start();
require_once 'db_connection.php';
$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM user where email='$email'";
$getaUser = mysqli_query($conn, $select);
if(mysqli_num_rows($getaUser) == 1){
    $user = mysqli_fetch_assoc($getaUser);
    echo $user['password'];
    if($password == $user['password']){
        $_SESSION['message'] = "success";
        $_SESSION['success'] = "Successfully logged in";
        unset($_SESSION['error']);
        header("Location: signin.php");
        exit();
    } else {
        $_SESSION['message'] = "error";
        $_SESSION['error'] = "Invalid password";
        unset($_SESSION['success']);
        header("Location: signin.php");
        exit();
    }
} else {
    $_SESSION['message'] = "error";
    $_SESSION['error'] = "Invalid email";
    unset($_SESSION['success']);
    header("Location: signin.php");
    exit();
}