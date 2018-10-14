<?php
ini_set('display_errors', 'On');
$servername = "localhost";
$username = "ganesh";
$password = "Gbwalter88$";
$database = "globalhack7";
// Create connection
<<<<<<< Updated upstream
$conn = new mysqli($servername, $username, '', $database);
=======
$conn = new mysqli($servername, $username, "", $database);
>>>>>>> Stashed changes
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>

