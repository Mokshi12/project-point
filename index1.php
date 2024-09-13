<?php
// Establish database connection
$servername = "localhost";
$username = "mokshi";
$password = "5da283a2d990e8d8512cf967df5bc0d0";
$database = "tourism_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
