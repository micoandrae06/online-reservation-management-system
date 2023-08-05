<?php
require ("../../db_connection/myConn.php");
$tourtype = $_GET['tourtype'];
$tourdescription = $_GET['tourdescription'];
$pax = $_GET['pax'];
$rate = $_GET['rate'];

	$query="INSERT INTO `tbl_resort_rate`(`_tour_type`, `_tour_description`, `_pax`, `_price`) VALUES  ('$tourtype','$tourdescription',$pax,$rate)";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>