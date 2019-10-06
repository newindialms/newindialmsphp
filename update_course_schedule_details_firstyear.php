<?php 
require "init.php";

$course_schedule_id = $_GET["course_schedule_id"];
$course_code = $_GET["course_code"];
$course_name = $_GET["course_name"];
$faculty_code = $_GET["faculty_code"];
$course_date = $_GET["course_date"];
$course_schedule_day = $_GET["course_schedule_day"];
$course_schedule_time = $_GET["course_schedule_time"];
$student_group = $_GET["student_group"];
$student_batch = $_GET["student_batch"];
$course_classroom = $_GET["course_classroom"];
$course_schedule_issue = $_GET["course_schedule_issue"];

$query="UPDATE course_schedule_firstyear SET 
course_schedule_issue='$course_schedule_issue',
course_code='$course_code',
course_name='$course_name',
faculty_code='$faculty_code',
course_date='$course_date',
course_schedule_day='$course_schedule_day',
course_schedule_time='$course_schedule_time',
student_group='$student_group',
student_batch='$student_batch',
course_classroom='$course_classroom'WHERE course_schedule_id= '$course_schedule_id' ;";


$result=mysqli_query($con,$query);

if($result){
header("Location:course_schedule_firstyear.php");
}
else{
	echo "Recheck";
}
mysqli_close($con);
?>