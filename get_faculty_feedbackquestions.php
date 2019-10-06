<?php
require "init.php";

$coursename = $_POST['coursename'];
$feedback_sent_date = $_POST['feedback_sent_date'];
$faculty_id = $_POST['faculty_id'];

$queryl= "select DISTINCT feedback_question from submitted_like_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$queryr= "select DISTINCT feedback_question from submitted_rate_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$querys= "select DISTINCT feedback_question from submitted_smiley_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$resultl = mysqli_query($con,$queryl);
$resultr = mysqli_query($con,$queryr);
$results = mysqli_query($con,$querys);
$response=array();

while($rowl=mysqli_fetch_array($resultl)){
	
	array_push($response,array("feedback_question"=>$rowl[0],"feedback_question_type"=>"like"));
	
}
while($rowr=mysqli_fetch_array($resultr)){
	
	array_push($response,array("feedback_question"=>$rowr[0],"feedback_question_type"=>"rate"));
	
}
while($rows=mysqli_fetch_array($results)){
	
	array_push($response,array("feedback_question"=>$rows[0],"feedback_question_type"=>"smiley"));
	
}
mysqli_close($con);
echo json_encode(array('questions'=>$response));

?>