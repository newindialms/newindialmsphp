<?php
require "init.php";

$course_schedule_issue = $_POST["course_schedule_issue"];
$course_schedule_day = $_POST["course_schedule_day"];
$course_schedule_date = $_POST["course_schedule_date"];
$course_schedule_program = $_POST["course_schedule_program"];
$course_schedule_starttime = $_POST["course_schedule_starttime"];
$course_schedule_endtime = $_POST["course_schedule_endtime"];
$course_schedule_course = $_POST["course_schedule_course"];
$course_schedule_faculty = $_POST["course_schedule_faculty"];


$query="INSERT INTO course_schedule(course_schedule_issue,course_schedule_day,course_schedule_date,course_schedule_program,course_schedule_starttime,course_schedule_endtime,course_schedule_course,course_schedule_faculty) VALUES('$course_schedule_issue','$course_schedule_day ','$course_schedule_date','$course_schedule_program','$course_schedule_starttime','$course_schedule_endtime','$course_schedule_course','$course_schedule_faculty');";

$result=mysqli_query($con,$query);

if($result){
	header("Location:course_schedule.php");
}
else{
	echo "Something went wrong";
}
mysqli_close($con);
?>