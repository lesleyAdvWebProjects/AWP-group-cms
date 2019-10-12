<?php
// get the data to insert into the db
$title = $_POST["recName"];
$steps = $_POST["recSteps"];
$chef = $_POST["recAuthor"];
$date = $_POST["recDate"];
$pic = $_POST["recPic"];



// insert the data with the sql query
include_once 'db_connect.php';
$sql="INSERT INTO recipes (title, instructions, photo, chefname, entrydate) VALUES ('" .     
	$title . "','" .  $steps . "','" . $pic . "','" . $chef . "','" . $date . "')";
$result = mysqli_query($conn, $sql);

// redirect to homepage
header("Location: index.php");
?>