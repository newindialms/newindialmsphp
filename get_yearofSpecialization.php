<?php
require "init.php";
	
	$student_program = $_POST["student_program"];
	
$query= "select DISTINCT course_details_specialization from course_details WHERE course_details_category='Elective';";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_specialization"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('specialization'=>$response));
?>