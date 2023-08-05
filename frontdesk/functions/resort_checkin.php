<?php
require ("../../db_connection/myConn.php");

$transaction_num = $_GET["transaction_num"];
$tz = 'Asia/Hong_Kong';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp);
	$now = date_format($dt,"Y-m-d H:i:s");

	$query="UPDATE `tbl_resort_lodging` SET `_status` ='checked-in', `_checkedin_time` ='$now' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

?>