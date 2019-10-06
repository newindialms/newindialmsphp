<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New India LMS Admin-Dashbaord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
$course_schedule_id=$_GET['id'];
require "init.php";

$query="SELECT * from course_schedule WHERE course_schedule_id='$course_schedule_id'";
$result=mysqli_query($con,$query);
?>

<div class="container bg-info" style="padding-top:20px;padding-bottom:20px;">
<h1 class="main-header"> Edit MBA Program Time Table </h1>
<div class="logoutclass">
            <button id="logout_button">Logout</button>
        </div>
		<form role="form" action="update_course_schedule_details.php" method="get">
		<?php
		while($row=mysqli_fetch_assoc($result)){
			?>
			<input type="hidden" value="<?php echo $row['course_schedule_id'];?>" name="course_schedule_id" class="form-control" />
					<div class="form-group"action="update_course_schedule_details.php" method="post">
						<label>Choose Issue</label><select name="course_schedule_issue">
						<?php 
								require "init.php";
							
								echo '<option value="'.$row['course_schedule_issue'].'">' . $row['course_schedule_issue'] . "</option>";
							
								?>
						</select>
					</div>
					<div class="form-group">
						<label>Choose Day</label>
						<select name="course_schedule_day" size="1">
						    	<?php 
								require "init.php";
							
								echo '<option value="'.$row['course_schedule_day'].'">' . $row['course_schedule_day'] . "</option>";
							
								?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Date</label>
						<input type="text" value="<?php echo $row['course_schedule_date'];?>" name="course_schedule_date" class="form-control" />
					</div>
					<div class="form-group">
						<label>Program</label>
						<input type="text" value="<?php echo $row['course_schedule_program'];?>" name="course_schedule_program" class="form-control" />
					</div>
					<div class="form-group">
						<label>Start Time</label>
						<input type="text" value="<?php echo $row['course_schedule_starttime'];?>" name="course_schedule_starttime" class="form-control" />
					</div>
					<div class="form-group">
						<label>End Time</label>
						<input type="text" value="<?php echo $row['course_schedule_endtime'];?>"  name="course_schedule_endtime" class="form-control" />
					</div>
					<div class="form-group">
						<label>Course</label>
						<input type="text" value="<?php echo $row['course_schedule_course'];?>" name="course_schedule_course" class="form-control" />
					</div>
					<div class="form-group">
						<label>Faculty</label>
						<input type="text" value="<?php echo $row['course_schedule_faculty'];?>" name="course_schedule_faculty" class="form-control" />
					</div>
					<button type="submit" class="btn btn-info btn-block">Edit Schedule</button>
					<?php
			}
		?>
				</form>
	
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