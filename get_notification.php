<?php
require "init.php";
	
$query= "SELECT * from notification_details;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("notification_title"=>$row[1],"notification_message"=>$row[2],"notification_date"=>$row[3]));
	
}
mysqli_close($con);
echo json_encode(array('notification'=>$response));
?>