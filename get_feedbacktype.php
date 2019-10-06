<?php
require "init.php";

$query= "select DISTINCT feedback_type from feedback_info ORDER BY feedback_type ;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("feedback_type"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode($response);
?>