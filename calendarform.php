
<!DOCTYPE html>
<?php 
 include 'init.php';
?> 
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; accept-charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New India LMS Admin-Dashbaord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
     <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
<style>
h1,h3{
text-align:center;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
th{
	text-align:center;
	border: 1px solid #000000;
	padding: 8px;
}
td{
    border: 1px solid #000000;
    text-align: left;
    padding: 8px;

}
input[type=text]{
	width:300px;
	height:30px;
	color:blue;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
#fall_weekend_days,#fall_closing_days,#spring_weekend_days{
height:100px;
}
#calendar_submit{
	background-color:green;
	font-size:30px;
	margin-top:20px;
}
#submit{
text-align: center;
vertical-align: center;

}
h1.main-header{
    color: #990000;
    text-align: center;
    padding:10px;
}
.logoutclass {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
}
#logout_button{
    color: #FFF;
    background-color: #990000;
}

</style>
</head>
<body>
<form id="calendar_form"  action="insertcalendardetails.php" accept-charset="utf-8" method="post">
<h1 class="main-header">Thapar University Derabassi Campus</h1>
<h3>Accademic Calendar <input type="text" name="accademic_calendar" id="accademic_calendar"/></h3>
 <div class="logoutclass">
            <button id="logout_button">Logout</button>
        </div>
		
<table>
  <tr>
    <th>Fall<input type="text" id="fall_year" name="fall_year" size="500"/><br/>(Full Semester Session:<input type="text" id="fall_semester_sesion" name="fall_semester_sesion" size="500"/>)</th>
    <th>Spring<input type="text" id="spring_year" name="spring_year" size="500"/><br/>(Full Semester Session:<input type="text" id="spring_semester_sesion" name="spring_semester_sesion" size="500"/>)</th>
  </tr>
  
  <tr>
    <td><b><u>Registration**</u></b></td>
	<td><b><u>Registration**</u></b></td>
  </tr>
  <tr>
    <td>Semester III…………………………………...<input type="text" id="fall_classes_semester3_registration" name="fall_classes_semester3_registration" size="500"/></td>
	<td>Semester II & IV…………………………………...<input type="text" id="spring_classes_semester24_registration" name="spring_classes_semester24_registration" size="500"/></td>
  </tr>
  <tr>
    <td>Following late Registration fee shall be applicable </td>
	<td>Following late Registration fee shall be applicable </td>
  </tr>
   <tr>
    <td><input type="text" id="fee_fall_sub_1" name="fee_fall_sub_1" size="500"/></td>
	<td><input type="text" id="fee_spring_sub_1"name="fee_spring_sub_1" size="500"/></td>
  </tr>
   <tr>
    <td><input type="text" id="fee_fall_sub_2" name="fee_fall_sub_2" size="500"/></td>
	<td><input type="text" id="fee_spring_sub_2"name="fee_spring_sub_2" size="500"/></td>
  </tr>
  <tr>
    <td><input type="text" id="fee_fall_sub_comment" name="fee_fall_sub_comment" size="500"/></td>
	<td><input type="text" id="fee_spring_sub_comment"name="fee_spring_sub_comment" size="500"/></td>
  </tr>
  <tr>
    <td><b><u>Classes Begin</u></b></td>
	<td><b><u>Classes Begin</u></b></td>
  </tr>
  <tr>
    <td>Semester III…………………………………...<input type="text" id="fall_classes_semester3"name="fall_classes_semester3" size="500"/></td>
	<td>Semester II & IV…………………………………...<input type="text" id="sprig_classes_semester24" name="sprig_classes_semester24" size="500"/></td>
  </tr>
  <tr>
    <td>Semester I (Orientation Program)…………………………………...<input type="text" id="fall_classes_semester2" name="fall_classes_semester2" size="500"/></td>
    <td></td>  
  </tr>
  <tr>
    <td>Semester I…………………………………...<input type="text" id="fall_classes_semester1" name="fall_classes_semester1" size="500"/></td>
    <td></td>
  </tr>
  <tr>
    <td><b><u>1st teaching session</u></b></td>
    <td><b><u>1st teaching session</u></b></td>  
  </tr>
  <tr>
    <td>Semester III…………………………………...<input type="text" id="fall_teaching_semester3" name="fall_teaching_semester3" size="500"/></td>
	<td>Semester II & IV…………………………………...<input type="text" id="spring_teaching_semester24" name="spring_teaching_semester24" size="500"/></td>
  </tr>
 <tr>
    <td>Semester I…………………………………...<input type="text" id="fall_teaching_semester1" name="fall_teaching_semester1" size="500"/></td>
    <td></td>
  </tr>
  
  <tr>
    <td><b><u>Mid/End Semester Test</u></b></td>
    <td><b><u>Mid/End Semester Test</u></b></td>  
  </tr>
  <tr>
    <td>Semester I & III…………………………………...<input type="text" id="fall_midend_semester13" name="fall_midend_semester13" size="500"/></td>
	<td>Semester II & IV…………………………………...<input type="text" id="spring_midend_semester24" name="spring_midend_semester24" size="500"/></td>
  </tr>
  <tr>
    <td><b><u>2nd Teaching session</u></b></td>
    <td><b><u>2nd Teaching session</u></b></td>  
  </tr>
  <tr>
    <td>Semester I & III…………………………………...<input type="text" id="fall_teaching_semestersecond" name="fall_teaching_semestersecond" size="500"/></td>
	<td>Semester II & IV…………………………………...<input type="text" id="spring_teaching_semestersecond" name="spring_teaching_semestersecond" size="500"/></td>
  </tr>
  <tr>
    <td><b><u>Mid-Semester break</u></b></td>
    <td><b><u>End-Semester Test</u></b></td>  
  </tr>
  <tr>
    <td>Semester I & III…………………………………...<input type="text" id="fall_break_semester13" name="fall_break_semester13" size="500"/></td>
	<td>Semester II & IV…………………………………...<input type="text" id="spring_break_semester24" name="spring_break_semester24" size="500"/></td>
  </tr>
  <tr>
    <td><b><u>3rd Teaching session</u></b></td>
    <td><b><u>Weekend teaching Days</u></b></td>  
  </tr>
  <tr>
    <td>Semester I & III…………………………………...<input type="text" id="fall_teaching_semesterthird" name="fall_teaching_semesterthird" size="500"/></td>
	<td><input type="text" id="spring_weekend_days" name="spring_weekend_days" size="1000"/></td>
  </tr>
  <tr>
    <td><b><u>End-Semester Test</u></b></td>
    <td><b><u>Schools & University Closings</u></b></td>  
  </tr>
  <tr>
    <td>Semester I & III…………………………………...<input type="text" id="fallend_break_semester13" name="fallend_break_semester13" size="500"/></td>
	<td><input type="text" id="spring_closing_days" name="spring_closing_days" size="1000"/></td>
  </tr>
   <tr>
    <td><b><u>Weekend teaching Days</u></b></td>
    <td><b><u>Summer Internship</u></b></td>  
  </tr>
  <tr>
    <td><input type="text" id="fall_weekend_days" name="fall_weekend_days" size="1000"/></td>
	<td>MBA Year 1<input type="text" id="internship_days" name="internship_days" size="500"/></td>
  </tr>
   <tr>
    <td><b><u>Schools & University Closings</u></b></td>
    <td><b><u>Summer Semester</u></b></td>  
  </tr>
  <tr>
    <td><input type="text" id="fall_closing_days" name="fall_closing_days" size="1000"/></td>
	<td>Backlog Courses...........<input type="text" id="backlog_dates" name="backlog_dates" size="500"/></td>
  </tr>
   <tr>
    <td><b><u>Winter Break</u></b></td>
    <td><b><u>Summer Break</u></b></td>  
  </tr>
  <tr>
    <td><input type="text" id="fall_winter_break" name="fall_winter_break" size="500"/></td>
	<td><input type="text" id="spring_summer_break" name="spring_summer_break" size="500"/></td>
  </tr>
  <tr>
      <td> <p>Subject to Change:</p> </td>
         <td>Subject1:<input type="text" id="subject1" name="subject1" size="5000"/></td>
  </tr>
  <tr>
      <td> </td>
         <td>Subject2:<input type="text" id="subject2" name="subject2" size="5000"/></td>
  </tr>
   <tr>
      <td> </td>
         <td>Subject3:<input type="text" id="subject3" name="subject3" size="5000"/></td>
  </tr>
   <tr>
      <td> </td>
         <td>Subject4:<input type="text" id="subject4" name="subject4" size="5000"/></td>
  </tr>
  <tr>
      <td> <p>Notes:</p> </td>
         <td>Note1: <input type="text" id="note1" name="note1" size="5000"/></td>
  </tr>
  <tr>
        <td></td>
        <td>Note2: <input type="text" id="note2" name="note2" size="5000"/></td>
  </tr>
</table>
<div id="submit" ><input type="submit" name="calendar_submit" id="calendar_submit" value="submit"/></div>
</form>


 <!--  Script Files -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="  crossorigin="anonymous"></script>
   <script src="js/main.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        firebase.auth().onAuthStateChanged(function(user){
            if(!user){
                window.location.href="index.html";
            }
        });
    
    </script>
</body>
</html>
