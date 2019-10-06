<?php
require "init.php";

 $id = $_POST['id'];

$sql = "DELETE FROM feedback_questions WHERE id = '$id'";

$result = mysqli_query($con,$sql);
$response=array();

 if(mysqli_query($con,$sql))
{
		$code="Success";	
		$message="Feedback Deleted Successfully";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
}
else
{
		$code="Fail";
		$message="Something went wrong";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
 }

 mysqli_close($con);
?>
