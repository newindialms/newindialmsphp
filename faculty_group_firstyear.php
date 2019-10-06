<?php
require "init.php";

$groupname = $_POST["groupname"];
$sectionname = $_POST["sectionname"];
$CCP_Course = $_POST["CCP_Course"];

if($CCP_Course=="1"){
$firstyearquery="SELECT * FROM `first_year_students` WHERE `group_number`='".$groupname."';";
$resultfirst = mysqli_query($con, $firstyearquery); 

if(mysqli_num_rows($resultfirst)>0){
$query= "SELECT first_second_year_student_details.student_rollnno, first_second_year_student_details.student_firstname,first_second_year_student_details.student_lastname
FROM first_second_year_student_details
INNER JOIN first_year_students ON first_second_year_student_details.student_rollnno=first_year_students.student_rollnno WHERE( FIND_IN_SET('".$groupname."',`group_number`) > 0 );";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	array_push($response,array("student_firstname"=>$row[1],"student_lastname"=>$row[2],"student_rollnno"=>$row[0]));
}
mysqli_close($con);
echo json_encode(array('studentlist'=>$response));
}
echo json_encode(array('studentlist'=>$response));
}



else{
$firstyearquery="SELECT * FROM `first_year_students` WHERE `batch_number`='".$sectionname."';";

$resultfirst = mysqli_query($con, $firstyearquery); 

if(mysqli_num_rows($resultfirst)>0){
$query= "SELECT first_second_year_student_details.student_rollnno, first_second_year_student_details.student_firstname,first_second_year_student_details.student_lastname
FROM first_second_year_student_details
INNER JOIN first_year_students ON first_second_year_student_details.student_rollnno=first_year_students.student_rollnno WHERE( FIND_IN_SET('".$sectionname."',`batch_number`) > 0 );";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	array_push($response,array("student_firstname"=>$row[1],"student_lastname"=>$row[2],"student_rollnno"=>$row[0]));
}
mysqli_close($con);
echo json_encode(array('studentlist'=>$response));
}
echo json_encode(array('studentlist'=>$response));
}
?>