<?php
require ("../../db_connection/myConn.php");

$id = $_GET["id"];
$tz = 'Asia/Hong_Kong';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp);
	$now = date_format($dt,"Y-m-d H:i:s");

	$query="UPDATE `tbl_resort_lodging` SET `_status` ='checked-out',`_payment` = `_total_amount`, `_balance`=0, `_checkedout_time` ='$now' WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

?>