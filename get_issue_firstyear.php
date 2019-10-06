<?php
require "init.php";
	
$query= "SELECT DISTINCT course_schedule_issue FROM course_schedule_firstyear ORDER BY course_schedule_issue;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_schedule_issue"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('issues'=>$response));
?>