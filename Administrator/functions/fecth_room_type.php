<?php
require ("../../db_connection/myConn.php");
  $sql = "SELECT  DISTINCT(`_room_type`) AS _room_type FROM `tbl_room_rate`";
  $result= $con_str->query($sql);
  $output='<option selected="" hidden="" value="">Please select room type...</option>';
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $output.='<option value="'.$row["_room_type"].'">'.$row["_room_type"].'</option>';
      }
  }
  echo $output;



?>