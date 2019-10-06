<?php
$ajax = false;
$dbValue = 1; //or the default value of your choice - matched to the default selection value of the dropdown
if(isset($_GET['action']) && $_GET['action'] == 'ajax' && isset($_GET['dd'])) 
{
    $dbValue = intval( $_GET['dd'] );
    $ajax = true;   
}
$conn = mysql_connect("localhost","root","");
mysql_select_db("daniweb",$conn);
$res = mysql_query("SELECT * FROM `table` WHERE id = $dbValue");
$dataTable = '';
while($data = mysql_fetch_assoc($res))
{
    $dataTable .= "<tr><td>" . $data['field1'] . "</td><td>" . $data['field2'] . "</td></tr>"; 
}
if($ajax) echo $dataTable;
?>