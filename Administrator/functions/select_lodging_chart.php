<?php
require ("../../db_connection/myConn.php");
$_year = $_GET['_year'];


$data=array();
$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-01%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-02%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-03%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-04%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-05%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-06%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}


	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-07%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}

	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-08%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}

	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-09%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}

	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-10%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}

	$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-11%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}
$query = "SELECT COUNT(_id) AS lodging FROM `tbl_room_lodging` WHERE `_date` LIKE '$_year-12%' and `_status` LIKE 'checked-out'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $data[] = $row["lodging"];

		}
	}

	echo  json_encode( $data );
?>