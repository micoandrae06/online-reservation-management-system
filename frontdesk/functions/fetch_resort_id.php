<?php
require ("../../db_connection/myConn.php");
  $sql = "SELECT  `_resort_id` FROM `tbl_resort`";
  $result= $con_str->query($sql);
  $output='<option selected="" hidden="" value="">Please select resort...</option>';
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $output.='<option value="'.$row["_resort_id"].'">'.$row["_resort_id"].'</option>';
      }
  }
  echo $output;



?>