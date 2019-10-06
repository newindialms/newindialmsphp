<?php
require "init.php";
	

$query= "SELECT student_rollnno,student_firstname,student_lastname FROM student_details WHERE student_year='1';";

$result = mysqli_query($con,$query);
$row_cnt = mysqli_num_rows($result);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_lastname"=>$row[2],"student_firstname"=>$row[1],"student_rollnno"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('corecoursestudentlist'=>$response,'rowcount'=>$row_cnt));
?>