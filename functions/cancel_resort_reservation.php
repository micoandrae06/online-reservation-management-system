<?php
require ("../db_connection/myConn.php");

$transaction_num = $_GET["transaction_num"];
$reason = $_GET["reason"];

	$query="UPDATE `tbl_resort_lodging` SET `_status` ='cancelled', `_cancellation_reason` ='$reason' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

?>