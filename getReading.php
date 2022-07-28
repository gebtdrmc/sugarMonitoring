<?php
/*
This page is to used to Retrieve previous sugar-reading entries.
This page is deliberately left blank.
*/ 
session_start();
include "dbFunction.php"; 

$userID = $_SESSION['user_id'];

$reading = Array();

$query = "SELECT * FROM sugarreading WHERE userID = '$userID' order by readingDate"; 
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $reading[] = $row;
}
mysqli_close($link);

echo json_encode($reading);



?>