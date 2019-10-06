<?php
require "init.php";

$faculty_employeeid = $_POST['faculty_employeeid'];
$datevalue = $_POST['datevalue'];
$datevalue=date('d-m-Y', strtotime($datevalue));
	
$querys= "SELECT course_schedule_starttime,course_schedule_endtime,course_schedule_program,course_schedule_course FROM course_schedule_secondyear WHERE (course_schedule_faculty=(SELECT faculty_code from faculty_details WHERE faculty_employeeid='$faculty_employeeid')AND course_schedule_date='$datevalue')";

$queryf= "SELECT course_schedule_time,course_name,course_code,course_classroom,faculty_code FROM course_schedule_firstyear WHERE course_date='$datevalue' ";

$queryfac= "select faculty_code from faculty_details where faculty_employeeid='".$faculty_employeeid."';";
$resultfac = mysqli_query($con,$queryfac);

$results = mysqli_query($con,$querys);
$resultf = mysqli_query($con,$queryf);
$response=array();


$rowfac=mysqli_fetch_array($resultfac);
while($rowf=mysqli_fetch_array($resultf)){
                $array = explode('/', $rowf[4]);
        	    foreach($array as $values){
        	        if($values===$rowfac[0]){
        	        	array_push($response,array("course_schedule_starttime"=>$rowf[0],"course_schedule_endtime"=>$rowf[2],"course_schedule_course"=>$rowf[3],"course_schedule_program"=>$rowf[1]));
        	        }
        	    }
}
while($rows=mysqli_fetch_array($results)){
    	array_push($response,array("course_schedule_program"=>$rows[2],"course_schedule_starttime"=>$rows[1],"course_schedule_endtime"=>$rows[0],"course_schedule_course"=>$rows[3]));
}

mysqli_close($con);
echo json_encode(array('schedulelist'=>$response));
?>