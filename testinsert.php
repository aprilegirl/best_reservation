<?php
include('ConnectionConstants.php');
// Create connection
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO reservations_training (name, surname, email, gender)
VALUES ('John', 'Doe', 'john@example.com', 'male')";
//id?

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>