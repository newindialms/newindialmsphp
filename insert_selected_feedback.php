<?php

require "init.php";
$feedback_id= $_POST["feedback_id"];
$faculty_rollno= $_POST["faculty_rollno"];
$course_details = $_POST["course_details"];
$course_date = $_POST["course_date"];
$course_time = $_POST["course_time"];


$arr_str  = implode(",", $feedback_id);


    $sql = "INSERT INTO selected_feedback (	feedback_id, faculty_rollno, course_details,course_date,course_time) values ( '$arr_str','$faculty_rollno','$course_details','$course_date','$course_time');";

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