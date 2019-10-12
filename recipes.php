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

function getRecipesFromDatabase() {
	// Get the recipe title
	$recTitle = rawurldecode($_GET["title"]);

	// Get the recipe that matches the title
	include_once 'db_connect.php';
	$sql = "SELECT * FROM recipes WHERE title='" . $recTitle . "'";
	$result = mysqli_query($conn, $sql);

	// Get the first row from the result as an associative array
	$recDetails = mysqli_fetch_assoc($result);
	return $recDetails;
}
$recDetails = getRecipesFromDatabase();

?>

	<main>

    <ul class="list img-list">
			<li class="list-item">
				<a class="inner">
					<div class="li-img">
						<img src="<?php echo $recDetails["photo"]; ?>" alt="<?php echo $recDetails["title"]; ?>" />
					</div>
					<div class="li-text">
						<h4 class="li-head"><?php echo $recDetails["title"]; ?> by <?php echo $recDetails["chefname"]; ?></h4>
						<p class="li-sub"><?php echo $recDetails["instructions"]; ?> &mdash; <?php echo $recDetails["entrydate"]; ?></p>
					</div>
				</a>
			</li>

		</ul>


	</main>
	<footer>

</footer>
</body>
</html>