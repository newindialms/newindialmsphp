<?php
require "init.php";
    $url = "https://fcm.googleapis.com/fcm/send";

	$title = $_POST["title"];
    $body = $_POST["message"];
    $faculty_employeeid=$_POST["faculty_employeeid"];
    $course_time = $_POST["course_time"];
    $course_date = $_POST["course_date"];
    $coursetype = $_POST["coursetype"];    
    $groupname = "0";
    $sectionname = $_POST["sectionname"];
    $feedback_course_details = $_POST["feedback_course_details"];

if($coursetype==="1"){
    $query="SELECT student_rollnno from first_year_attendance_details where (`attendance_date`='$course_date' AND `attendance_time`='$course_time' AND `attendance_status`='Present' AND `group_name`='$groupname' AND `section_name`='$sectionname' )";
}
else{
	$query="SELECT student_rollnno from second_year_attendance_details where (`attendance_date`='$course_date' AND `attendance_time`='$course_time' AND `attendance_status`='Present')";
}

$result = mysqli_query($con,$query);
$response=array();

while($row=mysqli_fetch_array($result)){
    $output=$row[0];
     $array = explode(',', $output);
        foreach($array as $value) //loop over values
        {
            echo $value;
			$sql="SELECT token FROM login_success_device_details WHERE typeid='$value'";
			$result=mysqli_query($con,$sql);
           while($row = mysqli_fetch_array($result)) {
					$token=$row['token'];
					
					$serverKey = 'AAAAPC2czeg:APA91bEnxFE1JajAd8chnMqqWDZrpbaRWYqGD-XuXc85ynIg9-S201HSKfwML-V1XvM4BoD-NRS3gMuEQ8tU3Nu7RtefYTCgTD1CE6WMnMG1k6qvr-ZiwcAYlWQWWMdrzc6sSycvHmQY';
					
					$notification = array('title' =>$title , 'text' => $body, 'sound' => 'default', 'badge' => '1','click_action'=>'edu.thapar.MyFeedbackScreen');
        					$data=array('studentid'=>$value, 'course_date'=>$course_date,'feedback_course_details'=>$feedback_course_details,'course_time'=>$course_time,'faculty_employeeid'=>$faculty_employeeid);
					$arrayToSend = array('to' => $token, 'notification' => $notification,'data'=>$data,'priority'=>'high');
					$json = json_encode($arrayToSend);
					$headers = array();
					$headers[] = 'Content-Type: application/json';
					$headers[] = 'Authorization: key='. $serverKey;
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
					//curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
					curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
					curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
					//Send the request
					$response = curl_exec($ch);
					//Close request
					if ($response === FALSE) {
					die('FCM Send Error: ' . curl_error($ch));
					}
					curl_close($ch);
				}
        }
}

mysqli_close($con);

?>