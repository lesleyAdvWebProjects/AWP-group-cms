<?php include 'includes/head.php'; ?>
<?php
include 'includes/header.php';
?>
<h1>Submit Your Recipe</h1> 
	<main>
		<form method="post" action="recipe-submit.php">
		<label for="recName">Recipe Title</label><br />
		<input type="text" name="recName" />	<br /><br />
		<label for="recAuthor">Chef Name</label><br />
		<input type="text" name="recAuthor" />	<br /><br />
		<label for="recDate">Date (YYYY/MM/DD)</label><br />
		<input type="date" name="recDate" />	<br /><br />
        <label for="recPic">Photo URL</label><br />
		<input type="text" name="recPic" />	<br /><br />
		<label for="recSteps">Instructions</label><br />
		<textarea name="recSteps"></textarea><br /><br />
        
		<input type="submit" value="Submit Recipe">
		</form>
	
	</main>
	<footer>
	
	</footer>
</body>
</html>

