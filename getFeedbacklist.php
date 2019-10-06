<?php
require "init.php";
	
$course_name = $_POST["course_name"];
$course_date = $_POST["course_date"];
$course_time = $_POST["course_time"];

$sql="select feedback_id from selected_feedback WHERE(course_details like '".$course_name."' AND course_date like '".$course_date."'AND course_time like '".$course_time."');";

$result = mysqli_query($con,$sql);
$response=array();
while($row=mysqli_fetch_array($result)){
    $output=$row[0];
     $array = explode(',', $output);
        foreach($array as $value) //loop over values
        {
            //echo $value;
			$query="SELECT feedback_title,feedback_question,feedback_type FROM feedback_questions WHERE id='$value'";
			
			$result1=mysqli_query($con,$query);
           while($row1 = mysqli_fetch_array($result1)) {
               array_push($response,array("feedback_title"=>$row1['feedback_title'],"feedback_question"=>$row1['feedback_question'],"feedback_type"=>$row1['feedback_type']));
              
           }
        }
}

mysqli_close($con);
echo json_encode(array('feedback'=>$response));
?>