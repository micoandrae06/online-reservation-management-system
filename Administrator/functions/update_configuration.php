<?php
require ("../../db_connection/myConn.php");
$id = $_GET['id'];
$keyword = $_GET['keyword'];
$reply = $_GET['reply'];

	$query="UPDATE `tbl_tropi` SET `_keyword` = '$keyword', `_reply` = '$reply' WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>