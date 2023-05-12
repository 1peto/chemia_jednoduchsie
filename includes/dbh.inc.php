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

if($_COOKIE['tableCreated'] != null && $_COOKIE['tableCreated'] == 'success') {
    $sql = "CREATE TABLE IF NOT EXISTS zluceniny (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        model VARCHAR(255) NOT NULL,
        info VARCHAR(255) NOT NULL,
        reaction VARCHAR(255) NOT NULL,
        utilization VARCHAR(255) NOT NULL
    )";
    
    if (!mysqli_query($conn, $sql)) {
        // If table creation fails, print error message
        echo "Error creating table: " . mysqli_error($conn);
    }
}

// Store info that data was inserted in cookie
setcookie("tableCreated", "success", time() + 3600, "/");