<?php
require ("../db_connection/myConn.php");
$email = $_GET['email'];

	$query="UPDATE `tbl_users` SET `_status` = 'verified' WHERE `_email` LIKE '$email'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>