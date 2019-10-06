<?php
require "init.php";

$feedback_title = $_POST["feedback_title"];
$feedback_question= $_POST["feedback_question"];
$feedback_type = $_POST["feedback_type"];

$query="select * from feedback_questions where feedback_question like '".$feedback_question."';";

$result = mysqli_query($con,$query);
$response=array();

if(mysqli_num_rows($result)>0){
	
	$code="Fail";
		$message="This Feedback exist already";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
}else{
	
	$sql="insert into feedback_questions values(DEFAULT,'".$feedback_title."','".$feedback_question."','".$feedback_type."');";
	$result = mysqli_query($con,$sql);
		$code="Success";
		$message="Feedback Successfully Added";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	
}
	mysqli_close($con);
?>