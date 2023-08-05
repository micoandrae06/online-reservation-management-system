<?php
require ("../../db_connection/myConn.php");
$roomtype = $_GET['roomtype'];
$_3_hr = $_GET['_3_hr'];
$_6_hr = $_GET['_6_hr'];
$_12_hr = $_GET['_12_hr'];
$_24_hr = $_GET['_24_hr'];

	$query="INSERT INTO `tbl_room_rate`(`_room_type`, `_3_hr`, `_6_hr`, `_12_hr`, `_24_hr`) VALUES  ('$roomtype',$_3_hr,$_6_hr,$_12_hr,$_24_hr)";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>