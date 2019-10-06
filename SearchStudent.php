<?php
require "init.php";

$query1= "select DISTINCT student_joining from student_details;";
$query2= "select DISTINCT student_program from student_details;";
$query3= "SELECT DISTINCT course_details_specialization FROM course_details WHERE course_details_category='Elective';";

$result1 = mysqli_query($con,$query1);
$result2 = mysqli_query($con,$query2);
$result3 = mysqli_query($con,$query3);
$response1=array();
$response2=array();
$response3=array();

while($row1=mysqli_fetch_assoc($result1)){
	
	array_push($response1,$row1);
	
}
while($row2=mysqli_fetch_assoc($result2)){
	
	array_push($response2,$row2);
	
}
while($row3=mysqli_fetch_assoc($result3)){
	
	array_push($response3,$row3);
	
}
mysqli_close($con);
array('year'=>$response1);
array('program'=>$response2);
array('specialization'=>$response3);
$merged_array=array_merge($response1,$response2,$response3);
echo json_encode(array('result'=>$merged_array));
?>