<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: signout.php");
    exit();
}

// Retrieve user ID and role from URL parameters
if (isset($_GET['id']) && isset($_GET['role'])) {
    $user_id = $_GET['id'];
    $role = $_GET['role'];

    // Construct SQL DELETE statement
    $sql = "DELETE FROM user WHERE id = '$user_id' AND role = '$role'";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "User removed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Redirect back to the page where the removal action was initiated
header("Location: manage.php");
exit();


?>