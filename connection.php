<?php
$servername = "localhost";
$username = "eventplanner";
$password = "eventplanner123";
$database = "eventplanner";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>