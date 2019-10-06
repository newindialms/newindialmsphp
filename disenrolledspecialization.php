
<?php
require "init.php";

$student_rollnno = $_POST["student_rollnno"];
$courses_disenrolled = $_POST["courses_disenrolled"];

	$query="SELECT student_specialization FROM first_second_year_student_details WHERE student_rollnno='$student_rollnno'";
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
		 $query="UPDATE first_second_year_student_details SET student_specialization = '$newarraynama' WHERE student_rollnno = '$student_rollnno'";
            $result=mysqli_query($con,$query);
            $queryu="UPDATE second_year_students SET student_specialization = '$newarraynama' WHERE student_rollno = '$student_rollnno'";
            $resultu=mysqli_query($con,$queryu);
	}

$result=mysqli_query($con,$query);
        $code="Deleted";
		$message="Specialization deleted successfully";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
mysqli_close($con);
?>