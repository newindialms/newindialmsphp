<?php 
	
	//Importing dbdetails file 
	require_once 'dbDetails.php';
	
	//connection to database 
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
	
	//sql query to fetch all images 
	$sql = "SELECT * FROM studentprofile_image";
	
	//getting images 
	$result = mysqli_query($con,$sql);
	
	//response array 
	$response = array(); 
	$response['error'] = false; 
	$response['images'] = array(); 
	
	//traversing through all the rows 
	while($row = mysqli_fetch_array($result)){
		$temp = array(); 
		$temp['id']=$row['id'];
		$temp['student_rollnno']=$row['student_rollnno'];
		$temp['url']=$row['url'];
		array_push($response['images'],$temp);
	}
	//displaying the response 
	echo json_encode($response);