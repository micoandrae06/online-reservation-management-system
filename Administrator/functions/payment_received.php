<?php
require ("../../db_connection/myConn.php");

$transaction_num = $_GET["transaction_num"];


	$query="UPDATE `tbl_room_lodging` SET `_status` ='reserved' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

?>