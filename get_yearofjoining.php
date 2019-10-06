<?php
require "init.php";
	
$student_program = $_POST["student_program"];
	
$query= "select DISTINCT student_joining from first_second_year_student_details where student_program like '".$student_program."';";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_joining"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('year'=>$response));
?>