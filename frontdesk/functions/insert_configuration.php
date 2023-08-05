<?php
require ("../../db_connection/myConn.php");
$keyword = $_GET['keyword'];
$reply = $_GET['reply'];

	$query="INSERT INTO `tbl_tropi`(`_keyword`, `_reply`) VALUES ('$keyword','$reply')";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>