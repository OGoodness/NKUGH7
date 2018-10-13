<?php
ini_set('display_errors', 'On');
$servername = "globalhack7.ced2x9toup5e.us-east-2.rds.amazonaws.com";
$username = "norse";
$password = "norsehacks";
$database = "globalhack7";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>
