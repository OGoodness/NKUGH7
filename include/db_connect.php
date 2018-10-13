<?php
ini_set('display_errors', 'On');
$servername = "mysql-instance-gb1.chajedmv8mjh.us-east-2.rds.amazonaws.com";
$username = "norse";
$password = "norsehacks";
$database = "norse";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>
