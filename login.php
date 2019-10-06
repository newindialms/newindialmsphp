<?php
require "init.php";

    $studentid = $_POST["studentid"];
    $phonenumber = $_POST["phonenumber"];
	$idtype="test";
	$faculty_firstname="test";
	$student_firstname="test";
	$student_year='1';
	$student_specialization='test';
	
	$querydate= "select start_date,end_date from enroll_dates";

        $resultdate = mysqli_query($con,$querydate);
        $responsedate=array();
        
        while($rowdate=mysqli_fetch_array($resultdate)){
        	
        	array_push($responsedate,array("start_date"=>$rowdate[0],"end_date"=>$rowdate[1]));
        	
        }

	$sql="select studentid,phonenumber,idtype from login_check where studentid like '".$studentid."' and phonenumber like '".$phonenumber."';";
	

	$result = mysqli_query($con,$sql);
	$response=array();
	
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_row($result);
		$studentid=$row[0];
		$phonenumber=$row[1];
		$idtype=$row[2];
		$code="login_success";
			if($idtype=="programmanager"){
			    array_push($response,array("code"=>$code,"studentid"=>$studentid,"phonenumber"=>$phonenumber,"idtype"=>$idtype));
			}
	    	else if($idtype=="FacultyStaff"){
		    	$sql="select faculty_employeeid,faculty_firstname from faculty_details where faculty_employeeid like '".$studentid."' and faculty_phone like '".$phonenumber."';";
		    	$result = mysqli_query($con,$sql);
		    	if(mysqli_num_rows($result)>0){
		    	    $row=mysqli_fetch_row($result);
		    	    	$faculty_employeeid=$row[0];
	                	$faculty_firstname=$row[1];
		    	    array_push($response,array("code"=>$code,"faculty_employeeid"=>$faculty_employeeid,"faculty_firstname"=>$faculty_firstname,"idtype"=>$idtype));
		    	}
	    	}
		else if($idtype=="student"){
		    	$sql1="select student_rollnno,student_firstname,student_lastname,student_year,student_specialization from first_second_year_student_details where student_rollnno like '".$studentid."' and student_phone like '".$phonenumber."';";
		    	$result1 = mysqli_query($con,$sql1);
		    	
		    	if(mysqli_num_rows($result1)>0){
		    	        $row1=mysqli_fetch_row($result1);
		    	    	$student_rollnno=$row1[0];
	                	$student_firstname=$row1[1];
	                	$student_lastname=$row1[2];
	                	$student_year=$row1[3];
	                	$student_specialization=$row1[4];
		    	    array_push($response,array("code"=>$code,"student_rollnno"=>$student_rollnno,"student_firstname"=>$student_firstname,"student_lastname"=>$student_lastname,"idtype"=>$idtype,"student_year"=>$student_year,"student_specialization"=>$student_specialization));
		    	}
		}
	echo json_encode(array_merge($response,$responsedate));
	}
	else{
		$code="login_failed";
		$message="Unable to login, check your credentials";
		array_push($response,array("code"=>$code,"message"=>$message));
		echo json_encode($response);
	}
	mysqli_close($con);
?>