<?php
// db.php - Database Connection File
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "quiz_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>