<?php

if(!isset($_POST['submit'])) return;

// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'models');

// Set target directory
$target_dir = "models/";

// Set imageFileType to the extension of the file
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));

// ERROR HANDLING: Check if file has less than 20MB
if ($_FILES["fileToUpload"]["size"] > 20000000) {
  echo "Sorry, your file is too large.";
  return;
}

// Rename file to current time in milliseconds
$target_file = $target_dir . round(microtime(true) * 1000) . "." . $imageFileType;

// Upload file
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  $sql = "INSERT INTO files (name) VALUES ('$target_file')";
  if (mysqli_query($conn, $sql)) {
    echo "upload uspesny!!!!! :DD";
  }
} else {
  echo "Sorry, kamo dosral som kod asi, neslo ti to uploadnut";
}