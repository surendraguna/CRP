<?php
session_start();

// Check if head session token is set and matches the stored user session token
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'head') {
    header("Location: signout.php");
    exit();
}


require_once 'db_connection.php';

$id = $_SESSION['user_id'];
//find name of id
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of complaints</title>
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
        .button{
            background-color: #4CAF50;
            color: white;
            padding: px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button:hover{
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="body">
        <div class="cotainer">
            <div class="title">
                <h1>List of Complaints</h1>
            </div>
            <div class="details">
                <div class="view">
                   <table>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th style="width: 15%;">Date</th>
                        <th style="width: 15%;">Subject</th>
                        <th style="width: 50%;">Description</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Change Status</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM complaints WHERE head_id = '$id'";
                    $res = mysqli_query($conn, $sql);
                    while ($comp = mysqli_fetch_assoc($res)) {
                        $sql1 = "SELECT * FROM user WHERE id = {$comp['user_id']}";
                        $result1 = mysqli_query($conn, $sql1);
                        $user = mysqli_fetch_assoc($result1);
                        ?>
                        <tr>
                            <!-- <td><?php echo $comp['id']?></td> -->
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $comp['date']; ?></td>
                            <td><?php echo $comp['subject']; ?></td>
                            <td><?php echo $comp['description']; ?></td>
                            <td><?php echo $comp['status']; ?></td>
                            <td>
                                <form action="update_status.php" method="post">
                                    <input type="hidden" name="complaint_id" value="<?php echo $comp['id']; ?>">
                                    <select name="new_status" style="width: 100%; margin: 0 0 5px 0">
                                        <option value="pending">Pending</option>
                                        <option value="solved">Solved</option>
                                    </select>
                                    <button type="submit" class="button">Change</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                   </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>