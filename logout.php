<?php
session_start();
// Unset all session variables
session_unset();
// Destroy the session
session_destroy();
// Set the alert message
$message = "You have been logged out.";
// Set a session variable with the message
$_SESSION['logout_message'] = $message;
// Redirect to the login page
header("Location: index.php");
exit();
?>


