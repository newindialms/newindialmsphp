<?php
require "init.php";

$employeeid = $_POST["employeeid"];
$lastname= $_POST["lastname"];
$firstname = $_POST["firstname"];
$phoneno= $_POST["phoneno"];
$emailid = $_POST["emailid"];
$program= $_POST["program"];
$designation = $_POST["designation"];
$yearofjoining = $_POST["yearofjoining"];

$query="select * from enroll_faculty where employeeid like '".$employeeid."';";

$result = mysqli_query($con,$query);
$response=array();

if(mysqli_num_rows($result)>0){
	
	$code="Fail";
		$message="Faculty record exist";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
}else{
	
	$sql="insert into enroll_faculty values(DEFAULT,'".$employeeid."','".$lastname."','".$firstname."','".$phoneno."','".$emailid."','".$program."','".$designation."','".$yearofjoining."');";
	$result = mysqli_query($con,$sql);
		$code="Success";
		$message="Successfully Added";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	
}
	mysqli_close($con);
?>