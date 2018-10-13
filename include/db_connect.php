<?php
ini_set('display_errors', 'On');
$servername = "18.188.172.221";
$username = "root";
$password = "norsehacks";
$database = "globalhack7";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>

