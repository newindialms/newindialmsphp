<?php
require "init.php";

$course_schedule_issue = $_POST["course_schedule_issue"];
$course_schedule_issue_semester = $_POST["course_schedule_issue_semester"];
$course_schedule_duration = $_POST["course_schedule_duration"];
$course_schedule_from = $_POST["course_schedule_from"];
$course_schedule_to = $_POST["course_schedule_to"];

$query="INSERT INTO course_schedule_issue(course_schedule_issue,course_schedule_issue_semester,course_schedule_duration,course_schedule_from,course_schedule_to) VALUES('$course_schedule_issue','$course_schedule_issue_semester ','$course_schedule_duration','$course_schedule_from','$course_schedule_to');";

$result=mysqli_query($con,$query);

if($result){
	header("Location:course_schedule.php");
}
else{
	echo "Something went wrong";
}
mysqli_close($con);
?>