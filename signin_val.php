<?php
session_start();
if(isset($_SESSION['user_id']) || isset($_SESSION['role']) || isset($_SESSION['admin_session_token']) || isset($_SESSION['user_session_token']) || isset($_SESSION['head_session_token'])) {
    session_destroy();
    header("Location: signout.php");
    exit();
}
require_once 'db_connection.php';
$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM user where email='$email'";
$getaUser = mysqli_query($conn, $select);
if(mysqli_num_rows($getaUser) == 1){
    $user = mysqli_fetch_assoc($getaUser);
    if($password == $user['password']){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'admin') {
            $_SESSION['admin_session_token'] = bin2hex(random_bytes(32)); // Generates a random 32-byte session token for admin 
            // Redirect to admin dashboard after successful login
            header("Location: admin.php");
            exit();
        } else if ($user['role'] == 'user'){
            $_SESSION['user_session_token'] = bin2hex(random_bytes(32)); // Generates a random 32-byte session token for user
            // Redirect to user dashboard after successful login
            header("Location: user.php");
            exit();
        } else if($user['role'] == 'head'){
            $_SESSION['head_session_token'] = bin2hex(random_bytes(32)); // Generates a random 32-byte session token for head
            // Redirect to head dashboard after successful login
            header("Location: head.php");
            exit();
        }
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