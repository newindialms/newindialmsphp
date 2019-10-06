 <?php

if($_SERVER['REQUEST_METHOD']=='POST'){

include 'init.php';

 $studentid= $_POST['studentid'];

// Create connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT a.student_firstname,a.student_lastname,a.student_rollnno,a.student_email,a.student_program,a.student_specialization,b.url FROM first_second_year_student_details a,studentprofile_image b WHERE (b.name ='$studentid' AND a.student_rollnno ='$studentid');";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode(array(end($tem)));
 
 }
 
} else {
 $sql1 = "SELECT a.student_firstname,a.student_lastname,a.student_rollnno,a.student_email,a.student_program,a.student_specialization FROM first_second_year_student_details a WHERE a.student_rollnno ='$studentid';";
 
 $result1 = $conn->query($sql1);
	while($row1[] = $result1->fetch_assoc()) {
 
	$tem1 = $row1;
 
	$json = json_encode(array(end($tem1)));
 
 }
}
echo $json;
$conn->close();
}
?>