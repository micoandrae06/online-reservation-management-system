<?php
require ("../../db_connection/myConn.php");
$id = $_GET['id'];


	$query="DELETE FROM `tbl_users` WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>