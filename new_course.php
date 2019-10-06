<?php

require "init.php";

	$course_details_code = $_POST["course_details_code"];
	$course_details_name = $_POST["course_details_name"];
	$course_details_specialization=$_POST["course_details_specialization"];
	$addcourse_credits = $_POST["course_details_credits"];
	$course_details_category = $_POST["course_details_category"];
    $course_details_faculty = $_POST["course_details_faculty"];
    $course_details_abbr = $_POST["course_details_abbr"];
   
	
	$sql="select * from course_details where course_details_code like '".$course_details_code."';";
	
	$result = mysqli_query($con,$sql);
	$response=array();
	
	if(mysqli_num_rows($result)>0){
		
		$code="failed";
		$message="Course Already exist";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	else{
	  
		$sql="insert into course_details values(DEFAULT,'".$course_details_code."','".$course_details_name."','".$course_details_specialization."','".$addcourse_credits."','".$course_details_category."','".$course_details_faculty."','".$course_details_abbr."');";
	 

		$result = mysqli_query($con,$sql);
		$code="Success";
		$message="Course Added Successfully";
		
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	mysqli_close($con);
?>