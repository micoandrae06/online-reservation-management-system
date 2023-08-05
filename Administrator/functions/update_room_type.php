<?php
require ("../../db_connection/myConn.php");
$id = $_GET['id'];
$roomtype = $_GET['roomtype'];
$_3_hr = $_GET['_3_hr'];
$_6_hr = $_GET['_6_hr'];
$_12_hr = $_GET['_12_hr'];
$_24_hr = $_GET['_24_hr'];

	$query="UPDATE `tbl_room_rate` SET `_room_type` = '$roomtype', `_3_hr`=$_3_hr, `_6_hr`=$_6_hr, `_12_hr`=$_12_hr, `_24_hr`=$_24_hr WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>