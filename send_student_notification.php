<?php
require "init.php";
    $url = "https://fcm.googleapis.com/fcm/send";

	$notification_target="student";
    $title = $_POST["title"];
    $body = $_POST["message"];
    
	$insertsql="insert into notification_details values (DEFAULT,'".$title."','".$body."',CONVERT_TZ(NOW(),'-05:30','+00:00'),'".$notification_target."');";
	mysqli_query($con,$insertsql);

	$sql="SELECT token FROM `login_success_device_details` WHERE `type`='student'";
	$result=mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result)) {
    $token=$row['token'];
	
    $serverKey = 'AAAAPC2czeg:APA91bEnxFE1JajAd8chnMqqWDZrpbaRWYqGD-XuXc85ynIg9-S201HSKfwML-V1XvM4BoD-NRS3gMuEQ8tU3Nu7RtefYTCgTD1CE6WMnMG1k6qvr-ZiwcAYlWQWWMdrzc6sSycvHmQY';
    
    $notification = array('title' =>$title , 'text' => $body, 'sound' => 'default', 'badge' => '1','click_action'=>'edu.thapar.StudentNotification');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
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
?>