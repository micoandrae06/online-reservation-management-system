<?php 

        require ("../db_connection/myConn.php");
        $sql = "SELECT DISTINCT(`_tour_type`) AS _tour_type FROM `tbl_resort_rate`";
        $result= $con_str->query($sql);
        $output='<option selected="" hidden="" value="">Please select type of tour...</option>';
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $output.='<option value="'.$row["_tour_type"].'">'.$row["_tour_type"].'</option>';
            }
        }
        echo $output;

       ?>