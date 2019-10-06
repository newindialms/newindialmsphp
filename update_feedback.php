<?php 
require "init.php";

$feedback_title = $_POST["feedback_title"];
$feedback_question = $_POST["feedback_question"];
$feedback_type = $_POST["feedback_type"];
$id = $_POST["id"];



$query="UPDATE feedback_info SET 
feedback_title='$feedback_title',
feedback_question='$feedback_question',
feedback_type='$feedback_type'
WHERE id='$id' ";

$result=mysqli_query($con,$query);
$response=array();

if($result){
		$code="Success";
		$message="Feedback updated Successfully";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
}
else{
	$code="Failed";
		$message="Retry again.";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
}
mysqli_close($con);
?>