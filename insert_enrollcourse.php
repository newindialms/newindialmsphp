<?php
require "init.php";

$student_rollno = $_POST["student_rollno"];
$student_year = $_POST["student_year"];
$courses_enrolled = $_POST["courses_enrolled"];
$student_specialization = $_POST["student_specialization"];

$query="SELECT * FROM second_year_students WHERE student_rollno='$student_rollno'";

$result=mysqli_query($con,$query);

$querye="SELECT courses_enrolled FROM second_year_students WHERE student_rollno='$student_rollno'";
	$resulte=mysqli_query($con,$querye);
	
$row=mysqli_fetch_array($resulte);
if(mysqli_num_rows($result) > 0){
	$query="SELECT courses_enrolled FROM second_year_students WHERE student_rollno='$student_rollno'";
    	$result=mysqli_query($con,$query);
	    $row=mysqli_fetch_array($result);
		$output=$row[0];
		$array = explode(',', $output);
		$mycourses= explode(',', $courses_enrolled);
		
		$common = array_intersect($array, $mycourses	);
		
		$Difference_1 = array_diff($array, $mycourses); 
		$Difference_2 = array_diff($mycourses, $array); 
		$Diff = array_merge($Difference_1, $Difference_2);
		$Difference = implode(',', $Diff);
		$Commonval = implode(',', $common);
		$finalvalue=$Difference.",".$Commonval;
		$finalvalue = rtrim($finalvalue, ',');
		$finalvalue = ltrim($finalvalue, ',');
		
		$query="UPDATE second_year_students SET courses_enrolled = '$finalvalue' WHERE student_rollno = '$student_rollno'";
    	$result=mysqli_query($con,$query);
    	if ( $result === TRUE) {
    		echo "Record updated successfully";
    	} else {
    		echo "Error updating record: " . $con->error;
    	}
		 
}
else{
	$query="INSERT INTO second_year_students(student_rollno,student_year,courses_enrolled,student_specialization) VALUES('$student_rollno','$student_year ','$courses_enrolled','$student_specialization')";
	$result=mysqli_query($con,$query);
	echo "inserted successfully";
}
mysqli_close($con);
?>