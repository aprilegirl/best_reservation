<?php
include "sqlfunctions.php";

$reservations = getreservations();



?>

<html>
<head>
</head>
<body>

<h1>Reservations</h1>

<?php if ($reservations ->num_rows >0){
	while ($row = mysqli_fetch_assoc ($reservations)){
		echo "{$row['name']} <br>";
	}
}
?>




</body>

</html>