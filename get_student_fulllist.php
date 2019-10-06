<?php
require "init.php";

$student_coursename = $_POST["student_coursename"];

$firstyearquery="SELECT * FROM `first_year_course_list` WHERE `first_year_course_list_name`='".$student_coursename."';";

$secodyearquery="SELECT * FROM `second_year_students` WHERE FIND_IN_SET('".$student_coursename."',`courses_enrolled`) > 0 ;";

$resultfirst = mysqli_query($con, $firstyearquery); 
$resultsecond = mysqli_query($con, $secodyearquery); 
$response=array();
if(mysqli_num_rows($resultfirst)>0){
$query= "SELECT first_second_year_student_details.student_rollnno, first_second_year_student_details.student_firstname,first_second_year_student_details.student_lastname
FROM first_second_year_student_details
INNER JOIN first_year_students ON first_second_year_student_details.student_rollnno=first_year_students.student_rollnno WHERE FIND_IN_SET('".$student_coursename."',`first_year_courses`) > 0 ;";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	array_push($response,array("student_firstname"=>$row[1],"student_lastname"=>$row[2],"student_rollnno"=>$row[0]));
}
mysqli_close($con);
echo json_encode(array('studentlist'=>$response));
}
if(mysqli_num_rows($resultsecond)>0){
$query= "SELECT first_second_year_student_details.student_rollnno, first_second_year_student_details.student_firstname,first_second_year_student_details.student_lastname
FROM first_second_year_student_details
INNER JOIN second_year_students ON first_second_year_student_details.student_rollnno=second_year_students.student_rollno WHERE FIND_IN_SET('".$student_coursename."',`courses_enrolled`) > 0 ;";

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
