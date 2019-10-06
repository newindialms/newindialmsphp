<?php
require "init.php";

$student_rollnno = $_POST['student_rollnno'];

$query= "SELECT student_specialization FROM student_details WHERE student_rollnno='$student_rollnno'";
$result = mysqli_query($con,$query);
$response=array();
while($row = mysqli_fetch_array($result)){
	$mark=explode(',', $row['student_specialization']);
	foreach($mark as $out) {
	    if($out=="General"){
	        
	    }
    	    else{
    	        array_push($response,$out);
    	    }
		}
	 echo json_encode(array('specialization_details'=>$response));
}

mysqli_close($con);

?>