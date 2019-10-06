<?php
require "init.php";
	
$addcourse_specialization = $_POST["addcourse_specialization"];

$query= "SELECT DISTINCT course_details_name,course_details_code from course_details where 	course_details_specialization like '".$addcourse_specialization."';";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("addcourse_name"=>$row[0],"addcourse_code"=>$row[1]));
	
}
mysqli_close($con);
echo json_encode(array('courses'=>$response));
?>