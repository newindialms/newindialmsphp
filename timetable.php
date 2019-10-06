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
</style>
</head>
<body>
<?php 
require "init.php";
$query="SELECT 	course_details_code,course_details_name,	course_details_credits,course_details_category,	course_details_faculty,course_details_abbr from course_details;";
$result=mysqli_query($con,$query);
?>
<div class="header">
	<h1> Course Schedule Time Table </h1>
	<h2>LMT School of Management, Thapar University, Patiala</h2>
	<h2>Course List Table </h2>
</div>
		<div class="col-sm-12">
			<table class="table">
				<thead>
				<tr>
					
					<th>Course Code</th>
					<th>Course Name</th>
					<th>Credits</th>
					<th>Course Category</th>
					<th>Faculty Code</th>
					<th>Course Abbr</th>

					
				</tr>
				</thead>
				<tbody>
				
				<?php
					while($row=mysqli_fetch_array($result)){
				?>
					<tr>
						<td><?php echo $row['course_details_code']?></td>
						<td><?php echo $row['course_details_name']?></td>
						<td><?php echo $row['course_details_credits']?></td>
						<td><?php echo $row['course_details_category']?></td>
						<td><?php echo $row['course_details_faculty']?></td>
						<td><?php echo $row['course_details_abbr']?></td>
						
						
					</tr>
					<?php 
					}
					mysqli_close($con);
					?>
				</tbody>
			</table>
		</div>
</body>
</html>
