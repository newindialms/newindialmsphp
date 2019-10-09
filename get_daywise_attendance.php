<?php
require "init.php";

$student_rollnno = $_POST['student_rollnno'];
$course_details_name = $_POST['course_details_name'];
$studentyear = $_POST['studentyear'];

$querysection= "SELECT batch_number FROM first_year_students WHERE student_rollnno='$student_rollnno'";
      $resultsection = mysqli_query($con,$querysection);
      $sectionval= mysqli_fetch_array($resultsection);

$response=array();
if($studentyear==="1"){
     $queryfeedback= "SELECT student_id,course_date,course_time FROM attendace_after_feedback WHERE course_name='$course_details_name'";
      $resultfeedback = mysqli_query($con,$queryfeedback);

        while($row=mysqli_fetch_array($resultfeedback)){
           	$queryattendance= "SELECT student_rollnno FROM first_year_attendance_details WHERE (attendance_date='$row[1]' AND attendance_time='$row[2]'AND attendance_status='Present' AND section_name='$sectionval[batch_number]')";
        $resultattendancek = mysqli_query($con,$queryattendance);
        	while($rowa=mysqli_fetch_array($resultattendancek)){
        	    	$myarray1 = array_filter(array_map('trim', explode(',', $rowa[0])));
                	$myarray2 = array_filter(array_map('trim', explode(',', $row[0])));
        	       	 if (in_array($student_rollnno, $myarray1) && (!in_array($student_rollnno, $myarray2)))
                      {
                       array_push($response,array("attendance_date"=>$row[1],"attendance_status"=>"Feedback Pending","attendance_time"=>$row[2],"attendance_day"=>(date('D', strtotime($row[1])))));
                      }

                    if (in_array($student_rollnno, $myarray1) && (in_array($student_rollnno, $myarray2)))
                      {
                       array_push($response,array("attendance_date"=>$row[1],"attendance_status"=>"Present","attendance_time"=>$row[2],"attendance_day"=>(date('D', strtotime($row[1])))));
                      }
                  if (!in_array($student_rollnno, $myarray1) && (!in_array($student_rollnno, $myarray2)))
                  {
                   array_push($response,array("attendance_date"=>$row[1],"attendance_status"=>"Absent","attendance_time"=>$row[2],"attendance_day"=>(date('D', strtotime($row[1])))));
                  }
        	}
        }
}
else{
        $queryfeedback= "SELECT student_id,course_date,course_time FROM attendace_after_feedback WHERE course_name='$course_details_name'";

        $resultfeedback = mysqli_query($con,$queryfeedback);

        while($row=mysqli_fetch_array($resultfeedback)){
        	$queryattendance= "SELECT student_rollnno FROM second_year_attendance_details WHERE (attendance_date='$row[1]' AND attendance_time='$row[2]'AND attendance_status='Present')";
        	$resultattendancek = mysqli_query($con,$queryattendance);
        	while($rowa=mysqli_fetch_array($resultattendancek)){
        	    	$myarray1 = array_filter(array_map('trim', explode(',', $rowa[0])));
                	$myarray2 = array_filter(array_map('trim', explode(',', $row[0])));
        	       	 if (in_array($student_rollnno, $myarray1) && (!in_array($student_rollnno, $myarray2)))
                      {
                       array_push($response,array("attendance_date"=>$row[1],"attendance_status"=>"Feedback Pending","attendance_time"=>$row[2],"attendance_day"=>(date('D', strtotime($row[1])))));
                      }
        
                    if (in_array($student_rollnno, $myarray1) && (in_array($student_rollnno, $myarray2)))
                      {
                       array_push($response,array("attendance_date"=>$row[1],"attendance_status"=>"Present","attendance_time"=>$row[2],"attendance_day"=>(date('D', strtotime($row[1])))));
                      }
                  if (!in_array($student_rollnno, $myarray1) && (!in_array($student_rollnno, $myarray2)))
                  {
                   array_push($response,array("attendance_date"=>$row[1],"attendance_status"=>"Absent","attendance_time"=>$row[2],"attendance_day"=>(date('D', strtotime($row[1])))));
                  }
        	}
        }
}
mysqli_close($con);
echo json_encode(array('DayWiseattendancelist'=>$response));
?>