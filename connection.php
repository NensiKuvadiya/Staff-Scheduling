<?php
 //require_once('connection.php');

$servername = "localhost";

$username = "root";

$password = "";
 
// Connection

$conn = mysqli_connect($servername,$username, $password,"staffschedule");
 
// Check if connection is 
// Successful or not

if (!$conn) {

  die("Connection failed: ". mysqli_connect_error());
}

//echo "Connected successfully";
?>