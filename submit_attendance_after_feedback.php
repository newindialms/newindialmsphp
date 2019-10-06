
<?php

require "init.php";

	$course_name = $_POST["course_name"];
	$student_id = $_POST["student_id"];
	$course_date = $_POST["course_date"];
    $course_time = $_POST["course_time"];
    $faculty_id = $_POST["faculty_id"];
   
	$sql="select * from attendace_after_feedback where (course_time like '".$course_time."' AND course_name like '".$course_name."'AND course_date like '".$course_date."'AND faculty_id like '".$faculty_id."');";
	
	$result = mysqli_query($con,$sql);
	$response=array();
	
	if(mysqli_num_rows($result)>0){
		$combined_studentid=",".$student_id;
		$sqlupdate="UPDATE attendace_after_feedback SET student_id = CONCAT(student_id, '".$combined_studentid."')WHERE (course_time like '".$course_time."' AND course_name like '".$course_name."'AND course_date like '".$course_date."'AND faculty_id like '".$faculty_id."')"; 
		$resultsql = mysqli_query($con,$sqlupdate);
	
	}
	else{
		$sql="insert into attendace_after_feedback values(DEFAULT,'".$student_id."','".$faculty_id."','".$course_name."','".$course_date."','".$course_time."');";

		$result = mysqli_query($con,$sql);
		$code="Success";
		$message="Attendance Added Successfully";
		
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	mysqli_close($con);
?>