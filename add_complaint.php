<?php

session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: signout.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $head_id = $_POST['head'];
    $subject = $_POST['subject'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $currentDate = date('Y-m-d'); // Get current date

    $sql = "INSERT INTO complaints (user_id, head_id, subject, description, date) VALUES ('$user_id', '$head_id', '$subject', '$description', '$currentDate')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Complaint added successfully.";
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "An error occurred. Please try again.";
    }
    header("Location: register.php");
    exit();
}

?>
