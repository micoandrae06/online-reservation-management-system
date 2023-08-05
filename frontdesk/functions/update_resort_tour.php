<?php
require ("../../db_connection/myConn.php");
$id = $_GET['id'];
$tourtype = $_GET['tourtype'];
$tourdescription = $_GET['tourdescription'];
$pax = $_GET['pax'];
$rate = $_GET['rate'];

	$query="UPDATE `tbl_resort_rate` SET `_tour_type`='$tourtype', `_tour_description`='$tourdescription', `_pax`=$pax, `_price`=$rate WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>