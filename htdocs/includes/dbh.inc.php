<?php
// Define db connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chemia";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    // If connection fails, print error message
    die("Connection failed: " . mysqli_connect_error());
}