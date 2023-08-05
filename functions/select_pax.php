<?php 
$tourtype = $_GET["tourtype"];
        require ("../db_connection/myConn.php");
        $sql = "SELECT `_pax`,`_price` FROM `tbl_resort_rate` WHERE `_tour_type` LIKE '$tourtype'";
        $result= $con_str->query($sql);
        $output='';
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $output.='
              <input onchange="checkRate();" type="radio" name="_pax" data-price="'.$row["_price"].'" id="-'.$row["_pax"].'" value="'.$row["_pax"].'" > <label for="-'.$row["_pax"].'">'.$row["_pax"].' pax</i></strong></label><br>';
            }
        }
        echo $output;

       ?>