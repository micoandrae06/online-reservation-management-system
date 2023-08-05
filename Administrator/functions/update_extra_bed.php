<?php
require ("../../db_connection/myConn.php");
$extrabed = $_GET['extrabed'];


	$query="UPDATE `tbl_rates` SET `_extra_bed`=$extrabed";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>