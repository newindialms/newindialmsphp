<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'init.php';

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

 $id = $_POST['id'];

$Sql_Query = "DELETE FROM  student_details WHERE studentdetails_ID = '$id'";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Record Deleted Successfully';
}
else
{
 echo 'Something went wrong';
 }
 }
 mysqli_close($con);
?>