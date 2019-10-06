<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'init.php';

$con = new mysqli($host, $db_user, $db_pass, $db_name);

 $facultydetails_ID = $_POST['facultydetails_ID'];

$Sql_Query = "DELETE FROM faculty_details WHERE facultydetails_ID = '$facultydetails_ID';";

 if(mysqli_query($con,$Sql_Query))
{
        $code="Deleted";
		$message="Faculty Deleted successfully";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
}
else
{
        $code="Failed";
		$message="Something went wrong";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
 }
 }
 mysqli_close($con);
?>