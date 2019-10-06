<?php
require "init.php";
	
$course_schedule_issue = $_POST["course_schedule_issue"];
$course_schedule_day = $_POST["course_schedule_day"];

$query= "SELECT course_code,course_name,faculty_code,course_date,course_schedule_day,course_schedule_time,student_group,student_batch,course_classroom FROM course_schedule_firstyear WHERE (course_schedule_issue ='$course_schedule_issue' AND course_schedule_day='$course_schedule_day')";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_code"=>$row[0],"course_name"=>$row[1],"faculty_code"=>$row[2],"course_date"=>$row[3],"course_schedule_day"=>$row[4],"course_schedule_time"=>$row[5],"student_group"=>$row[6],"student_batch"=>$row[7],"course_classroom"=>$row[8]));
	
}
mysqli_close($con);
echo json_encode(array('timetable'=>$response));
?>