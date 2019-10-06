<?php
include 'init.php';

if(isset($_POST["Import"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $studentdetails_ID=$filesop[0];
 $student_rollnno = $filesop[1];
 $student_lastname = $filesop[2];
 $student_firstname = $filesop[3];
 $student_phone = $filesop[4];
 $student_email = $filesop[5];
 $student_program = $filesop[6];
 $student_specialization = $filesop[7];
 $student_joining = $filesop[8];
 $student_graduation = $filesop[9];
 $student_year = $filesop[10];
 
 
 $sql = "INSERT INTO student_details (studentdetails_ID,student_rollnno, student_lastname,student_firstname,student_phone,student_email,student_program,student_specialization,student_joining,student_graduation,student_year) VALUES ('$studentdetails_ID','$student_rollnno','$student_lastname','$student_firstname','$student_phone','$student_email','$student_program','$student_specialization','$student_joining','$student_graduation','$student_year')";
 $result = mysqli_query($con,$sql);
 }
 
 if($result){
echo "<script type=\"text/javascript\">
alert(\"File Uploaded Successfully\");
window.location = \"enroll_student_form.php\"
</script>";
 }else{
 echo "<script type=\"text/javascript\">
alert(\"Sorry! try Again\");
window.location = \"enroll_student_form.php\"
</script>";
 }
}
?> 