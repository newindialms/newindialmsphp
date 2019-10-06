<?php
require "init.php";

$query= "select DISTINCT student_program from first_second_year_student_details;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_program"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('program_name'=>$response));
?>