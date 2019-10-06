<?php
require "init.php";
	

$query= "SELECT first_year_course_list_name,first_year_course_list_code FROM first_year_course_list;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("core_course"=>$row[0],"core_code"=>$row[1]));
	
}
mysqli_close($con);
echo json_encode(array('corelist'=>$response));
?>