<?php

require "init.php";

	$addcourse_name = $_POST["addcourse_name"];
	$addcourse_code = $_POST["addcourse_code"];
	$addcourse_credits = $_POST["addcourse_credits"];
	$addcourse_abbr = $_POST["addcourse_abbr"];
    $addcourse_startdate = $_POST["addcourse_startdate"];
    $addcourse_enddate = $_POST["addcourse_enddate"];
    $addcourse_semester = $_POST["addcourse_semester"];
	$addcourse_coursetype = $_POST["addcourse_coursetype"];
	$addcourse_specialization=$_POST["addcourse_specialization"];
	$addcourse_scheduledate = $_POST["addcourse_scheduledate"];
    $addcourse_time = $_POST["addcourse_time"];
    $addcourse_faculty = $_POST["addcourse_faculty"];
    $addcourse_feedback = $_POST["$addcourse_feedback"];
	$addcourse_description = $_POST["addcourse_description"];
	$addcourse_outcomes = $_POST["addcourse_outcomes"];
	
	$sql="select * from add_course where addcourse_name like '".$addcourse_name."';";
	
	$result = mysqli_query($con,$sql);
	$response=array();
	
	if(mysqli_num_rows($result)>0){
		
		$code="failed";
		$message="Course Already exist";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	else{
	    
	    if($addcourse_coursetype=="Core"){
	        $addcourse_specialization="Core Courses";
	    }

		$sql="insert into add_course values(DEFAULT,'".$addcourse_name."','".$addcourse_code."','".$addcourse_credits."','".$addcourse_abbr."','".$addcourse_startdate."','".$addcourse_enddate."','".$addcourse_semester."','".$addcourse_coursetype."','".$addcourse_specialization."','".$addcourse_scheduledate."','".$addcourse_time."','".$addcourse_faculty."','".$addcourse_description."','".$addcourse_outcomes."');";
            
		$result = mysqli_query($con,$sql);
		
		$code="Success";
		$message="Course Added Successfully";
		
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
		    $addcourse_id='1';
        $sql1="insert into feedback_questions values('".$addcourse_id."','".$addcourse_feedback."');";
		        $result1 = mysqli_query($con,$sql1);
    
	mysqli_close($con);
?>