<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookandshare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> query("SET NAMES 'UTF8' ");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

