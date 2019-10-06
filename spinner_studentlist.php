<?php
require "init.php";


$student_joining = $_POST["student_joining"];
$student_program = $_POST["student_program"];
$student_specialization = $_POST["student_specialization"];

$query= "SELECT student_firstname,student_lastname,student_rollnno,student_email FROM `student_details` WHERE student_joining like '".$student_joining."' AND student_program like '".$student_program."' and `student_specialization` LIKE '%$student_specialization%';";

$result = mysqli_query($con,$query);
	$response=array();
	
	while($row=mysqli_fetch_array($result)){
	    $student_lastname=$row[1];
		$student_firstname=$row[0];
		$student_rollnno=$row[2];
		$student_email=$row[3];
		array_push($response,array("student_lastname"=>$student_lastname,"student_firstname"=>$student_firstname,"student_rollnno"=>$student_rollnno,"student_email"=>$student_email));
	
	}
	echo json_encode(array('result'=>$response));
	mysqli_close($con);
?>