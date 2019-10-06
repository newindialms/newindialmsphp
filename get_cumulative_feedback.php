<?php
require "init.php";

$coursename = $_POST['coursename'];
$feedback_sent_date = $_POST['feedback_sent_date'];
$faculty_id = $_POST['faculty_id'];

$queryl= "select feedback_response,feedback_question,feedback_sent_date,feedback_sent_time from submitted_like_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$queryll= "select feedback_response where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$queryr= "select feedback_response,feedback_question from submitted_rate_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$queryrr= "select feedback_response from submitted_rate_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";


$querys= "select feedback_response,feedback_question,feedback_sent_date,feedback_sent_time from submitted_smiley_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$queryss= "select feedback_response from submitted_smiley_feedback where (coursename like '".$coursename."'AND feedback_sent_date like '".$feedback_sent_date."'AND faculty_id like '".$faculty_id."');";

$resultl= mysqli_query($con,$queryl);
$resultll= mysqli_query($con,$queryll);
$responsel=array();
$feedback=0;
$medianr=array();
$feedbackavg=0;
$feedbackcount=0;
$feedackpercentage=0;



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





$resultr= mysqli_query($con,$queryr);
$resultrr= mysqli_query($con,$queryrr);
$responser=array();
$medianr=array();
$feedback=0;
$feedbackavg=0;
$feedbackcount=0;
$feedackpercentage=0;

while($rowr=mysqli_fetch_array($resultr)){
	$array = explode(',', $rowr[0]);
	$arrayq = explode(',', $rowr[1]);
	 foreach ($arrayq as $valueq) {
	     
	     echo $valueq;
	     
	     
            	$feedbackcount+=count($array);
            	   foreach ($array as $value) {
                        array_push($medianr,$value);
                        $feedback+=$value;
                	    }
                       $medianval=Median($medianr);
                	   $feedbackavg=Averageval($feedback,$feedbackcount);
            	   }
}
array_push($responser,array("feedback_average"=>$feedbackavg,"feedback_question"=>$arrayq,"feedback_median"=>$medianval));


$results = mysqli_query($con,$querys);
$resultss= mysqli_query($con,$queryss);
$responses=array();
$feedback=0;
$feedbackavg=0;
$medianr=array();
$feedbackcount=0;

mysqli_close($con);

echo json_encode(array('likefeedback'=>$responsel));
?>