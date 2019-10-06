<?php
require "init.php";
	
$course_schedule_issue	 = $_POST["course_schedule_issue"];
$course_schedule_day = $_POST["course_schedule_day"];

$query= "SELECT course_schedule_day,course_schedule_date,course_schedule_starttime,course_schedule_endtime,course_schedule_course,course_schedule_faculty,course_schedule_program FROM course_schedule WHERE (course_schedule_issue ='$course_schedule_issue' AND course_schedule_day='$course_schedule_day')";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_schedule_day"=>$row[0],"course_schedule_date"=>$row[1],"course_schedule_starttime"=>$row[2],"course_schedule_endtime"=>$row[3],"course_schedule_course"=>$row[4],"course_schedule_faculty"=>$row[5],"course_schedule_program"=>$row[6]));
	
}
mysqli_close($con);
echo json_encode(array('timetable'=>$response));
?>