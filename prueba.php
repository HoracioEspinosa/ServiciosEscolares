<?php
$servername = "localhost";
$username = "luis";
$password = '';

//$servername = "108.179.194.13";
//$username = "hospedat_tourtib";
//$password = "Horacio941101@";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>