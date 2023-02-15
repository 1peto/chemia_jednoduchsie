<?php
// Default credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS mydb";
$conn->query($sql);

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS mytable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
$conn->query($sql);

// Instert data if not exists
$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $sql = "INSERT INTO mytable (name, lastname) VALUES ('John', 'Doe'), ('Mary', 'Moe'), ('Julie', 'Dooley')";
    $conn->query($sql);
}
