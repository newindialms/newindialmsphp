<?php
require "init.php";

$faculty_employeeid = $_POST["faculty_employeeid"];
$faculty_lastname= $_POST["faculty_lastname"];
$faculty_firstname = $_POST["faculty_firstname"];
$faculty_phone= $_POST["faculty_phone"];
$faculty_email = $_POST["faculty_email"];
$faculty_program= $_POST["faculty_program"];
$faculty_designation= $_POST["faculty_designation"];
$faculty_joining = $_POST["faculty_joining"];
$faculty_specialization = $_POST["faculty_specialization"];
$faculty_code = $_POST["faculty_code"];


$query="select * from faculty_details where faculty_employeeid like '".$faculty_employeeid."';";

$result = mysqli_query($con,$query);
$response=array();

if(mysqli_num_rows($result)>0){
	
	$code="Fail";
		echo "<script type=\"text/javascript\">
alert(\"Faculty Record Exists\");
window.location = \"enroll_faculty_form.php\"
</script>";
		
}else{
	
	$sql="insert into faculty_details values(DEFAULT,'".$faculty_employeeid."','".$faculty_lastname."','".$faculty_firstname."','".$faculty_phone."','".$faculty_email."','".$faculty_program."','".$faculty_designation."','".$faculty_joining."','".$faculty_specialization."','".$faculty_code."');";
	$result = mysqli_query($con,$sql);
		echo "<script type=\"text/javascript\">
alert(\"Faculty Record added Successfully\");
window.location = \"enroll_faculty_form.php\"
</script>";
}
	mysqli_close($con);
?>