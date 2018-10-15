<?php
ini_set('display_errors', 'On');
$servername = "localhost";
$username = "root";
$password = "";
$database = "globalhack7";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>

