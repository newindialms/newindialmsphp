<?php
require "init.php";

$coursename = $_POST['coursename'];
$feedback_sent_date = $_POST['feedback_sent_date'];
$faculty_id = $_POST['faculty_id'];

$query= "select feedback_response,feedback_question,feedback_sent_date,feedback_sent_time from submitted_text_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
	$array = explode(',', $row[0]);
	$arrayq = explode(',', $row[1]);
	 foreach (array_combine($array, $arrayq) as $value => $valueq) {
        array_push($response,array("feedback_response"=>$value,"feedback_question"=>$valueq,"feedback_sent_date"=>$row[2],"feedback_sent_time"=>$row[3]));
	}
}
mysqli_close($con);
echo json_encode(array('Textfeedback'=>$response));
?>
mysqli_close($con);
echo json_encode(array('Textfeedback'=>$response));
?>