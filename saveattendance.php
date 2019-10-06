<?php

require "init.php";

$date = date_default_timezone_set('Asia/Kolkata');

$student_rollnno= $_POST["student_rollnno"];
$course_details_name = $_POST["course_details_name"];
$faculty_employeeid = $_POST["faculty_employeeid"];
$attendance_date = date('j-n-Y');
$attendance_time = date('g:i a');
$attendance_status= $_POST["attendance_status"];

$arr_str  = implode(",", $student_rollnno);

if($student_rollnno === NULL){
    $arr_str=0;
}

    $sql = "INSERT INTO second_year_attendance_details (student_rollnno, course_details_name, faculty_employeeid,attendance_date,attendance_time,attendance_status) values ( '$arr_str','$course_details_name','$faculty_employeeid','$attendance_date','$attendance_time','$attendance_status');";

    $result=mysqli_query($con, $sql); 
	$response=array();
	if($result){
            	$code="Success";
				$message="Data saved successfully";
				array_push($response,array("code"=>$code,"message"=>$message,"message_date"=>$attendance_date,"message_time"=>$attendance_time));
				echo json_encode($response);
		}else{

				$code="failed";
				$message="Try again";
				array_push($response,array("code"=>$code,"message"=>$message));
				echo json_encode($response);
		}

mysqli_close($con);