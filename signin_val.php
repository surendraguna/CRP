<?php
session_start();
require_once 'db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM user WHERE email='$email'";
$getaUser = mysqli_query($conn, $select);

if(mysqli_num_rows($getaUser) == 1) {
    $user = mysqli_fetch_assoc($getaUser);

    // Verify password
    if($password == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        
        if ($user['role'] == 'admin') {
            $_SESSION['admin_session_token'] = bin2hex(random_bytes(32)); // Generates a random 32-byte session token for admin
        } else {
            $_SESSION['user_session_token'] = bin2hex(random_bytes(32)); // Generates a random 32-byte session token for user
        }
        
        // Redirect to dashboard or any other page after successful login
        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid password";
    }
} else {
    $_SESSION['error'] = "Invalid email";
}

header("Location: signin.php");
exit();
?>
