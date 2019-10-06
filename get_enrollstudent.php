<?php
require "init.php";

$query= "select * from enroll_student;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("firstname"=>$row[3],"lastname"=>$row[2],"emailid"=>$row[5],"rollno"=>$row[1]));
	
}
mysqli_close($con);
echo json_encode(array('enrollstudent_list'=>$response));
?>