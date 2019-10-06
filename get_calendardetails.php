
<?php

require "init.php";


$query= "select * from calendar_details ORDER BY calendar_id DESC LIMIT 1;";

$result = mysqli_query($con, $query);

while(($row = mysqli_fetch_assoc($result)) == true){

	$data[]=$row;
}
echo json_encode($data);

?>
