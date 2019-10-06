<?php

require "init.php";


$query= "select calendar_val from calendar_val;";

$result = mysqli_query($con, $query);

while(($row = mysqli_fetch_assoc($result)) == true){

	$data[]=$row;
}
echo json_encode($data);

?>
