<?php
require "init.php";

$query= "select course_details_name, course_details_faculty,course_details_code from course_details ORDER BY course_details_name;";

$result = mysqli_query($con,$query);
$response=array();
$response1=array();

$query1= "select first_year_course_list_name, first_year_course_list_faculty,first_year_course_list_code from first_year_course_list ORDER BY first_year_course_list_name;";
$result1 = mysqli_query($con,$query1);

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_details_name"=>$row[0],"course_details_faculty"=>$row[1],"course_details_code"=>$row[2]));
}

	while($row1=mysqli_fetch_array($result1)){
		
	array_push($response1,array("first_year_course_list_name"=>$row1[0],"first_year_course_list_faculty"=>$row1[1],"first_year_course_list_code"=>$row1[2]));
	}

mysqli_close($con);
echo json_encode(array("Course_List"=>$response,"Course_List_first"=>$response1));
?>