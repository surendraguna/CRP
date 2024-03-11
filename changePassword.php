<?php
session_start();
require_once 'db_connection.php';

$current = $_POST['current'];
$new = $_POST['new'];
$user_id = $_SESSION['user_id'];

$select = "SELECT * FROM user where id='$user_id'";
$getaUser = mysqli_query($conn, $select);
if(mysqli_num_rows($getaUser) == 1){
    $user = mysqli_fetch_assoc($getaUser);
    if($current == $user['password']){
        $update = "UPDATE user SET password='$new' WHERE id='$user_id'";
        $updateUser = mysqli_query($conn, $update);
        if($updateUser){
            $_SESSION['message'] = "success";
            $_SESSION['success'] = "Password changed successfully";
            unset($_SESSION['error']);
            header("Location: admin.php#account");
            exit();
        } else {
            $_SESSION['message'] = "error";
            $_SESSION['error'] = "Failed to change password";
            unset($_SESSION['success']);
            header("Location: admin.php#account");
            exit();
        }
    } else {
        $_SESSION['message'] = "error";
        $_SESSION['error'] = "Invalid current password";
        unset($_SESSION['success']);
        header("Location: admin.php#account");
        exit();
    }
} else {
    $_SESSION['message'] = "error";
    $_SESSION['error'] = "Invalid user";
    unset($_SESSION['success']);
    header("Location: admin.php#account");
    exit();
}

?>