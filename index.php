<?php
include 'includes/head.php';
?>
<header>
<?php
include 'includes/header.php';
?>

</header>


<body>

<?php
/*
function getRecipeTitlesFromDatabase() {
// Get all the post titles from the posts table
include_once 'db_connect.php';
$sql = "SELECT title FROM recipes";
$result = mysqli_query($conn, $sql);

// Get each result row as an assoc array, then add title to $recTitles
$recTitles = array();
while ($row = mysqli_fetch_assoc($result)) {
array_push($recTitles, $row['title']);
}
return $recTitles;
}
 */
function getRecipesFromDatabase() {
// Get the recipe that matches the title
	include_once 'db_connect.php';
	$sql = "SELECT * FROM recipes";
	$result = mysqli_query($conn, $sql);

// Get the first row from the result as an associative array
	$recDetails = mysqli_fetch_assoc($result);
	return $recDetails;
}

?>


<main>

	<ul class="list img-list">
			<?php

$recDetails = getRecipesFromDatabase();
foreach ($recDetails as $recDetails) {
	echo '
<li class="list-item">
<a href="recipes.php?title=' . $recDetails["title"] . '" class="inner">
<div class="li-img">
<img src="' . $recDetails["photo"] . '" Picture of ' . $recDetails["title"] . '" />
</div>

<div class="li-text">
<h4 class="li-head">' . $recDetails["title"] . '</h4>
<p class="li-sub">' . $recDetails["instructions"] . '</p>
</div>
</a>
</li>';
}
/*
$recTitles = getRecipeTitlesFromDatabase();
foreach ($recTitles as $recTitle) {
echo '
<li class="list-item">
<a href="recipes.php?title=' . $recTitle . '" class="inner">
<div class="li-text">
<h4 class="li-head">' . $recTitle . '</h4>
</div>
</a>
</li>';
}
 */
?>
		</ul>

	</main>
<footer>

</footer>
</body>
</html>