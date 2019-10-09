<?php
include 'init.php';

if(isset($_POST["Import"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 fgetcsv($handle);
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $student_rollnno = $filesop[0];
 $student_lastname = $filesop[1];
 $student_firstname	 = $filesop[2];
 $student_phone = $filesop[3];
 $student_email = $filesop[4];
 $student_program = $filesop[5];
 $student_specialization = $filesop[6];
 $student_joining = $filesop[7];
 $student_graduation = $filesop[8];
 $student_year = $filesop[9];
 
 
 $sql = "INSERT INTO first_second_year_student_details (student_rollnno, student_lastname ,
 student_firstname,student_phone,student_email,student_program,student_specialization,
 student_joining,student_graduation,student_year)
 VALUES ('$student_rollnno','$student_lastname','$student_firstname','$student_phone',
 '$student_email','$student_program','$student_specialization','$student_joining',
 '$student_graduation','$student_year')";
 $result = mysqli_query($con,$sql);
 }
 
 if($result){
echo "<script type=\"text/javascript\">
alert(\"File Uploaded Successfully\");
window.location = \"new_user.php\"
</script>";
 }else{
 echo "<script type=\"text/javascript\">
alert(\"Sorry! try Again\");
window.location = \"new_user.php\"
</script>";
 }
}
?> 