<?php
require "init.php";

$faculty_employeeid = $_POST["faculty_employeeid"];

$query= "select DISTINCT course_details_name from attendace_details WHERE faculty_employeeid='$faculty_employeeid';";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_details_name"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('course_name'=>$response));
?>