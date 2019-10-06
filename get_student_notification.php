<?php
require "init.php";

$query= "select notification_title,notification_message,notification_date from notification_details WHERE notification_target='student' order by id desc;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("notification_title"=>$row[0],"notification_message"=>$row[1],"notification_date"=>$row[2]));
	
}
mysqli_close($con);
echo json_encode(array('student_notification_list'=>$response));
?>