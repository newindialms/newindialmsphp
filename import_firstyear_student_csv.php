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
 $batch_number=$filesop[1];
 
 
 $sql = "INSERT INTO first_year_students (student_rollnno,batch_number) VALUES ('$student_rollnno','$batch_number')";
 $result = mysqli_query($con,$sql);
 }
 
 if($result){
echo "<script type=\"text/javascript\">
alert(\"File Uploaded Successfully\");
window.location = \"enroll_firstyear_student_form.php\"
</script>";
 }else{
 echo "<script type=\"text/javascript\">
alert(\"Sorry! try Again\");
window.location = \"enroll_firstyear_student_form.php\"
</script>";
 }
}
?> 