<?php
require "init.php";

$query3= "SELECT DISTINCT course_details_category FROM course_details;";

$result3 = mysqli_query($con,$query3);

$response3=array();


while($row3=mysqli_fetch_assoc($result3)){
	
	array_push($response3,$row3);
	
}
mysqli_close($con);
echo json_encode(array('category'=>$response3));
?>