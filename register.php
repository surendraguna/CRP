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
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/use.css">
    <link rel="stylesheet" href="./css/reg.css">
</head>
<body>
    <div class="body">
        <div class="cotainer">
            <div class="title">
                <h1>Register Complaint</h1>
            </div>
            <?php
                if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
                    echo "<div class='" . $_SESSION['status'] . "'>" . $_SESSION['message'] . "</div>";
                    unset($_SESSION['status']);
                    unset($_SESSION['message']);
                }
            ?>
            <div class="reg">
                <form action="add_complaint.php" method="post">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $name; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $email; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Head</td>
                            <td>
                                <select name="head" id="head" required>
                                    <?php
                                    $query = "SELECT id, name FROM user where role = 'head'";
                                    $result = mysqli_query($conn, $query);

                                    if ($result) {
                                        while ($head = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $head['id'] . "'>" . $head['name'] . "</option>";
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Error: " . mysqli_error($connection);
                                    }
                                    ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td><input type="text" name="subject" id="subject" required></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><textarea name="description" id="description" cols="100" rows="5" required></textarea></td>
                        </tr>
                    </table>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>