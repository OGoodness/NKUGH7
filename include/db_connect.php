<?php
ini_set('display_errors', 'On');
$servername = "ec2-18-188-172-221.us-east-2.compute.amazonaws.com";
$username = "ec2-user";
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