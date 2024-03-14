<?php
session_start();

// Remove session tokens and destroy session
unset($_SESSION['admin_session_token']);
unset($_SESSION['user_session_token']);
unset($_SESSION['head_session_token']);
session_destroy();

// Redirect to login page after logout
header("Location: signin.php");
exit();
?>
