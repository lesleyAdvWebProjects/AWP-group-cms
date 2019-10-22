<?php 
// Include the database config file 
include_once 'db_connect.php'; 
 

    // Get posted data 
    $postID = $_POST["postID"];; 
    $ratingNum = $_POST["ratingNum"];; 
     
    // Current IP address 
    $userIP = $_SERVER['REMOTE_ADDR']; 
     
    // Check whether the user already submitted the rating for the same post 
    $sql = "SELECT rating_number FROM rating WHERE post_id = $postID AND user_ip = '".$userIP."'"; 
    $result = mysqli_query($conn, $sql);
     
    if($result->num_rows > 0){ 
        // Status 
        $status = 2; 
    }else{ 
        // Insert rating data in the database 
        $sql = "INSERT INTO rating (post_id,rating_number,user_ip) VALUES ('".$postID."', '".$ratingNum."', '".$userIP."')"; 
        $result = mysqli_query($conn, $sql);
         
        // Status 
        $status = 1; 
    } 
     
     
    // Fetch rating details from the database 
    
    	$sql = "SELECT COUNT(rating_number) as rating_num, FORMAT((SUM(rating_number) / COUNT(rating_number)),1) as average_rating FROM rating WHERE post_id = $postID GROUP BY (post_id)"; 
	
	
	$result = mysqli_query($conn, $sql);

	// Get the first row from the result as an associative array
	$ratingData = mysqli_fetch_assoc($result);
	

	
	
    
    $response = array( 
        'data' => $ratingData, 
        'status' => $status 
    ); 
     
    // Return response in JSON format 
    echo json_encode($response); 

?>