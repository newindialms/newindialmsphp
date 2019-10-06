<?php
require "init.php";

$query= "select course_details_name, course_details_code from second_year_course_list
         union all
         select first_year_course_list_name,first_year_course_list_code from first_year_course_list ORDER BY course_details_name;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("course_details_name"=>$row[0],"course_details_code"=>$row[1]));
	
}
mysqli_close($con);
echo json_encode(array('Course_List'=>$response));
?>