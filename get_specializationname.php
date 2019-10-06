<?php
require "init.php";

$student_rollnno = $_POST['student_rollnno'];

$queryc= "SELECT DISTINCT course_details_specialization FROM second_year_course_list WHERE course_details_category='Elective' ORDER BY course_details_specialization;";

$querym= "SELECT student_specialization FROM first_second_year_student_details WHERE student_rollnno='$student_rollnno' ORDER BY student_specialization;";

$resultm = mysqli_query($con,$querym);
$resultc = mysqli_query($con,$queryc);

$responsem=array();
$responsec=array();
$result=array();
$response3=array();
    
     while($rowm=mysqli_fetch_array($resultm)){
	       $markm=explode(',', $rowm['student_specialization']);
    	foreach($markm as $outm) {
    	    array_push($responsem,$outm);
    		}
	   }
     // json_encode(array('myspecialization_details'=>$responsem));
	 
    while($rowc=mysqli_fetch_array($resultc)){
	       $mark=explode(',', $rowc['course_details_specialization']);
    	foreach($mark as $out) {
    	    array_push($responsec,$out);
    		}
	   }
     // json_encode(array('commonspecialization_details'=>$responsec));
 
 
 if(count($responsec)>0 && count($responsem)>0)
{
  $new_list=array_diff($responsec,$responsem);
  foreach($new_list as $j)
  {
    array_push($result,$j);
  }

}


mysqli_close($con);
echo json_encode(array('specialization'=>$result));

?>