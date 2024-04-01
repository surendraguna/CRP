<?php

session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signout.php");
    exit();
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/use.css">
    <link rel="stylesheet" href="./css/reg.css">
    <style>
        .view{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        table{
            width: 90%;
            border-collapse: collapse;
        }
        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th{
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        tr:nth-child(odd){
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="body">
        <div class="cotainer">
            <div class="title">
                <h1>History</h1>
            </div>
            <div class="details">
                <div class="view">
                   <table>
                        <tr>
                            <th style="width: 100%;">Date</th>
                            <th style="width: 100%;">Status</th>
                            <th style="width: 100%;">Head</th>
                            <th style="width: 100%;">Subject</th>
                            <th style="width: 100%;">Description</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM complaints WHERE user_id = '$id'";
                            $result = mysqli_query($conn, $sql);
                            while ($user = mysqli_fetch_assoc($result)) {
                                $sql1 = "SELECT * FROM user WHERE id = {$user['head_id']}";
                                $result1 = mysqli_query($conn, $sql1);
                                $head = mysqli_fetch_assoc($result1);
                                echo "<tr>";
                                echo "<td>" . $user['date'] . "</td>";
                                echo "<td>" . $user['status'] . "</td>";
                                echo "<td>" . $head['name'] . "</td>";
                                echo "<td>" . $user['subject'] . "</td>";
                                echo "<td>" . $user['description'] . "</td>";
                                echo "</tr>";
                            }
                        ?>
                   </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>