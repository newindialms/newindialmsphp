 <?php

if($_SERVER['REQUEST_METHOD']=='POST'){

include 'init.php';

 $id= $_POST['id'];

// Create connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM enroll_faculty where id = '$id'" ;

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;

$conn->close();
}
?>