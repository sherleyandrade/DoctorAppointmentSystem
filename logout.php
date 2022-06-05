<?php  
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9"); 
	$sql = "DELETE FROM `top_doctors` WHERE 1;";  
	if(mysqli_query($conn,$sql)){  
		header("location: cover.php");  
	}
	else{  
		echo "Could not deleted record: ". mysqli_error($conn);  
	} 
?>