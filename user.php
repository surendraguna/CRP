<?php
session_start();

// Check if user session token is set and matches the stored user session token
if (!isset($_SESSION['user_session_token']) || $_SESSION['user_session_token'] !== $_SESSION['user_session_token']) {
    // Redirect to login page if session token is missing or doesn't match
    header("Location: signin.php");
    exit();
}

// Your user dashboard page content here...
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Reporting Portal - USER</title>
    <link rel="stylesheet" href="inernal.css">
</head>
<body>
    <h1>Welcome User</h1>
    <p>Here are the list of complaints</p>
    <table>
        <tr>
            <th>Complaint ID</th>
            <th>Complaint</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Complaint 1</td>
            <td>Pending</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Complaint 2</td>
            <td>Resolved</td>
        </tr>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
