<?php
require "init.php";

$query= "select faculty_firstname,faculty_lastname,	faculty_phone,faculty_email,faculty_specialization from faculty_details order by faculty_email asc;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("faculty_firstname"=>$row[0],"faculty_lastname"=>$row[1],"faculty_phone"=>$row[2],"faculty_email"=>$row[3],"faculty_specialization"=>$row[4]));
	
}
mysqli_close($con);
echo json_encode(array('faculty_directory'=>$response));
?>