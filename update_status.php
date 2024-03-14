<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'head') {
    header("Location: signout.php");
    exit();
}

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $complaint_id = $_POST['complaint_id'];
    $new_status = $_POST['new_status'];

    // Update the status in the database
    $sql = "UPDATE complaints SET status = '$new_status' WHERE id = '$complaint_id'";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the page where the form was submitted
        header("Location: {$_SERVER['HTTP_REFERER']}?success=1");
        exit();
    } else {
        // Redirect back to the page with an error message if the query fails
        header("Location: {$_SERVER['HTTP_REFERER']}?error=1");
        exit();
    }
} else {
    // Redirect back to the page if the request method is not POST
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
