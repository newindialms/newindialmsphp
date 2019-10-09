<?php
require "init.php";

$student_rollnno = $_POST["student_rollnno"];
$batch_number= $_POST["batch_number"];


$query="select * from first_year_students where student_rollnno like '".$student_rollnno."';";

$result = mysqli_query($con,$query);
$response=array();

if(mysqli_num_rows($result)>0){
	
	$code="Fail";
		echo "<script type=\"text/javascript\">
alert(\"Student Record Exists\");
window.location = \"enroll_student_form.php\"
</script>";
		
}else{
	$sql="insert into first_year_students values(DEFAULT,'".$student_rollnno."',DEFAULT,DEFAULT,DEFAULT,'".$batch_number."');";
	$result = mysqli_query($con,$sql);
		echo "<script type=\"text/javascript\">
alert(\"Student Record added Successfully\");
window.location = \"enroll_firstyear_student_form.php\"
</script>";
}
	mysqli_close($con);
?>