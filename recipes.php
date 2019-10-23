<?php
include 'includes/header.php';

?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body>
<?php

function getRecipesFromDatabase() {
	// Get the recipe title
	$recTitle = rawurldecode($_GET["title"]); 

	// Get the recipe that matches the title
	include_once 'db_connect.php';
	$sql = "SELECT p.*, COUNT(r.rating_number) as rating_num, FORMAT((SUM(r.rating_number) / COUNT(r.rating_number)),1) as average_rating FROM recipes as p LEFT JOIN rating as r ON r.post_id = p.id WHERE p.title = '" . $recTitle ."' GROUP BY (r.post_id)"; 
	
	
	$result = mysqli_query($conn, $sql);

	// Get the first row from the result as an associative array
	$recDetails = mysqli_fetch_assoc($result);
	return $recDetails;
}
$recDetails = getRecipesFromDatabase();


?>

	<main>
	    
	     <div class="rate">
        <input type="radio" id="star5" name="rating" value="5" <?php echo ($recDetails['average_rating'] >= 5)?'checked="checked"':''; ?>>
        <label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4" <?php echo ($recDetails['average_rating'] >= 4)?'checked="checked"':''; ?>>
        <label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3" <?php echo ($recDetails['average_rating'] >= 3)?'checked="checked"':''; ?>>
        <label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2" <?php echo ($recDetails['average_rating'] >= 2)?'checked="checked"':''; ?>>
        <label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1" <?php echo ($recDetails['average_rating'] >= 1)?'checked="checked"':''; ?>>
        <label for="star1"></label>
    </div>
    <div class="overall-rating">
        (Average Rating <span id="avgrat"><?php echo $recDetails['average_rating']; ?></span>
        Based on <span id="totalrat"><?php echo $recDetails['rating_num']; ?></span> rating)</span>
    </div>


    <ul class="list img-list">
			<li class="list-item">
				<a class="inner">
					<div class="li-img">
						<img src="<?php echo $recDetails["photo"]; ?>" alt="<?php echo $recDetails["title"]; ?>" />
					</div>
					<div class="li-text">
						<h1 class="li-head"><?php echo $recDetails["title"]; ?> by <?php echo $recDetails["chefname"]; ?></h1>
						<div class="container">
   
</div>
						<p class="li-sub"><?php echo $recDetails["instructions"]; ?> &mdash; <?php echo $recDetails["entrydate"]; ?></p>
					</div>
				</a>
			</li>

		</ul>
    
    
    <div class="col-md-4"> 
            <input type="checkbox" name="ingredient1" value="ingredient1"> <!-- echo ingredient--><br>
            <input type="checkbox" name="ingredient2" value="ingredient2"> <!-- echo ingredient--><br>
            <input type="checkbox" name="ingredient3" value="ingredient3" checked> <!-- echo ingredient--><br><br>
            <input type="submit" value="Add to List">

</div>

		<button onclick="window.location.href='/index.php'">Go Back</button> 
	</main>
	<footer>
	    <script>
$(document).ready(function(){
 $('.rate input').click(function(){
        
        var postID = <?php echo $recDetails['ID']; ?>;
        var ratingNum = $(this).val();
        
        
        
		
        $.ajax({
            type: 'POST',
            url: 'rating.php',
            data: 'postID='+postID+'&ratingNum='+ratingNum,
            dataType: 'json',
            success : function(resp) {
                if(resp.status == 1){
                    $('#avgrat').text(resp.data.average_rating);
                    $('#totalrat').text(resp.data.rating_num);
					
                    alert('Thanks! You have rated '+ratingNum+' to "<?php echo $recDetails['title']; ?>"');
                }else if(resp.status == 2){
                    alert('You have already rated to "<?php echo $recDetails['title']; ?>"');
                }
				
                $( ".rate input" ).each(function() {
                    if($(this).val() <= parseInt(resp.data.average_rating)){
                        $(this).attr('checked', 'checked');
                    }else{
                        $(this).prop( "checked", false );
                    }
                });
            },
            error: function(e){
               var showee = JSON.stringify(e)
             alert(showee);
             }
        });
		
        
  });
});
</script>

	  
<?php
include 'includes/footer.php';
?>



</footer>
</body>
</html>
