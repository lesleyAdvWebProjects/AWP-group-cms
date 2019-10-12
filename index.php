<?php 
	include 'includes/head.php';
?>

<?php 

	function getRecipeTitlesFromDatabase() {
		// Get all the post titles from the posts table
		include_once 'db_connect.php';
		$sql = "SELECT title FROM recipes";
		$result = mysqli_query($conn, $sql);
		
		// Get each result row as an assoc array, then add title to $recTitles
		$recTitles = array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($recTitles, $row['title']);
		}
		return $recTitles;
	}

	
?>


	<main>

		<ul class="list img-list">
			<?php	
				$recTitles = getRecipeTitlesFromDatabase();
				foreach($recTitles as $recTitle) {
				echo '
				<li class="list-item">
					<a href="recipes.php?title=' . $recTitle . ' class="inner">
						<div class="li-text">
							<h4 class="li-head">' . $recTitle . '</h4>
							</div>
					</a>
				</li>';
				}
			?>
		</ul>

	</main>
<footer>
hello
</footer>
</body>
</html>