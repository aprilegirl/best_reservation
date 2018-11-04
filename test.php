<?php

include('sqlfunctions.php');

$reservations = getreservations();
var_dump ($reservations);
$rowcount = $reservations->num_rows;
echo "num_rows={$rowcount}"
?>