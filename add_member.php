<?php
session_start();
require_once 'db_connection.php';

// Define a variable to hold the status message
$statusMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Prepare and execute SQL statement to insert data into the database
    $sql = "INSERT INTO user (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    
    if (mysqli_query($conn, $sql)) {
        // If the query was successful, set the status message accordingly
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "{$role} added successfully.";
    } else {
        // If the query failed, set the status message accordingly
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email already exists. Please use a different email address.";
    }

    // Redirect to another page
    header("Location: admin.php#manage");
    exit();
}
?>
