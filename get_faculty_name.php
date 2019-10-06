<?php
require "init.php";

$coursename = $_POST["coursename"];

$query= "select first_year_course_list_credits,	first_year_course_list_faculty from first_year_course_list where first_year_course_list_name like '".$coursename."';";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	$output=$row[1];
	
	$searchString = ',';

 if( strpos($output, $searchString) !== false ) {
      $array = explode(',', $output);
	   foreach($array as $value) //loop over values
        {
		
		$query="SELECT faculty_firstname,faculty_lastname,faculty_phone,faculty_email FROM faculty_details WHERE faculty_code='$value'";
		$result1=mysqli_query($con,$query);
           while($row1 = mysqli_fetch_array($result1)) {
               array_push($response,array("faculty_firstname"=>$row1['faculty_firstname'],"faculty_lastname"=>$row1['faculty_lastname'],"faculty_phone"=>$row1['faculty_phone'],"faculty_email"=>$row1['faculty_email'],"course_credits"=>$row[0]));
              
           }
		}
 }
 else{
 $query="SELECT faculty_firstname,faculty_lastname,faculty_phone,faculty_email FROM faculty_details WHERE faculty_code='$output'";
			
			$result1=mysqli_query($con,$query);
           while($row1 = mysqli_fetch_array($result1)) {
               array_push($response,array("faculty_firstname"=>$row1['faculty_firstname'],"faculty_lastname"=>$row1['faculty_lastname'],"faculty_phone"=>$row1['faculty_phone'],"faculty_email"=>$row1['faculty_email'],"course_credits"=>$row[0]));
              
           }
 }		
	
}
mysqli_close($con);
echo json_encode(array('facultydetails'=>$response));
?>