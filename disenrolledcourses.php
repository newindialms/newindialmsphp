
<?php
require "init.php";

$student_rollno = $_POST["student_rollno"];
$courses_disenrolled = $_POST["courses_disenrolled"];

	$query="SELECT courses_enrolled FROM second_year_students WHERE student_rollno='$student_rollno'";
	$result=mysqli_query($con,$query);
    $response=array();
	
	while($row=mysqli_fetch_array($result)){
		$output=$row[0];
		$array = explode(',', $output);
		 foreach($array as $value) //loop over values
        {
            if($value===$courses_disenrolled){
               $trimmed = str_replace($courses_disenrolled, '', $output) ;
                $newarraynama=rtrim($trimmed,",");
                $newarraynama=ltrim($newarraynama,",");
                $newarraynama=str_replace(',,', ',', $newarraynama) ;
            }
            
		}
		 $query="UPDATE second_year_students SET courses_enrolled = '$newarraynama' WHERE student_rollno = '$student_rollno'";
            $result=mysqli_query($con,$query);
          
	}

$result=mysqli_query($con,$query);
        $code="Deleted";
		$message="Course Deleted successfully";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
mysqli_close($con);
?>