<?php
require "init.php";
	
$student_program = $_POST["student_program"];
$student_joining = $_POST["student_joining"];
	
$query= "select student_firstname,student_lastname,student_rollnno,student_specialization from student_details where student_program like '".$student_program."' AND student_joining like '".$student_joining."';";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_firstname"=>$row[0],"student_lastname"=>$row[1],"student_rollnno"=>$row[2],"student_specialization"=>$row[3]));
	
}
mysqli_close($con);
echo json_encode(array('name'=>$response));
?>