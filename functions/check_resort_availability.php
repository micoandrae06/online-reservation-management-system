<?php 

$_date = $_GET['_date'];
$tourtype = $_GET['tourtype'];
$resortid = $_GET['resortid'];


        require ("../db_connection/myConn.php");
        $sql = "SELECT `_id`, `_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code` FROM `tbl_resort_lodging` WHERE (`_resort_id` LIKE '$resortid') AND (`_status` LIKE 'reserved' OR `_status` LIKE 'checked-in') AND (`_date` LIKE '$_date' AND `_tour_type` LIKE '$tourtype')";
        $result= $con_str->query($sql);
        $apiresponse='';
        if($result->num_rows > 0) {
            // $apiresponse = 'unavailable';
        }else{
            $apiresponse = 'available';
        }
        echo $apiresponse;

       ?>