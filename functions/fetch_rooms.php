<?php 

        require ("../db_connection/myConn.php");
        $sql = "SELECT `_id`, `_room_id`, `_room_type`, `_room_description`, `_img` FROM `tbl_rooms`";
        $result= $con_str->query($sql);
        $output='';
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $roomtype= $row["_room_type"];
              $minrate = 0;
              $_3_hr=0;
              $_6_hr=0;
              $_12_hr=0;
              $_24_hr=0;
              $sql2 = "SELECT `_id`, `_room_type`, `_3_hr`, `_6_hr`, `_12_hr`, `_24_hr` FROM `tbl_room_rate` WHERE `_room_type` LIKE '$roomtype'";
              $result2= $con_str->query($sql2);
             
              if($result2->num_rows > 0) {
                  while($row2 = $result2->fetch_assoc()) {
                    $minrate = $row2['_3_hr'];
                    $_3_hr = $row2['_3_hr'];
                    $_6_hr = $row2['_6_hr'];
                    $_12_hr = $row2['_12_hr'];
                    $_24_hr = $row2['_24_hr'];
                  }
              }
             
          $output.='<div class="col-lg-3">
          <div class="card" style="box-shadow: 20px 20px 50px lightgrey;">
            <div class="card-header">
              <h6><strong><i>'.$roomtype.'</i></strong></h6>
            </div>
            <div class="card-body">
              <img src="img-room/'.$row['_img'].'" style="width: 100%;border-radius:5px;margin-bottom: 20px;">
              <span>'.$row['_room_id'].'</span><br>
              
            </div>
            <div class="card-footer">
              <span>Starts at ₱'.number_format($minrate,2).'</span>
                <a href="view_room.php?roomid='.$row["_room_id"].'&img='.$row["_img"].'&description='.$row["_room_description"].'&roomtype='.$row["_room_type"].'&_3_hr='.$_3_hr.'&_6_hr='.$_6_hr.'&_12_hr='.$_12_hr.'&_24_hr='.$_24_hr.'" class="btn" style="color:white;background-color: rgb(255,74,23);float: right;">View</a>
            </div>
          </div>
        </div>';
            }
        }
        echo $output;

       ?>