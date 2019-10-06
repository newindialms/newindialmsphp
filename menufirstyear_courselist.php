<?php
require "init.php";

$query= "select first_year_course_list_name, first_year_course_list_faculty from first_year_course_list ORDER BY first_year_course_list_name;";

$result = mysqli_query($con,$query);
$response=array();


while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("first_year_course_list_name"=>$row[0],"first_year_course_list_faculty"=>$row[1]));
	
}

mysqli_close($con);
echo json_encode(array('Course_List'=>$response));
?>