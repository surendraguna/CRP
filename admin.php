<?php
session_start();

// Check if admin session token is set and matches the stored admin session token
if (!isset($_SESSION['admin_session_token']) || $_SESSION['admin_session_token'] !== $_SESSION['admin_session_token']) {
    // Redirect to login page if session token is missing or doesn't match
    header("Location: signin.php");
    exit();
}

// Your admin dashboard page content here...
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Reporting Portal - ADMIN</title>
</head>
<body>
    <h1>Welcome Admin</h1>
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