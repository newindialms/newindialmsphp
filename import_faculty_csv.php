<?php
include 'init.php';

if(isset($_POST["Import"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $faculty_employeeid = $filesop[0];
 $faculty_lastname = $filesop[1];
 $faculty_firstname = $filesop[2];
 $faculty_phone = $filesop[3];
 $faculty_email = $filesop[4];
 $faculty_program = $filesop[5];
 $faculty_designation = $filesop[6];
 $faculty_joining = $filesop[7];
  $faculty_specialization = $filesop[8];
   $faculty_code = $filesop[9];
 
 
 $sql = "INSERT INTO faculty_details (faculty_employeeid, faculty_lastname,faculty_firstname,faculty_phone,faculty_email,faculty_program,faculty_designation,faculty_joining,faculty_specialization,faculty_code) VALUES ('$faculty_employeeid','$faculty_lastname','$faculty_firstname','$faculty_phone','$faculty_email','$faculty_program','$faculty_designation','$faculty_joining','$faculty_specialization','$faculty_code')";
 $result = mysqli_query($con,$sql);
 }
 
 if($result){
echo "<script type=\"text/javascript\">
alert(\"File Uploaded Successfully\");
window.location = \"enroll_faculty_form.php\"
</script>";
 }else{
 echo "<script type=\"text/javascript\">
alert(\"Sorry! try Again\");
window.location = \"enroll_faculty_form.php\"
</script>";
 }
}
?> 