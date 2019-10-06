<?php
require "init.php";

$student_rollnno = $_POST["student_rollnno"];
$student_specialization = $_POST["student_specialization"];


$query="SELECT student_specialization FROM student_details WHERE student_rollnno='$student_rollnno'";
	$result=mysqli_query($con,$query);
    $response=array();
     $row=mysqli_fetch_array($result);
	 
// if you enrolling for first time
	if(empty($row[0])){
    	$query="UPDATE student_details SET student_specialization = '$student_specialization' WHERE student_rollnno = '$student_rollnno'";
    	
    	$result=mysqli_query($con,$query);
    	$queryu="UPDATE student_year_table SET student_specialization = '$student_specialization' WHERE student_rollno = '$student_rollnno'";
            $resultu=mysqli_query($con,$queryu);
    	if ( $result === TRUE) {
    		echo "Record updated successfully";
    	} else {
    		echo "Error updating record: " . $con->error;
    	}
	}
	else{
	    $query="SELECT student_specialization FROM student_details WHERE student_rollnno='$student_rollnno'";
    	$result=mysqli_query($con,$query);
	    $row=mysqli_fetch_array($result);
		$output=$row[0];
		$array = explode(',', $output);
		$myspecialization= explode(',', $student_specialization);
		
		$common = array_intersect($array, $myspecialization	);
		
		$Difference_1 = array_diff($array, $myspecialization); 
		$Difference_2 = array_diff($myspecialization, $array); 
		$Diff = array_merge($Difference_1, $Difference_2);
		$Difference = implode(',', $Diff);
		$Commonval = implode(',', $common);
		$finalvalue=$Difference.",".$Commonval;
		$finalvalue = rtrim($finalvalue, ',');
		$finalvalue = ltrim($finalvalue, ',');
		
		$query="UPDATE student_details SET student_specialization = '$finalvalue' WHERE student_rollnno = '$student_rollnno'";
    	$result=mysqli_query($con,$query);
		
		$queryu="UPDATE student_year_table SET student_specialization = '$finalvalue' WHERE student_rollno = '$student_rollnno'";
            $resultu=mysqli_query($con,$queryu);
			
    	if ( $result === TRUE) {
    		echo "Record updated successfully";
    	} else {
    		echo "Error updating record: " . $con->error;
    	}
		 
	    }
mysqli_close($con);
?>