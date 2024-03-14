<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: signout.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = "demo123";
    $role = $_POST['role'];
    $photo = './default.png'; // Adjust the path as necessary

    $defaultImage = './images/default.png'; // Adjust the path as necessary

    $imageContent = file_get_contents($defaultImage);
    $imageContent = base64_encode($imageContent); 

    // Check if email already exists
    $check_query = "SELECT * FROM user WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        // If email exists, set error message and redirect back
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email already exists. Please use a different email address.";
        header("Location: manage.php");
        exit();
    } else {
        // If email does not exist, proceed with insertion
        $sql = "INSERT INTO user (name, email, password, role, photo) VALUES ('$name', '$email', '$password', '$role', '$imageContent')";
        
        if (mysqli_query($conn, $sql)) {
            // If the query was successful, set the status message accordingly
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "{$role} added successfully.";
        } else {
            // If the query failed for some other reason, set error message
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "An error occurred. Please try again.";
        }
        header("Location: manage.php");
        exit();
    }
}
?>
