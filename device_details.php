<?php
require "init.php";

$token = $_POST["token"];
$deviceid = $_POST["deviceid"];


//$query="INSERT INTO device_details(token,deviceid) VALUES('$token','$deviceid ');";

$query="SELECT * FROM device_details WHERE deviceid='$deviceid';";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)
{
    $query="UPDATE device_details SET token='$token' WHERE deviceid='$deviceid';";
	$result=mysqli_query($con,$query);
}
else{
    $query="INSERT INTO device_details(token,deviceid) VALUES('$token','$deviceid ');";
	$result=mysqli_query($con,$query);
	}	

mysqli_close($con);
?>