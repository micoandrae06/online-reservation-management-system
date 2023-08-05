<?php
require ("../../db_connection/myConn.php");
$extraperson = $_GET['extraperson'];


	$query="UPDATE `tbl_rates` SET `_extra_person`=$extraperson";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>