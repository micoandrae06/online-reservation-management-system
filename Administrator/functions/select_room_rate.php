<?php
require ("../../db_connection/myConn.php");
$roomtype = $_GET["roomtype"];
$output ='';
$sql2 = "SELECT `_id`, `_room_type`, `_3_hr`, `_6_hr`, `_12_hr`, `_24_hr` FROM `tbl_room_rate` WHERE `_room_type` LIKE '$roomtype'";
              $result2= $con_str->query($sql2);
             
              if($result2->num_rows > 0) {
                  while($row2 = $result2->fetch_assoc()) {
                    $_3_hr = $row2["_3_hr"];
                    $_6_hr = $row2["_6_hr"];
                    $_12_hr = $row2["_12_hr"];
                    $_24_hr = $row2["_24_hr"];
                    $output.='<input type="radio" name="_hours" id="_3_hr" value="3" data-rate="'.$_3_hr.'" onchange="getRoomrate();computeTotal();">
                <label for="_3_hr">3 Hours <strong><i>(₱'.number_format($_3_hr,2).')</i></strong></label><br>
                <input type="radio" name="_hours" id="_6_hr" value="6" data-rate="'.$_6_hr.'" onchange="getRoomrate();computeTotal();">
                <label for="_6_hr">6 Hours <strong><i>(₱'.number_format($_6_hr,2) .')</i></strong></label><br>
                <input type="radio" name="_hours" id="_12_hr" value="12" data-rate="'.$_12_hr.'" onchange="getRoomrate();computeTotal();">
                <label for="_12_hr">12 Hours <strong><i>(₱'.number_format($_12_hr,2) .')</i></strong></label><br>
                <input type="radio" name="_hours" id="_24_hr" value="24" data-rate="'.$_24_hr.'" onchange="getRoomrate();computeTotal();">
                <label for="_24_hr">24 Hours <strong><i>(₱'.number_format($_24_hr,2) .')</i></strong></label><br>';
                  }
              }
echo $output;
              ?>