<?php
require ("../../db_connection/myConn.php");
$roomtype = $_GET["roomtype"];
  $sql = "SELECT `_room_id` FROM `tbl_rooms` WHERE `_status` NOT LIKE 'inuse' AND `_room_type` LIKE '$roomtype'";
  $result= $con_str->query($sql);
  $output='<option selected="" hidden="" value="">Please select room...</option>';
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

      	$tz = 'Asia/Hong_Kong';
			$timestamp = time();
			$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
			$dt->setTimestamp($timestamp);
			$now = date_format($dt,"Y-m-d");
      	 $sql2 = "SELECT `_room_id` FROM `tbl_room_lodging` WHERE `_status` LIKE 'reserved' AND `_date` LIKE '$now'";
		  $result2= $con_str->query($sql2);
		 
		  if($result2->num_rows > 0) {
		      
		  }else{

        	$output.='<option value="'.$row["_room_id"].'">'.$row["_room_id"].'</option>';
    	  }
      }
  }
  echo $output;



?>