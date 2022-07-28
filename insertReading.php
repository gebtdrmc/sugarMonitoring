<?php
/*
This page is to used to insert sugar reading into the table sugarreading (mySQL)
This page is deliberately left blank.
*/ 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}

$userID = $_SESSION['user_id'];

include "dbFunction.php";

if (!empty($_POST['selecttime']) && !empty($_POST['readinglvl'])) 
{
date_default_timezone_set("Asia/Singapore");
$date = date('y-m-d'); // Retreive the current date of user's entry

//Retrieve user's readingTimes and readinglevel
$readingTime = $_POST['selecttime'];
$readingLvl = $_POST['readinglvl'];

//Write insert SQL statement to database
$query = "INSERT INTO sugarreading
         (userID, readingDate,readingTimes,readingLvl)
          VALUES 
          ('$userID','$date','$readingTime','$readingLvl')";
         
//Execute SQL statement 
$status = mysqli_query($link, $query);

header("location: sugarMonitoring.php");
}
else {
    
//Close db
$mysqli_close($link);
}

?>


