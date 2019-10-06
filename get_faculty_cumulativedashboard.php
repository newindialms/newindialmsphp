<?php
require "init.php";

$coursename = $_POST['coursename'];
$feedback_sent_date = $_POST['feedback_sent_date'];
$faculty_id = $_POST['faculty_id'];
$question = $_POST['question'];
$type = $_POST['type'];


/* Find Median */
function Median(&$medianr){
     sort($medianr, SORT_NUMERIC);
       $count = count($medianr);
       $mid = floor($count/2);
       
       if (($count % 2) == 0) {
          $medianval=($medianr[$mid--] + $medianr[$mid])/2;	
       }
       else{
        $medianval=$medianr[$mid];
       }
       return $medianval;
}

/* Find Average */
function Averageval(&$feedback,&$feedbackcount){
    $feedbackavg=$feedback/$feedbackcount;
	  $feedackpercentage=($feedback*100)/($feedbackcount*5);
	  $whole = floor($feedbackavg);      
      $fraction = $feedbackavg - $whole; 
      
      if($fraction>.5){
         $feedbackavg=ceil($feedbackavg);
      }
       if($fraction<.5){
         $feedbackavg=floor($feedbackavg);
      }
       if($fraction=.5){
         $feedbackavg=number_format((float)$feedbackavg, 1, '.', '');
      }
      return $feedbackavg;
}


if($type==="rate"){
$response=array();
$medianr=array();
$feedback=0;
$feedbackavg=0;
$feedbackcount=0;
$feedackpercentage=0;
	$queryr= "select feedback_response from submitted_rate_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."'AND feedback_question like '".$question."');";
	
	$resultr= mysqli_query($con,$queryr);
	
	while($rowr=mysqli_fetch_array($resultr)){
		$array = explode(',', $rowr[0]);
		$feedbackcount+=count($array);
            	   foreach ($array as $value) {
                        array_push($medianr,$value);
                        $feedback+=$value;
                	    }
                       $medianval=Median($medianr);
                	   $feedbackavg=Averageval($feedback,$feedbackcount);
            	   }
	array_push($response,array("feedback_average"=>$feedbackavg,"feedback_median"=>$medianval));
}

if($type==="smiley"){
$response=array();
$medians=array();
$feedback=0;
$feedbackavg=0;
$feedbackcount=0;
$feedackpercentage=0;
	$querys= "select feedback_response from submitted_smiley_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."'AND feedback_question like '".$question."');";
	
	$results= mysqli_query($con,$querys);
	
	while($rows=mysqli_fetch_array($results)){
		$array = explode(',', $rows[0]);
		$feedbackcount+=count($array);
            	   foreach ($array as $value) {
                        array_push($medians,$value);
                        $feedback+=$value;
                	    }
                       $medianval=Median($medians);
                	   $feedbackavg=Averageval($feedback,$feedbackcount);
            	   }
	array_push($response,array("feedback_average"=>$feedbackavg,"feedback_median"=>$medianval));
}
if($type==="like"){
$response=array();
$medians=array();
$feedback=0;
$feedbackavg=0;
$feedbackcount=0;
$feedackpercentage=0;
	$querys= "select feedback_response from submitted_like_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."'AND feedback_question like '".$question."');";
	
	$results= mysqli_query($con,$querys);
	
	while($rows=mysqli_fetch_array($results)){
		$array = explode(',', $rows[0]);
		$feedbackcount+=count($array);
            	   foreach ($array as $value) {
            	        if($value=="Like"){
                            $value=1;
                        }else{
                            $value=0;
                        }
                        array_push($medians,$value);
                       
                        $feedback+=$value;
                	    }
                       $feedackpercentage=($feedback*100)/($feedbackcount*1);
                	  
            	   }
	array_push($response,array("feedback_average"=>number_format((float)$feedackpercentage, 2, '.', ''),"feedback_median"=>""));
}

mysqli_close($con);
echo json_encode(array('response'=>$response));
?>