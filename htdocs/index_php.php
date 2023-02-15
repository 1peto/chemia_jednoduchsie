<?php
    // Include dbconn.php
    include 'includes\dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Php page</title>
</head>
<body>
    <h1>Hello World</h1>
    <?php
        // Use the connection
        $sql = "SELECT * FROM mytable";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_object()) {
                echo "id: " . $row->id . " - Name: " . $row->name . " " . $row->lastname . "<br>";
            }
        } else {
            echo "0 results";
        }
    ?>
</body>
</html>