<?php
require "init.php";

$query= "select * from email_profile;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("username"=>$row[0],"password"=>$row[1]));
	
}
mysqli_close($con);
echo json_encode(array('email_profile'=>$response));
?>