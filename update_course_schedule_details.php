<?php 
require "init.php";

$course_schedule_id = $_GET["course_schedule_id"];
$course_schedule_issue = $_GET["course_schedule_issue"];
$course_schedule_day = $_GET["course_schedule_day"];
$course_schedule_date = $_GET["course_schedule_date"];
$course_schedule_program = $_GET["course_schedule_program"];
$course_schedule_starttime = $_GET["course_schedule_starttime"];
$course_schedule_endtime = $_GET["course_schedule_endtime"];
$course_schedule_course = $_GET["course_schedule_course"];
$course_schedule_faculty = $_GET["course_schedule_faculty"];

$query="UPDATE course_schedule SET 
course_schedule_issue='$course_schedule_issue',
course_schedule_day='$course_schedule_day',
course_schedule_date='$course_schedule_date',
course_schedule_program='$course_schedule_program',
course_schedule_starttime='$course_schedule_starttime',
course_schedule_endtime='$course_schedule_endtime',
course_schedule_course='$course_schedule_course',
course_schedule_faculty='$course_schedule_faculty' WHERE course_schedule_id= '$course_schedule_id' ;";


$result=mysqli_query($con,$query);

if($result){
header("Location:course_schedule.php");
}
else{
	echo "Recheck";
}
mysqli_close($con);
?>