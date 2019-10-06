<?php
require "init.php";

$accademic_calendar= $_POST["accademic_calendar"];
$fall_year = $_POST["fall_year"];
$fall_semester_sesion= $_POST["fall_semester_sesion"];
$spring_year = $_POST["spring_year"];
$spring_semester_sesion= $_POST["spring_semester_sesion"];

$fall_classes_semester3_registration= $_POST["fall_classes_semester3_registration"];
$spring_classes_semester24_registration= $_POST["spring_classes_semester24_registration"];
$fee_fall_sub_1= $_POST["fee_fall_sub_1"];
$fee_spring_sub_1= $_POST["fee_spring_sub_1"];
$fee_fall_sub_2= $_POST["fee_fall_sub_2"];
$fee_spring_sub_2= $_POST["fee_spring_sub_2"];
$fee_fall_sub_comment= $_POST["fee_fall_sub_comment"];
$fee_spring_sub_comment= $_POST["fee_spring_sub_comment"];

$fall_classes_semester3 = $_POST["fall_classes_semester3"];
$sprig_classes_semester24= $_POST["sprig_classes_semester24"];
$fall_classes_semester2= $_POST["fall_classes_semester2"];
$fall_classes_semester1 = $_POST["fall_classes_semester1"];
$fall_teaching_semester3= $_POST["fall_teaching_semester3"];
$spring_teaching_semester24 = $_POST["spring_teaching_semester24"];
$fall_teaching_semester1= $_POST["fall_teaching_semester1"];
$fall_midend_semester13 = $_POST["fall_midend_semester13"];
$spring_midend_semester24= $_POST["spring_midend_semester24"];
$fall_teaching_semestersecond = $_POST["fall_teaching_semestersecond"];
$spring_teaching_semestersecond= $_POST["spring_teaching_semestersecond"];
$fall_break_semester13= $_POST["fall_break_semester13"];
$spring_break_semester24 = $_POST["spring_break_semester24"];
$fall_teaching_semesterthird= $_POST["fall_teaching_semesterthird"];
$spring_weekend_days = $_POST["spring_weekend_days"];
$fallend_break_semester13= $_POST["fallend_break_semester13"];
$spring_closing_days= $_POST["spring_closing_days"];
$fall_weekend_days = $_POST["fall_weekend_days"];
$internship_days = $_POST["internship_days"];
$fall_closing_days= $_POST["fall_closing_days"];
$backlog_dates = $_POST["backlog_dates"];
$fall_winter_break= $_POST["fall_winter_break"];
$spring_summer_break= $_POST["spring_summer_break"];
$subject1= $_POST["subject1"];
$subject2= $_POST["subject2"];
$subject3= $_POST["subject3"];
$subject4= $_POST["subject4"];
$note1= $_POST["note1"];
$note2= $_POST["note2"];



$query="select * from calendar_details where accademic_calendar like '".$accademic_calendar."';";

$result = mysqli_query($con,$query);
$response=array();


$sql="insert into calendar_details values(DEFAULT,'".$accademic_calendar."','".$fall_year."','".$fall_semester_sesion."','".$spring_year."','".$spring_semester_sesion."','".$fall_classes_semester3_registration."','".$spring_classes_semester24_registration."','".$fee_fall_sub_1."','".$fee_spring_sub_1."','".$fee_fall_sub_2."','".$fee_spring_sub_2."','".$fee_fall_sub_comment."','".$fee_spring_sub_comment."','".$fall_classes_semester3."','".$sprig_classes_semester24."','".$fall_classes_semester2."','".$fall_classes_semester1."','".$fall_teaching_semester3."','".$spring_teaching_semester24."','".$fall_teaching_semester1."','".$fall_midend_semester13."','".$spring_midend_semester24."','".$fall_teaching_semestersecond."','".$spring_teaching_semestersecond."','".$fall_break_semester13."','".$spring_break_semester24."','".$fall_teaching_semesterthird."','".$spring_weekend_days."','".$fallend_break_semester13."','".$spring_closing_days."','".$fall_weekend_days."','".$internship_days."','".$fall_closing_days."','".$backlog_dates."','".$fall_winter_break."','".$spring_summer_break."','".$subject1."','".$subject2."','".$subject3."','".$subject4."','".$note1."','".$note2."');";
$result = mysqli_query($con,$sql);
		echo "<script type=\"text/javascript\">
alert(\"Record added Successfully\");
window.location = \"calendarform.php\"
</script>";

	mysqli_close($con);
?>