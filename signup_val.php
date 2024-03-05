<?php
session_start();
require_once 'db_connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM userauth where email='$email'";
$getaUser = mysqli_query($conn, $select);
if(mysqli_num_rows($getaUser) == 1){
    $_SESSION['message'] = "error";
    $_SESSION['error'] = "Already user exists";
    unset($_SESSION['success']); // Clear any existing success message
    header("Location: signup.php");
    exit();
} else {
    $encPass = password_hash($password, PASSWORD_BCRYPT);
    $insert = "INSERT INTO userauth (name, email, password) values ('$name', '$email', '$encPass')";
    mysqli_query($conn, $insert);
    
    $_SESSION['message'] = "success";
    $_SESSION['success'] = "Successfully registered";
    unset($_SESSION['error']); // Clear any existing error message
    header("Location: signup.php");
    exit();
}
?>
