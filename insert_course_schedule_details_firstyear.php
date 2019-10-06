<?php
require "init.php";

$course_code = $_POST["course_code"];
$course_name = $_POST["course_name"];
$faculty_code = $_POST["faculty_code"];
$course_date = $_POST["course_date"];
$course_schedule_day = $_POST["course_schedule_day"];
$course_schedule_time = $_POST["course_schedule_time"];
$student_group = '0';
$student_batch = $_POST["student_batch"];
$course_classroom = $_POST["course_classroom"];
$course_schedule_issue = $_POST["course_schedule_issue"];


$query="INSERT INTO course_schedule_firstyear(course_code,course_name,faculty_code,course_date,course_schedule_day,course_schedule_time,student_group,student_batch,course_classroom,course_schedule_issue) VALUES('$course_code','$course_name ','$faculty_code','$course_date','$course_schedule_day','$course_schedule_time','$student_group','$student_batch','$course_classroom','$course_schedule_issue');";

$result=mysqli_query($con,$query);

if($result){
	header("Location:course_schedule_firstyear.php");
}
else{
	echo "Something went wrong";
}
mysqli_close($con);
?>