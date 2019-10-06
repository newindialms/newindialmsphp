<!DOCTYPE html>
<html>
<head>
<title>Course Schedule Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
</style>
</head>
<body>
<div class="header">
	<h1> Course Schedule Time Table </h1>
	<h2>LMT School of Management, Thapar University, Patiala</h2>
	<h2>MBA Program Time Table </h2>
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
						<select name="course_schedule_issue">
						<?php 
								require "init.php";
								$sql = mysqli_query($con, "SELECT course_schedule_issue FROM course_schedule_issue");
								while ($row = $sql->fetch_assoc()){
								echo '<option value="'.$row['course_schedule_issue'].'">' . $row['course_schedule_issue'] . "</option>";
								}
								?>
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
		<h1 class="header">MBA Program Time Table </h1>
		<div class="col-sm-12">
			<table class="table">
				<thead>
				<tr>
					<th>Issue</th>
					<th>Day</th>
					<th>Date</th>
					<th>Pogram</th>
					<th>Start Time</th>
					<th>End Time</th>
					<th>Course</th>
					<th>Faculty</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
						<a href="#" class="btn btn-success" role="button">Edit</a>
						<a href="#" class="btn btn-danger" role="button">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		
		</div>
	</div>
</div>

</body>
</html>
