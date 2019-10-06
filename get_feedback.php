<?php
require "init.php";

$query= "select * from feedback_info ORDER BY feedback_type DESC;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("id"=>$row[0],"feedback_title"=>$row[1],"feedback_question"=>$row[2],"feedback_type"=>$row[3]));
	
}
mysqli_close($con);
echo json_encode($response);
?>