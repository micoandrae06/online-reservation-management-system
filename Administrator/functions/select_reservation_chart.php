<?php
require ("../../db_connection/myConn.php");
$date_from=$_GET["_datefrom"];
$date_to=$_GET["_dateto"];

$date_filter='';
if ($date_from!='' && $date_to !='') {
	$date_filter = "AND (`_date` BETWEEN '".$date_from."' AND '".$date_to."')";
}else if ($date_from!='' && $date_to =='') {
	$date_filter = "AND (`_date` LIKE '".$date_from."')";
}else if ($date_from=='' && $date_to !='') {
	$date_filter = "AND (`_date` BETWEEN '%%%%-%%-%%' AND '".$date_to."')";
}else{
	$date_filter="AND (`_date` LIKE '%')";
}



$data=array();
$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_status` LIKE 'checked-out' and `_guest_origin` LIKE 'reservation'".$date_filter;
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_status` LIKE 'cancelled' and `_guest_origin` LIKE 'reservation'".$date_filter;
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}

	
	echo  json_encode( $data );
?>