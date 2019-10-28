<?php
include 'includes/header.php';
?>

<body>

<?php

function getRecipesFromDatabase() {
// Get the recipe that matches the title
	include_once 'db_connect.php';
	$sql = "SELECT * FROM recipes";
	$result = mysqli_query($conn, $sql);

// Get the first row from the result as an associative array
	$recDetails = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($recDetails, $row);
	}
//	$recDetails = mysqli_fetch_assoc($result);
	return $recDetails;
}
?>


<main>




<div id="recipe-list" >
			<input class="search" placeholder="Search" />
  			<button class="sort" data-sort="recipe-title">Sort</button>
 <ul class="list img-list">
			<?php
$recDetails = getRecipesFromDatabase();
foreach ($recDetails as $recDetail) {
	echo '

					<li class="list-item">
					<a href="recipes.php?title=' . $recDetail["title"] . '" class="inner">
					<div class="li-img">
					<img src="' . $recDetail["photo"] . '" Picture of ' . $recDetail["title"] . '" />
					</div>

					<div class="li-text">
					<h4 class="li-head recipe-title">' . $recDetail["title"] . '</h4>
					<p class="li-sub">' . $recDetail["instructions"] . '</p>
					</div>
					</a>
					</li>';
}
?>
		</ul>
</div>


	</main>
<footer>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
	<script>
		$(document).ready(function(){
			var options = {
				valueNames: [ 'recipe-title' ]
			};
			var recList = new List('recipe-list', options);
		})
	</script>

<?php
include 'includes/footer.php';
?>

</footer>
</body>
</html>