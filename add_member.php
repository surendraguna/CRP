<?php
session_start();
require_once 'db_connection.php';

// Define a variable to hold the status message
$statusMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = "demo123";
    $role = $_POST['role'];
    $photo = './default.png'; // Adjust the path as necessary

    $defaultImage = './images/default.png'; // Adjust the path as necessary

    $imageContent = file_get_contents($defaultImage);
    $imageContent = base64_encode($imageContent); 

    $sql = "INSERT INTO user (name, email, password, role, photo) VALUES ('$name', '$email', '$password', '$role', '$imageContent')";
    
    if (mysqli_query($conn, $sql)) {
        // If the query was successful, set the status message accordingly
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "{$role} added successfully.";
    } else {
        // If the query failed, set the status message accordingly
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email already exists. Please use a different email address.";
    }

    echo $imageContent;

    echo '<img src= "data:image/jpeg;base64,' . $imageContent . '" alt="Profile Picture" />';

    // Redirect to another page
    //header("Location: admin.php#manage");
    //exit();
}
?>
