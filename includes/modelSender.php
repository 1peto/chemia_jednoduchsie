<?php
include "dbh.inc.php";

// Get data from form
$name = $_POST['name'];
$model = $_POST['model'];
$info = $_POST['info'];
$reaction = $_POST['reaction'];
$utilization = $_POST['utilization'];

// Print all data
echo $name . "<br>";
echo $model . "<br>";
echo $info . "<br>";
echo $reaction . "<br>";
echo $utilization . "<br>";

// Insert data into database
$sql = "INSERT INTO zluceniny (name, model, info, reaction, utilization) VALUES ('$name', '$model', '$info', '$reaction', '$utilization')";
mysqli_query($conn, $sql);


// Redirect to index.php
header("Location: ../insert.php?insert=success");