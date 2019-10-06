<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New India LMS Admin-Dashbaord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
	
	$('#course_name').change(function()
    {
         var mydropdown=$('#course_name').val();
         $.ajax({
            type: 'POST',
            data: {
                mydropdown:mydropdown,
            },
            success: function(data) {
              $("#hiddendiv").html(mydropdown);
              console.log(mydropdown);
            }
        });
       <?php  $mycal = $_POST["course_name"];
        require "init.php";
        $sql = mysqli_query($con,"SELECT first_year_course_list_code,first_year_course_list_faculty FROM first_year_course_list WHERE first_year_course_list_name ='.$mycal.' ");
        while ($row = $sql->fetch_assoc()){?>
             $('#course_code').val("<?php echo $row['first_year_course_list_code'] ?>"); 
            $('#faculty_code').val("<?php echo $row['first_year_course_list_faculty'] ?>"); 
       <?php } ?>
    });
});

</script>
	
<?php 
$query="SELECT course_schedule_id,course_code,course_name,faculty_code,course_date,course_schedule_day,course_schedule_time,student_group,student_batch,course_classroom,course_schedule_issue from course_schedule_firstyear WHERE (course_schedule_issue ='$course_schedule_issue' AND course_schedule_day='$course_schedule_day');";
$result=mysqli_query($con,$query);
?>
<div type="hidden" id="hiddendiv"></div>
<div class="header">
	<h1 class="main-header"> Course Schedule Time Table - First Year </h1>
	<h2>LMT School of Management, Thapar University, Patiala</h2>
	<h2>MBA Program Time Table - First Year </h2>
</div>
 <div class="logoutclass">
            <button id="logout_button">Logout</button>
        </div>
		
<div class="container bg-info" style="padding-top:20px;padding-bottom:20px;">
	<div class="row">
		<div class="col-sm-4">
			<form role="form" action="insert_course_schedule_firstyear.php" method="post">
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
				<form role="form" action="insert_course_schedule_details_firstyear.php" method="post">
					<div class="form-group">
						<label>Choose Issue</label><select name="course_schedule_issue">
						<?php 
								require "init.php";
								$sql = mysqli_query($con, "SELECT course_schedule_issue FROM course_schedule_firstyear_issue");
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
						<label>Course Name</label>
						<select name="course_name" id="course_name">
						<?php 
								require "init.php";
								$sql = mysqli_query($con, "SELECT first_year_course_list_name FROM first_year_course_list");
								while ($row = $sql->fetch_assoc()){
								echo '<option value="'.$row['first_year_course_list_name'].'">' . $row['first_year_course_list_name'] . "</option>";
								}
								?>
						</select>
					</div>
					<div class="form-group">
						<label>Course Code</label>
						<input type="text" id="course_code" name="course_code" class="form-control" />
					</div>
					<div class="form-group">
						<label>Faculty Code</label>
						<input type="text" id="faculty_code"name="faculty_code" class="form-control" />
					</div>
					<div class="form-group">
						<label>Course Date</label>
						<input type="text" name="course_date" class="form-control" />
					</div>
					<div class="form-group">
						<label>Course Time</label>
						<input type="text" name="course_schedule_time" class="form-control" />
					</div>
					<div class="form-group">
						<label>Student Batch</label>
						<input type="text" name="student_batch" class="form-control" />
					</div>
					<div class="form-group">
						<label>Student Classroom</label>
						<input type="text" name="course_classroom" class="form-control" />
					</div>
				
					<button type="submit" class="btn btn-info btn-block">Submit Schedule</button>
				</form>
		</div>
		<hr>
	<div id="showform" class="col-sm-12">	
	
	<h1 class="header">MBA Program Time Table </h1>
		<form role="form" action="course_schedule_firstyear.php" method="post">
		
		<div class="form-group">
						<label>Choose Issue</label><select name="course_schedule_issue">
						<?php 
								require "init.php";
								$sql = mysqli_query($con, "SELECT course_schedule_issue FROM course_schedule_firstyear_issue");
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
					
					<th>Course Code</th>
					<th>Course Name</th>
					<th>Faculty Code</th>
					<th>Course Date</th>
					<th>Course Day</th>
					<th>Course Time</th>
					<th>Batch</th>
					<th>Classroom</th>
					<th>Issue</th>
				</tr>
				</thead>
				<tbody>
				
				<?php
					while($row=mysqli_fetch_array($result)){
				?>
					<tr>
						<td><?php echo $row['course_code']?></td>
						<td><?php echo $row['course_name']?></td>
						<td><?php echo $row['faculty_code']?></td>
						<td><?php echo $row['course_date']?></td>
						<td><?php echo $row['course_schedule_day']?></td>
						<td><?php echo $row['course_schedule_time']?></td>
						<td><?php echo $row['student_batch']?></td>
						<td><?php echo $row['course_classroom']?></td>
						<td><?php echo $row['course_schedule_issue']?></td>
						
						<td>
						<a href="edit_course_schedule_details_firstyear.php?id=<?php echo $row['course_schedule_id']; ?>" class="btn btn-success" role="button">Edit</a>
						<a href="delete_course_schedule_details_firstyear.php?id=<?php echo $row['course_schedule_id']; ?>" class="btn btn-danger" role="button">Delete</a>
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
