<?php
require "init.php";
	
$query= "SELECT course_details_name from  course_details WHERE 	course_details_category='Core' ;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,$row[0]);
	
}
mysqli_close($con);
echo json_encode(array('course_details'=>$response));
?>