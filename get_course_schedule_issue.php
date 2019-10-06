<?php
require "init.php";
	
$course_schedule_issue	 = $_POST["course_schedule_issue"];
$course_schedule_issue_semester = $_POST["course_schedule_issue_semester"];

$query= "SELECT course_schedule_from,course_schedule_to,course_schedule_duration course_schedule_day FROM course_schedule_secondyear_issue WHERE (course_schedule_issue ='$course_schedule_issue' AND course_schedule_issue_semester='$course_schedule_issue_semester')";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_schedule_from"=>$row[0],"course_schedule_to"=>$row[1],"course_schedule_duration"=>$row[2]));
	
}
mysqli_close($con);
echo json_encode(array('Issue'=>$response));
?>