<?php
require "init.php";

$faculty_employeeid = $_POST["faculty_employeeid"];
	
$query= "SELECT first_year_course_list_faculty,first_year_course_list_name,first_year_course_list_code FROM first_year_course_list ORDER BY first_year_course_list_name;";
$queryf= "select faculty_code from faculty_details where faculty_employeeid='".$faculty_employeeid."';";

$result = mysqli_query($con,$query);
$resultf = mysqli_query($con,$queryf);
$response=array();

    $rowf=mysqli_fetch_array($resultf);
        while($row=mysqli_fetch_array($result)){
                     $array = explode(',', $row[0]);
        	            foreach($array as $values){
        	                if($values===$rowf[0]){
        	                   array_push($response,array("course_details_code"=>$row[2],"course_details_name"=>$row[1],"course_type"=>"1"));
        	                }
        	                
        	            }
        }
$query= "SELECT course_details_name,course_details_code FROM second_year_course_list WHERE (course_details_faculty=(select faculty_code from faculty_details where faculty_employeeid='".$faculty_employeeid."') AND course_details_category='Elective')ORDER BY course_details_name;";

$result = mysqli_query($con,$query);
$response1=array();

while($row=mysqli_fetch_array($result)){
	array_push($response1,array("course_details_name"=>$row[0],"course_details_code"=>$row[1],"course_type"=>"2"));
	
}
mysqli_close($con);
$myarray=array_merge($response,$response1);
echo json_encode(array('course_details'=>$myarray));
?>