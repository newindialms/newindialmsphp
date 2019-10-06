<?php
require "init.php";

$attendance_date = $_POST['attendance_date'];
$course_details_name = $_POST['course_details_name'];
$faculty_employeeid = $_POST['faculty_employeeid'];
$groupname = $_POST['groupname'];
$sectionname = $_POST['sectionname'];
$coursetype = $_POST['coursetype'];

if($coursetype==="1"){
    $querya= "SELECT student_rollnno FROM attendace_details_first WHERE(faculty_employeeid ='$faculty_employeeid' AND attendance_date ='$attendance_date' AND course_details_name='$course_details_name' AND attendance_status='Absent' AND group_name='$groupname' AND section_name='$sectionname')";


    $query= "SELECT student_rollnno FROM attendace_details_first WHERE(faculty_employeeid ='$faculty_employeeid' AND attendance_date ='$attendance_date' AND course_details_name='$course_details_name' AND attendance_status='Present' AND group_name='$groupname' AND section_name='$sectionname')";
	
	$queryfeedback= "SELECT student_id FROM attendace_after_feedback WHERE(faculty_id ='$faculty_employeeid' AND course_date ='$attendance_date' AND course_name='$course_details_name') ORDER BY id DESC LIMIT 1";
}
else{
	$querya= "SELECT student_rollnno FROM attendace_details WHERE(faculty_employeeid ='$faculty_employeeid' AND attendance_date ='$attendance_date' AND course_details_name='$course_details_name' AND attendance_status='Absent')";


	$query= "SELECT student_rollnno FROM attendace_details WHERE(faculty_employeeid ='$faculty_employeeid' AND attendance_date ='$attendance_date' AND course_details_name='$course_details_name' AND attendance_status='Present')";
	
	$queryfeedback= "SELECT student_id FROM attendace_after_feedback WHERE(faculty_id ='$faculty_employeeid' AND course_date ='$attendance_date' AND course_name='$course_details_name') ORDER BY id DESC LIMIT 1";

}
$result = mysqli_query($con,$query);
$response=array();

$resulta = mysqli_query($con,$querya);

$resultfeedback = mysqli_query($con,$queryfeedback);

while($rowa=mysqli_fetch_array($resulta)){
        $myarray = array_filter(array_map('trim', explode(',', $rowa[0])));
        asort($myarray);
        $myarray = implode(',', $myarray);
        
	$arraya = explode(',',$myarray);
    	    foreach ($arraya as $valuea) {
        	  	if($valuea!=0){
        	  	      $subquery="SELECT `student_lastname` FROM `student_details` WHERE `student_rollnno`='$valuea' ";
            	     $resultsub = mysqli_query($con,$subquery);
            	       while($row1=mysqli_fetch_array($resultsub)){
                             array_push($response,array("student_firstname"=>$row1[0],"attendance_status"=>'Absent',"student_rollnno"=>$valuea));
            	       }
        	    }
	        }
}

$rowfeedback=mysqli_fetch_array($resultfeedback);
while($row=mysqli_fetch_array($result)){
    
        $myarray = array_filter(array_map('trim', explode(',', $row[0])));
        asort($myarray);
        $myarray = implode(',', $myarray);
		
		$myarrayf = array_filter(array_map('trim', explode(',', $rowfeedback[0])));
        asort($myarrayf);
        $myarrayf = implode(',', $myarrayf);
        
	$array = explode(',',$myarray);
	$arrayf = explode(',',$myarrayf);
	$resultf = array_intersect($array, $arrayf);
	$resultdiff = array_diff($array, $arrayf);
	
	  foreach ($resultf as $value) {
	     $subquery=  "SELECT `student_lastname` FROM `student_details` WHERE `student_rollnno`='$value'";
	     $resultsub = mysqli_query($con,$subquery);
	       while($row1=mysqli_fetch_array($resultsub)){
            array_push($response,array("student_firstname"=>$row1[0],"attendance_status"=>'Present',"student_rollnno"=>$value));
	       }
	}
	foreach ($resultdiff as $value) {
	     $subquery=  "SELECT `student_lastname` FROM `student_details` WHERE `student_rollnno`='$value'";
	     $resultsub = mysqli_query($con,$subquery);
	       while($row1=mysqli_fetch_array($resultsub)){
            array_push($response,array("student_firstname"=>$row1[0],"attendance_status"=>'Feedback Pending',"student_rollnno"=>$value));
	       }
	}
}

mysqli_close($con);
echo json_encode(array('attendancelist'=>$response));
?>