<?php
require "init.php";

$calendar_val = $_POST["calendar_val"];

$query="UPDATE calendar_val SET calendar_val='$calendar_val' WHERE id='1';";

$result=mysqli_query($con,$query);

if($result){
	echo "Success";
}
else{
	echo "Something went wrong";
}
mysqli_close($con);
?>