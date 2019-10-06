<?php
require "init.php";

$query= "select faculty_code from faculty_details;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("faculty_code"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('faculty'=>$response));
?>