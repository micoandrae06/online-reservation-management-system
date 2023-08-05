<?php
require ("../../db_connection/myConn.php");
$exceedinghour = $_GET['exceedinghour'];


	$query="UPDATE `tbl_rates` SET `_exceeding_hour`=$exceedinghour";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>