<?php
require "init.php";

$student_coursename = $_POST["student_coursename"];

$firstyearquery="SELECT * FROM `first_year_course_list` WHERE `first_year_course_list_name`='".$student_coursename."';";

$secodyearquery="SELECT * FROM `student_year_table` WHERE FIND_IN_SET('".$student_coursename."',`courses_enrolled`) > 0 ;";

$resultfirst = mysqli_query($con, $firstyearquery); 
$resultsecond = mysqli_query($con, $secodyearquery); 
$response=array();
if(mysqli_num_rows($resultfirst)>0){
$query= "SELECT student_details.student_rollnno, student_details.student_firstname,student_details.student_lastname
FROM student_details
INNER JOIN first_year ON student_details.student_rollnno=first_year.student_rollnno WHERE FIND_IN_SET('".$student_coursename."',`first_year_courses`) > 0 ;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	array_push($response,array("student_firstname"=>$row[1],"student_lastname"=>$row[2],"student_rollnno"=>$row[0]));
}
mysqli_close($con);
echo json_encode(array('studentlist'=>$response));
}
if(mysqli_num_rows($resultsecond)>0){
$query= "SELECT student_details.student_rollnno, student_details.student_firstname,student_details.student_lastname
FROM student_details
INNER JOIN student_year_table ON student_details.student_rollnno=student_year_table.student_rollno WHERE FIND_IN_SET('".$student_coursename."',`courses_enrolled`) > 0 ;";

$result = mysqli_query($con,$query);
$row_cnt = mysqli_num_rows($result);

$query1= "UPDATE course_count SET coursecount_count='".$row_cnt."' WHERE coursecount_name='".$student_coursename."' ; ";

mysqli_query($con,$query1);
$response=array();

while($row=mysqli_fetch_array($result)){
	
	array_push($response,array("student_firstname"=>$row[1],"student_lastname"=>$row[2],"student_rollnno"=>$row[0]));
	
}
mysqli_close($con);
echo json_encode(array('studentlist'=>$response,'rowcount'=>$row_cnt));
}
else{
    echo json_encode(array('studentlist'=>$response));
}

?>
