<?php
require "init.php";

$student_specialization = $_POST['student_specialization'];
$studentid = $_POST['studentid'];
$datevalue = $_POST['datevalue'];
$datevalue=date('d-m-Y', strtotime($datevalue));

$sql="select courses_enrolled from student_year_table WHERE student_rollno ='$studentid'";
$result = mysqli_query($con,$sql);
$response1=array();
while($row1=mysqli_fetch_array($result)){
    $output=$row1[0];
     $array = explode(',', $output);
        foreach($array as $value) //loop over values
        {
            $query= "SELECT course_schedule_program,course_schedule_starttime,course_schedule_endtime,course_schedule_course,course_schedule_faculty FROM course_schedule WHERE(course_schedule_date ='$datevalue')";
             $queryc= "SELECT course_details_abbr FROM course_details WHERE(course_details_name ='$value')";
            
            $result = mysqli_query($con,$query);
            $resultc = mysqli_query($con,$queryc);
            $rowc=mysqli_fetch_array($resultc);
            $response=array();
            
            while($row=mysqli_fetch_array($result)){
                if($row[3]===$rowc[0]){
            	array_push($response1,array("course_schedule_program"=>$row[0],"course_schedule_starttime"=>$row[1],"course_schedule_endtime"=>$row[2],"course_schedule_course"=>$row[3],"course_schedule_faculty"=>$row[4]));
                }
            	
            }
            $response=$response1;
        }
        echo json_encode(array('schedulelist'=>$response));
}
            mysqli_close($con);
            
?>