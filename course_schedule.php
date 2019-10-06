<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New India LMS Admin-Dashbaord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
<style>
.header{
	text-align: center;
	margin-bottom:50px;
	}
	h1.header{
		text-align: center;
	margin-top:50px;
	margin-bottom:50px;
	}
	#showform{
	text-align: center;
	margin-top:50px;
	margin-bottom:50px;
	}
	h1.main-header{
    color: #990000;
    text-align: center;
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
<?php 
require "init.php";
$course_schedule_issue = '1';
$course_schedule_day = 'Fall';
 ?>
<script>
$(document).ready(function() {
    $("#btnSubmit").click(function(){
		<?php 	$course_schedule_issue = $_POST["course_schedule_issue"];
				$course_schedule_day = $_POST["course_schedule_day"]; ?>
	});
</script>
	
<?php 
$query="SELECT course_schedule_id,course_schedule_day,course_schedule_date,course_schedule_program,course_schedule_starttime,course_schedule_endtime,course_schedule_course,course_schedule_faculty,course_schedule_issue from course_schedule_secondyear WHERE (course_schedule_issue ='$course_schedule_issue' AND course_schedule_day='$course_schedule_day');";
$result=mysqli_query($con,$query);
?>
<div class="header">
	<h1 class="main-header"> Course Schedule Time Table -Second year</h1>
	<h2>LMT School of Management, Thapar University, Patiala</h2>
	<h2>MBA Program Time Table </h2>
</div>
 <div class="logoutclass">
            <button id="logout_button">Logout</button>
        </div>
<div class="container bg-info" style="padding-top:20px;padding-bottom:20px;">
	<div class="row">
		<div class="col-sm-4">
			<form role="form" action="insert_course_schedule.php" method="post">
					<div class="form-group">
						<label>Issue</label>
						<input type="text" name="course_schedule_issue" class="form-control" />
					</div>
					<div class="form-group">
						<label>Semester Year</label>
						<select name="course_schedule_issue_semester" size="1">
							<option name="Fall" value="Fall">Fall</option>
							<option name="Summer" value="Summer">Summer</option>
						    <option name="Spring" value="Spring">Spring</option>
						</select>
					</div>
					<div class="form-group">
						<label>Duration</label>
						<input type="text" name="course_schedule_duration" class="form-control" />
					</div>
					<div class="form-group">
						<label>From</label>
						<input type="text" name="course_schedule_from" class="form-control" />
					</div>
					<div class="form-group">
						<label>To</label>
						<input type="text" name="course_schedule_to" class="form-control" />
					</div>
				<button type="submit" class="btn btn-info btn-block">Submit</button>
			</form>
		</div>
		<div class="col-sm-8">
				<form role="form" action="insert_course_schedule_details.php" method="post">
					<div class="form-group">
						<label>Choose Issue</label><select name="course_schedule_issue">
						<?php 
								require "init.php";
								$sql = mysqli_query($con, "SELECT course_schedule_issue FROM course_schedule_secondyear_issue");
								while ($row = $sql->fetch_assoc()){
								echo '<option value="'.$row['course_schedule_issue'].'">' . $row['course_schedule_issue'] . "</option>";
								}
								?>
						</select>
					</div>
					<div class="form-group">
						<label>Choose Day</label>
						<select name="course_schedule_day" size="1">
							<option name="Monday" value="Monday">Monday</option>
							<option name="Tuesday" value="Tuesday">Tuesday</option>
							<option name="Wednesday" value="Wednesday">Wednesday</option>
							<option name="Thursday" value="Thursday">Thursday</option>
							<option name="Friday" value="Friday">Friday</option>
							<option name="Saturday" value="Saturday">Saturday</option>
							<option name="Sunday" value="Sunday">Sunday</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Date</label>
						<input type="text" name="course_schedule_date" class="form-control" />
					</div>
					<div class="form-group">
						<label>Program</label>
						<input type="text" name="course_schedule_program" class="form-control" />
					</div>
					<div class="form-group">
						<label>Start Time</label>
						<input type="text" name="course_schedule_starttime" class="form-control" />
					</div>
					<div class="form-group">
						<label>End Time</label>
						<input type="text" name="course_schedule_endtime" class="form-control" />
					</div>
					<div class="form-group">
						<label>Course</label>
						<input type="text" name="course_schedule_course" class="form-control" />
					</div>
					<div class="form-group">
						<label>Faculty</label>
						<input type="text" name="course_schedule_faculty" class="form-control" />
					</div>
					<button type="submit" class="btn btn-info btn-block">Submit Schedule</button>
				</form>
		</div>
		<hr>
	<div id="showform" class="col-sm-12">	
	
	<h1 class="header">MBA Program Time Table </h1>
		<form role="form" action="course_schedule.php" method="post">
		
		<div class="form-group">
						<label>Choose Issue</label><select name="course_schedule_issue">
						<?php 
								require "init.php";
								$sql = mysqli_query($con, "SELECT course_schedule_issue FROM course_schedule_secondyear_issue");
								while ($row = $sql->fetch_assoc()){
								echo '<option value="'.$row['course_schedule_issue'].'">' . $row['course_schedule_issue'] . "</option>";
								}
								?>
						</select>
					</div>
					<div class="form-group">
						<label>Choose Day</label>
						<select name="course_schedule_day" size="1">
							<option name="Monday" value="Monday">Monday</option>
							<option name="Tuesday" value="Tuesday">Tuesday</option>
							<option name="Wednesday" value="Wednesday">Wednesday</option>
							<option name="Thursday" value="Thursday">Thursday</option>
							<option name="Friday" value="Friday">Friday</option>
							<option name="Saturday" value="Saturday">Saturday</option>
							<option name="Sunday" value="Sunday">Sunday</option>
						</select>
					</div>
				<button type="submit" id="btnSubmit" class="btn btn-info btn-block">Submit Schedule</button>	
		
		<div class="col-sm-12">
			<table class="table">
				<thead>
				<tr>
					
					<th>Day</th>
					<th>Date</th>
					<th>Pogram</th>
					<th>Start Time</th>
					<th>End Time</th>
					<th>Course</th>
					<th>Faculty</th>
					<th>Issue</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				
				<?php
					while($row=mysqli_fetch_array($result)){
				?>
					<tr>
						<td><?php echo $row['course_schedule_day']?></td>
						<td><?php echo $row['course_schedule_date']?></td>
						<td><?php echo $row['course_schedule_program']?></td>
						<td><?php echo $row['course_schedule_starttime']?></td>
						<td><?php echo $row['course_schedule_endtime']?></td>
						<td><?php echo $row['course_schedule_course']?></td>
						<td><?php echo $row['course_schedule_faculty']?></td>
						<td><?php echo $row['course_schedule_issue']?></td>
						
						<td>
						<a href="edit_course_schedule_details.php?id=<?php echo $row['course_schedule_id']; ?>" class="btn btn-success" role="button">Edit</a>
						<a href="delete_course_schedule_details.php?id=<?php echo $row['course_schedule_id']; ?>" class="btn btn-danger" role="button">Delete</a>
						</td>
					</tr>
					<?php 
					}
					mysqli_close($con);
					?>
				</tbody>
			</table>
		
		
		</form>
		</div>
	</div>
	</div>
</div>
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
