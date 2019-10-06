<?php

require "init.php";

$course_details_name = $_POST["course_details_name"];

$sqlfirst="SELECT * FROM first_year_course_list WHERE first_year_course_list_name = '".$course_details_name."' ;";
$sqlsecond="SELECT * FROM second_year_course_list WHERE course_details_name = '".$course_details_name."';";

$resultfirst = mysqli_query($con,$sqlfirst);

if(mysqli_num_rows($resultfirst) > 0){
    $query = "DELETE FROM first_year_course_list WHERE first_year_course_list_name = '".$course_details_name."';";
     $queryupdate ="UPDATE first_year_students SET `first_year_courses`=REPLACE(first_year_courses,'".$course_details_name."','')";
     $result = mysqli_query($con,$queryupdate);
}

else{
    $query = "DELETE FROM second_year_course_list WHERE course_details_name = '".$course_details_name."';";
}
$result = mysqli_query($con,$query);
        
        $response=array();
         if($result)
        {
        		$code="Deleted";
        		$message="Record Deleted successfully";
        		array_push($response,array("code"=>$code,"message"=>$message));
        		echo json_encode($response);
        }
        else
        {
         $code="fail";
        		$message="Something went wrong";
        		array_push($response,array("code"=>$code,"message"=>$message));
        		echo json_encode($response);
         }

 mysqli_close($con);
?>