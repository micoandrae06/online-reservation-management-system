<?php
require ("../../db_connection/myConn.php");

$id = $_GET["id"];

$extra_hour = (Int)$_GET["extra_hour"];
$extra_bed = (Int)$_GET["extra_bed"];
$extra_person = (Int)$_GET["extra_person"];
$extra_person_rate = (Float)$_GET["extra_person_rate"];
$extra_bed_rate = (Float)$_GET["extra_bed_rate"];
$exceeding_hours_rate = (Float)$_GET["exceeding_hours_rate"];


$bal_person=floatval(floatval($extra_person * $extra_person_rate));
$bal_bed=floatval(floatval($extra_bed * $extra_bed_rate));
$bal_hour=floatval(floatval($extra_hour * $exceeding_hours_rate));
$balance =floatval($bal_hour + $bal_bed + $bal_person);

	$query="UPDATE `tbl_room_lodging` SET `_total_amount` = `_total_amount` + $balance,`_balance` = `_balance` + $balance, `_extra_person` = `_extra_person` + $extra_person, `_extra_bed` = `_extra_bed` + $extra_bed, `_exceeding_hours` = `_exceeding_hours` + $extra_hour WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						echo '200';
					}
	


?>