<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signout.php");
    exit();
}

$current = $_POST['current'];
$new = $_POST['new'];
$user_id = $_SESSION['user_id'];

// Fetch user details based on their role
$select = "SELECT * FROM user WHERE id='$user_id'";
$getaUser = mysqli_query($conn, $select);

if(mysqli_num_rows($getaUser) == 1){
    $user = mysqli_fetch_assoc($getaUser);
    $role = $user['role'];

   

    // Select user with matching ID and role
    $select_query = "SELECT * FROM user WHERE id='$user_id' ";
    $result = mysqli_query($conn, $select_query);

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        if($current == $user['password']){
            $update = "UPDATE user SET password='$new' WHERE id='$user_id'";
            $updateUser = mysqli_query($conn, $update);
            if($updateUser){
                $_SESSION['message'] = "success";
                $_SESSION['success'] = "Password changed successfully";
                unset($_SESSION['error']);
                header("Location: account.php");
                exit();
            } else {
                $_SESSION['message'] = "error";
                $_SESSION['error'] = "Failed to change password";
                unset($_SESSION['success']);
                header("Location: account.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "error";
            $_SESSION['error'] = "Invalid current password";
            unset($_SESSION['success']);
            header("Location: account.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "error";
        $_SESSION['error'] = "Invalid user or role";
        unset($_SESSION['success']);
        header("Location: account.php");
        exit();
    }
} else {
    $_SESSION['message'] = "error";
    $_SESSION['error'] = "Invalid user";
    unset($_SESSION['success']);
    header("Location: signin.php");
    exit();
}
?>
