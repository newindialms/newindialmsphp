<?php
require "init.php";

$deviceid = $_POST["deviceid"];
$token = $_POST["token"];
$type = $_POST["type"];
$typeid = $_POST["typeid"];

$query="SELECT * FROM login_success_device_details WHERE deviceid='$deviceid';";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)
{
	echo "if";
    $query="UPDATE login_success_device_details SET token='$token',type='$type',typeid='$typeid' WHERE deviceid='$deviceid';";
	$result=mysqli_query($con,$query);
}
else{
	echo "else";
    $query="INSERT INTO login_success_device_details(deviceid,token,type,typeid) VALUES('$deviceid','$token','$type','$typeid');";
	$result=mysqli_query($con,$query);
	}	

mysqli_close($con);
?>