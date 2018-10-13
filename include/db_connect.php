<?php
ini_set('display_errors', 'On');
$servername = "ec2-18-188-172-221.us-east-2.compute.amazonaws.com";
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

