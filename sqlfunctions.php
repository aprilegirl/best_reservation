<?php
include ('ConnectionConstants.php');

function getconnection(){
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

function getreservations(){
	$conn = getconnection();
	
	$sql = "SELECT name, surname, email, gender, fullpricetickets, reducedpricetickets FROM reservations_training";
	
	$result = mysqli_query($conn, $sql);
	return $result;
}




?>