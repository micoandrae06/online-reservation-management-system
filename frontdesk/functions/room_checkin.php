<?php
require ("../../db_connection/myConn.php");

$transaction_num = $_GET["transaction_num"];
$roomid = $_GET["roomid"];
$tz = 'Asia/Hong_Kong';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp);
	$now = date_format($dt,"Y-m-d H:i:s");

	$query="UPDATE `tbl_room_lodging` SET `_status` ='checked-in', `_checkedin_time` ='$now' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){
					
					}

   $query="UPDATE `tbl_rooms` SET `_status` ='inuse'WHERE `_room_id` LIKE '$roomid'";
					if(mysqli_query($con_str,$query)){
						echo '200';
					}

?>