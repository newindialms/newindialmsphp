<?php

require "init.php";

$date = date_default_timezone_set('Asia/Kolkata');

$feedback_response= $_POST["feedback_response"];
$faculty_id = $_POST["faculty_id"];
$student_id = $_POST["student_id"];
$feedback_sent_date = $_POST["feedback_sent_date"];
$feedback_sent_time = $_POST["feedback_sent_time"];
$feedback_submit_date = date('j-n-Y');
$feedback_submit_time = date('g:i a');
$coursename= $_POST["coursename"];

$arr_str  = implode(",", $feedback_response);

if($feedback_response === NULL){
    $arr_str=0;
}

    $sql = "INSERT INTO submitted_feedback (feedback_response, faculty_id, student_id,feedback_sent_date,feedback_sent_time,feedback_submit_date,feedback_submit_time,coursename) values ( '$arr_str','$faculty_id','$student_id','$feedback_sent_date','$feedback_sent_time','$feedback_submit_date','$feedback_submit_time','$coursename');";

    $result=mysqli_query($con, $sql); 
	$response=array();
	if($result){
            	$code="Success";
				$message="Data saved successfully";
				array_push($response,array("code"=>$code,"message"=>$message));
				echo json_encode($response);
		}else{

				$code="failed";
				$message="Try again";
				array_push($response,array("code"=>$code,"message"=>$message));
				echo json_encode($response);
		}

mysqli_close($con);