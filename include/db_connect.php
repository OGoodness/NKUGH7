<?php
ini_set('display_errors', 'On');
$servername = "18.188.172.221";
$username = "root";
$password = "norsehacks";
$database = "globalhack7";
echo "Connection started";
// Create connection
$dbc = mysqli_connect ($servername, $username, $password, $database) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
//$conn = new mysqli($servername, $username, $password, $database);
echo "connection finished";
// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 ?>
*/