<?php
require "init.php";

$query= "select feedback_title from feedback_questions;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("feedback_title"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('feedback'=>$response));
?>