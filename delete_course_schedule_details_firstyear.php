<?php 
require "init.php";

$course_schedule_id = $_GET["id"];

$query="DELETE FROM course_schedule_firstyear WHERE course_schedule_id='$course_schedule_id'";

$result=mysqli_query($con,$query);

if($result){
	header("Location:course_schedule_firstyear.php");
}
else{
	echo "Recheck";
}
mysqli_close($con);
?>