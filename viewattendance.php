<?php

require "init.php";

$sql1="SELECT first_second_year_student_details.student_rollnno FROM first_second_year_student_details INNER JOIN second_year_students ON student_details.student_rollnno=second_year_students.student_rollno WHERE FIND_IN_SET('Project Management',`courses_enrolled`) > 0";"

$sql2="SELECT second_year_attendance_details.student_rollnno FROM second_year_attendance_details WHERE (attendance_date = '18-11-17' AND course_details_name='Project Management')";"

$result1 = mysqli_query($con,$sql1);
$result2 = mysqli_query($con,$sql2);

$data = array(); // create a variable to hold the information
while (($row = mysql_fetch_array($result2, MYSQL_ASSOC)) !== false){
  $data[] = $row; // add the row in to the results (data) array
}

if (!in_array($row['student_rollnno'], $data)){
	echo "persent";
}
else{
	echo "absent";
}
?>