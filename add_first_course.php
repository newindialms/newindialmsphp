
<?php

require "init.php";

	$course_details_code = $_POST["course_details_code"];
	$course_details_name = $_POST["course_details_name"];
	$addcourse_credits = $_POST["course_details_credits"];
    $course_details_faculty = $_POST["course_details_faculty"];
    $course_details_abbr = $_POST["course_details_abbr"];
   
	
	$sql="select * from first_year_course_list where first_year_course_list_code like '".$course_details_code."';";
	
	$result = mysqli_query($con,$sql);
	$response=array();
	
	if(mysqli_num_rows($result)>0){
		
		$code="failed";
		$message="Course Already exist";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	else{
		$sql="insert into first_year_course_list values(DEFAULT,'".$course_details_code."','".$course_details_name."','".$addcourse_credits."','".$course_details_faculty."','".$course_details_abbr."');";
	   
	   	/* updating the First_year table when new course is added for the first year*/
	    $combined_coursename=",".$course_details_name;
		$sqlupdate="UPDATE first_year SET first_year_courses = CONCAT(first_year_courses, '".$combined_coursename."')"; $resultsql = mysqli_query($con,$sqlupdate);
		

		$result = mysqli_query($con,$sql);
		$code="Success";
		$message="Course Added Successfully";
		
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
		
	
		
	}
	mysqli_close($con);
?>