<?php
session_start();
require_once 'db_connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM user where email='$email'";
$getaUser = mysqli_query($conn, $select);
if(mysqli_num_rows($getaUser) == 1){
    $_SESSION['message'] = "error";
    $_SESSION['error'] = "Already user exists";
    unset($_SESSION['success']); 
    header("Location: signup.php");
    exit();
} else {
    //$encPass = password_hash($password, PASSWORD_BCRYPT);
    $insert = "INSERT INTO user (name, email, password) values ('$name', '$email', '$password')";
    mysqli_query($conn, $insert);
    
    $_SESSION['message'] = "success";
    $_SESSION['success'] = "Successfully registered";
    unset($_SESSION['error']);
    header("Location: signup.php");
    exit();
}
?>
