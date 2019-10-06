<!DOCTYPE html>
<?php 
 include 'init.php';
?> 
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Enroll Faculty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="NEW India LMS APP">
  <meta name="description" content="Enroll Faculty">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
  <style>
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
    <br><br>
        <div class="container">
            <div class="row">
             <div class="col-md-12 text-center"><h1 class="main-header">New India LMS APP - Faculty Enrollment</h1></div>
             <div class="logoutclass">
            <button id="logout_button">Logout</button>
        </div>
			<br>
               
                <div class="col-md-6  col-sm-offset-3" id="form-login">
                    <form class="well" action="import_faculty_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
			
			</div>
			<div class="row">
             <div class="col-md-12 text-center"><h1>Faculty Enrollment</h1></div>
				<div class="col-md-6  col-sm-offset-3" id="faculty-login">
				<br>
	
                    <form class="well" action="insert_faculty_details.php" method="post" name="upload_facultydetails" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Enter the Details</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>Employee ID:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_employeeid" id="faculty_employeeid" class="input-medium form-control">
                                </div>
                            </div>
							 <div class="control-group">
                                <div class="control-label">
                                    <label>Last Name:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_lastname" id="faculty_lastname" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>First Name:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_firstname" id="faculty_firstname" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Phone No:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_phone" id="faculty_phone" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Email Address:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_email" id="faculty_email" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Faculty Program:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_program" id="faculty_program" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Faculty Designation:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_designation" id="faculty_designation" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Faculty Joining:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_joining" id="faculty_joining" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Faculty Specialization:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_specialization" id="faculty_specialization" class="input-medium form-control">
                                </div>
                            </div>
							<div class="control-group">
                                <div class="control-label">
                                    <label>Faculty Code:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" name="faculty_code" id="faculty_code" class="input-medium form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
             
            </div>
            
    
            <table>
			
                <?php
                    $SQLSELECT = "SELECT * FROM faculty_details ";
                    $result_set =  mysqli_query($con,$SQLSELECT);
                    $row = mysqli_fetch_array($result_set);
                ?>
            </table>
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