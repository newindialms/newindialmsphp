<?php 
	//Constants for our API
	//this is applicable only when you are using Cheap SMS Bazaar
	define('SMSUSER','thaparint');
	define('PASSWORD','SXQuClIy');
	
	
	//This function will send the otp 
	function sendOtp($otp, $phone){
		//This is the sms text that will be sent via sms 
		$sms_content = "Welcome to New India LMS App: Your verification code is $otp";
		
		//Encoding the text in url format
		$sms_text = urlencode($sms_content);

    	//This is the Actual API URL concatnated with required values 
	    $api_url = 'http://sms6.routesms.com:8080/bulksms/bulksms?username=thaparotp&password=m2mLc10i&type=0&dlr=1&destination='.$phone.'&source=MBATSM&message='.$sms_text.'';

		//Envoking the API url and getting the response 
		$response = file_get_contents( $api_url);
		
		//Returning the response 
		return json_encode($response);
	}
	
	
	//If a post request comes to this script 
	if($_SERVER['REQUEST_METHOD']=='POST'){	
		//getting username password and phone number 
		 $studentid = $_POST["studentid"];
        $phonenumber = $_POST["phonenumber"];
         $emailaddress = $_POST["emailaddress"];
         $password = $_POST["password"];
	    $idtype = $_POST["idtype"];
		
		//Generating a 6 Digits OTP or verification code 
		$otp = rand(100000, 999999);
		
		//Importing the db connection script 
	    require "init.php";
	    
	    //check if record exist
	   	$existsql = "select phonenumber from registration WHERE studentid ='$studentid'";
	   	$result = mysqli_query($con,$existsql);
	   //	echo mysqli_num_rows($result);
	   	
	   	if(mysqli_num_rows($result)>0){
	   	 
	   	    	$sql = "UPDATE registration SET otp='$otp' WHERE studentid ='$studentid';";
	   	    	if(mysqli_query($con,$sql)){
			        //printing the response given by sendOtp function by passing the otp and phone number 
                    echo sendOtp($otp,$phonenumber);
        		}else{
        			//printing the failure message in json 
        			echo '{"ErrorMessage":"Failure"}';
        		}
	   	}
		else{
        		  //Creating an SQL Query 
        		$sql = "INSERT INTO registration (studentid, phonenumber, emailaddress, password,idtype,otp) values ('$studentid','$phonenumber','$emailaddress','$password','$idtype','$otp')";
        		
        		//If the query executed on the db successfully 
        		if(mysqli_query($con,$sql)){
        			//printing the response given by sendOtp function by passing the otp and phone number 
                    echo sendOtp($otp,$phonenumber);
        		}else{
        			//printing the failure message in json 
        			echo '{"ErrorMessage":"Failure"}';
        		}
		
		}
	
		//Closing the database connection 
		mysqli_close($con);
	}