<?php
require "init.php";

$student_rollnno = $_POST['student_rollnno'];

$sql="select student_specialization from student_details WHERE student_rollnno ='$student_rollnno'";

$result = mysqli_query($con,$sql);
$response=array();
$response1=array();
$responsecode=array();
$responsess=array();

while($row=mysqli_fetch_array($result)){
    $output=$row[0];
        $myarray = array_filter(array_map('trim', explode(',', $output)));
        asort($myarray);
        $myarray = implode(',', $myarray);
        
    
     $array = explode(',',$myarray);
        foreach($array as $value) //loop over values
        {
	$query= "SELECT course_details_name,course_details_code,course_details_credits,course_details_faculty FROM course_details WHERE course_details_specialization ='$value' ORDER BY course_details_name ";

        $result1 = mysqli_query($con,$query);
        
            while($row1=mysqli_fetch_array($result1)){
            	
            	array_push($response1,$row1[0]);
            	
            }
         $response=$response1;
        }
        
        
        $query= "SELECT courses_enrolled  FROM student_year_table WHERE student_rollno ='$student_rollnno'";
    	$result = mysqli_query($con,$query);
        $responsem=array();
        $myresult=array();
        while($rows = mysqli_fetch_array($result)){
            
            $myarray = array_filter(array_map('trim', explode(',', $rows['courses_enrolled'])));
            asort($myarray);
            $myarray = implode(',', $myarray);
            
        	$mark=explode(',', $rows['courses_enrolled']);
        	foreach($mark as $out) {
        	    array_push($responsem,$out);
        		}
        }
  
         if(count($responsem)>0 && count($response)>0)
            {
              $new_list=array_diff($response,$responsem);
              foreach($new_list as $j)
              {
                array_push($myresult,$j);
              }
            
            }
        
           foreach($myresult as $value) //loop over values
                {
            	$querycode= "SELECT DISTINCT course_details_name,course_details_code,course_details_credits,course_details_faculty FROM course_details WHERE course_details_name ='$value'";
            
                    $resultcode = mysqli_query($con,$querycode);
                    
                        while($rowcode=mysqli_fetch_array($resultcode)){
                        	
                        	array_push($responsecode,array("course_details_name"=>$rowcode[0],"course_details_code"=>$rowcode[1],"course_details_credits"=>$rowcode[2],"course_details_faculty"=>$rowcode[3]));
                        	
                        }
                     $responsess=$responsecode;
                }
        echo json_encode(array('course_details'=>$responsecode));
}
mysqli_close($con);

?>
