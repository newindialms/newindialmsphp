<?php
require "init.php";

$student_rollnno = $_POST["student_rollnno"];
$student_lastname= $_POST["student_lastname"];
$student_firstname = $_POST["student_firstname"];
$student_phone= $_POST["student_phone"];
$student_email = $_POST["student_email"];
$student_program= $_POST["student_program"];
$student_specialization= $_POST["student_specialization"];
$student_joining = $_POST["student_joining"];
$student_graduation= $_POST["student_graduation"];
$student_year= $_POST["student_year"];

$query="select * from first_second_year_student_details where student_rollnno like '".$student_rollnno."';";

$result = mysqli_query($con,$query);
$response=array();

if(mysqli_num_rows($result)>0){
	
	$code="Fail";
		echo "<script type=\"text/javascript\">
alert(\"Student Record Exists\");
window.location = \"enroll_student_form.php\"
</script>";
		
}else{
	$sql="insert into first_second_year_student_details values(DEFAULT,'".$student_rollnno."','".$student_lastname."','".$student_firstname."','".$student_phone."','".$student_email."','".$student_program."','".$student_specialization."','".$student_joining."','".$student_graduation."','".$student_year."');";
	$result = mysqli_query($con,$sql);
// 		if($student_year == 1){
// 	         $sql1="insert into first_year values(DEFAULT,'".$student_rollnno."',DEFAULT,DEFAULT);";
// 	    	 $result = mysqli_query($con,$sql1);
//     	}
		echo "<script type=\"text/javascript\">
alert(\"Student Record added Successfully\");
window.location = \"enroll_student_form.php\"
</script>";
}
	mysqli_close($con);
?>