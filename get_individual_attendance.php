<?php
require "init.php";

$student_rollnno = $_POST['student_rollnno'];
$course_details_name = $_POST['course_details_name'];
	
	
$query= "select attendance_date,attendance_time,attendance_status from second_year_attendance_details WHERE (student_rollnno LIKE '%,$student_rollnno,%' OR student_rollnno LIKE '$student_rollnno,%' OR student_rollnno LIKE '%,$student_rollnno' OR student_rollnno LIKE '%$student_rollnno%') AND course_details_name LIKE '%$course_details_name%' ";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("attendance_date"=>$row[0],"attendance_time"=>$row[2],"attendance_status"=>$row[1]));
	
}
mysqli_close($con);
echo json_encode(array('attendancelist'=>$response));
?>