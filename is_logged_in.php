<?php
session_start();
if (!isset($_SESSION['username']) && (!isset($_SESSION['planners_email']) || empty($_SESSION['planners_email']))) {
    echo "<script>alert('Please login to access this page');</script>";
    echo "<script>window.location.href='userLogin.php';</script>";
    exit();
}
?>