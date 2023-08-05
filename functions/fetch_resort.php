<?php 

        require ("../db_connection/myConn.php");
        $sql = "SELECT `_id`, `_resort_id`, `_resort_description`, `_img` FROM `tbl_resort`";
        $result= $con_str->query($sql);
        $output='';
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            
             
          $output.='<div class="col-lg-6">
          <div class="card" style="box-shadow: 20px 20px 50px lightgrey;">
            <div class="card-header">
              <h6><strong><i>'.$row["_resort_id"].'</i></strong></h6>
            </div>
            <div class="card-body">
              <img src="img-resort/'.$row['_img'].'" style="width: 100%;border-radius:5px">
          
            
            </div>
            <div class="card-footer">
               <center> <a href="view_resort.php?resortid='.$row["_resort_id"].'&description='.$row["_resort_description"].'&img='.$row["_img"].'" class="btn" style="color:white;background-color: rgb(255,74,23);width:50%">View</a></center>
            </div>
          </div>
        </div>';
            }
        }
        echo $output;

       ?>