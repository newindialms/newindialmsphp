<?php
require "init.php";
	
	
$query= "select DISTINCT student_specialization from student_details ;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_specialization"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('specialization'=>$response));
?>