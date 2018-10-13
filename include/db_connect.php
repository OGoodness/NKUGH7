<?php
ini_set('display_errors', 'On');
<<<<<<< HEAD
$servername = "18.188.172.221";
=======
$servername = "localhost";
>>>>>>> 757c1be7e806d666d9e2d2b88a59363fc2855f03
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

