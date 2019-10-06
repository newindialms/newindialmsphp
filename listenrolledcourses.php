<?php
require "init.php";

$student_rollno = $_POST['student_rollno'];

$queryyear="SELECT student_year FROM first_second_year_student_details WHERE student_rollnno ='$student_rollno'";
$resultyear = mysqli_query($con,$queryyear);

while ($row = mysqli_fetch_assoc($resultyear)) {
  if($row['student_year']==1) {
	$query= "SELECT first_year_courses FROM first_year_students WHERE student_rollnno ='$student_rollno'";
	$result = mysqli_query($con,$query);
$response=array();
    while($rows = mysqli_fetch_array($result)){
        $myarray = array_filter(array_map('trim', explode(',', $rows['first_year_courses'])));
        asort($myarray);
        $myarray = implode(',', $myarray);
        
    	$mark=explode(',', $myarray);
    	foreach($mark as $out) {
    	    array_push($response,$out);
    		}
    		
    	 echo json_encode(array('course_details'=>$response));
    	 
    }
}
    else{
    	$query= "SELECT courses_enrolled  FROM second_year_students WHERE student_rollno ='$student_rollno'";
    	$result = mysqli_query($con,$query);
    $response=array();
        while($rows = mysqli_fetch_array($result)){
            
            $myarray = array_filter(array_map('trim', explode(',', $rows['courses_enrolled'])));
            asort($myarray);
            $myarray = implode(',', $myarray);
            
        	$mark=explode(',', $rows['courses_enrolled']);
        	foreach($mark as $out) {
        	    array_push($response,$out);
        		}
        	 echo json_encode(array('course_details'=>$response));
        }
    }
}
mysqli_close($con);

?>