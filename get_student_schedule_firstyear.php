

<?php
require "init.php";

$studentid = $_POST['studentid'];
$datevalue = $_POST['datevalue'];
$datevalue=date('d-m-Y', strtotime($datevalue));

$querymain= "SELECT group_number,batch_number from first_year WHERE student_rollnno ='$studentid';";

$resultmain = mysqli_query($con,$querymain);

while($rowmain=mysqli_fetch_assoc($resultmain)){
	$query= "SELECT course_code,course_name,faculty_code,course_schedule_time,course_classroom from course_schedule_firstyear WHERE (student_group =$rowmain[group_number] AND student_batch =$rowmain[batch_number] AND course_date ='$datevalue' );";
	
	$result = mysqli_query($con,$query);
	$response=array();
		while($row = mysqli_fetch_array($result)){
	
	array_push($response,array("course_code"=>$row[0],"course_name"=>$row[1],"faculty_code"=>$row[2],"course_schedule_time"=>$row[3],"course_classroom"=>$row[4]));
		}
}
mysqli_close($con);
echo json_encode(array('schedulelist'=>$response));
?>