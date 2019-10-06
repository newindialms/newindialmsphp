<?php

require "init.php";

$date = date_default_timezone_set('Asia/Kolkata');

$feedback_response= $_POST["feedback_response"];
$feedback_question= $_POST["feedback_question"];
$faculty_id = $_POST["faculty_id"];
$student_id = $_POST["student_id"];
$feedback_sent_date = $_POST["feedback_sent_date"];
$feedback_sent_time = $_POST["feedback_sent_time"];
$feedback_submit_date = date('j-n-Y');
$feedback_submit_time = date('g:i a');
$coursename= $_POST["coursename"];

$arr_str  = preg_replace('/[^a-zA-Z0-9?," "]/', '', $feedback_response);
$arr_str_question = preg_replace('/[^a-zA-Z0-9?," "]/', '', $feedback_question);

// $arr_str  = implode(",", $feedback_response);
// $arr_str_question = implode(",", $feedback_question);

// if($feedback_response === NULL){
//     $arr_str=0;
// }
// if($feedback_question === NULL){
//     $arr_str_question=0;
// }

    $sql = "INSERT INTO submitted_text_feedback (feedback_response,feedback_question, faculty_id, student_id,feedback_sent_date,feedback_sent_time,feedback_submit_date,feedback_submit_time,coursename) values ( '$arr_str','$arr_str_question','$faculty_id','$student_id','$feedback_sent_date','$feedback_sent_time','$feedback_submit_date','$feedback_submit_time','$coursename');";

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