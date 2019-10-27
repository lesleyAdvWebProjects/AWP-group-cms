<?php
// get the data to insert into the db
$title = $_POST["recName"];
$steps = $_POST["recSteps"];
$chef = $_POST["recAuthor"];
$date = $_POST["recDate"];
$pic = $_POST["recPic"];
$ingredients = $_POST['recIngredients']; 


// insert the data with the sql query
include_once 'db_connect.php';
$sql="INSERT INTO recipes (title, instructions, Ingredients photo, chefname, entrydate) VALUES ('" .     
	$title . "','" .  $steps . "','" . $ingredients . "','" . $pic . "','" . $chef . "','" . $date . "')";
$result = mysqli_query($conn, $sql);

// redirect to homepage
header("Location: index.php"); 
?>
