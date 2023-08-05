<?php 

$_date = $_GET['_date'];
$_time = $_GET['_time'];
$_hour = $_GET['_hours'];
$roomid = $_GET['roomid'];

$arrival = strtotime($_date . ' ' . $_time);
$arrival =date('Y-m-d H:i',$arrival);
$checkout = date("Y-m-d H:i", strtotime('+'.$_hour.' hours', strtotime($arrival)));


        require ("../db_connection/myConn.php");
        $sql = "SELECT `_id`, `_transaction_num`, `_date`, `_arrival_time`, `_checkout_time`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_room_id`, `_room_type`, `_hours`, `_extra_person`, `_extra_bed`, `_exceeding_hours`, `_total_amount`, `_payment`, `_balance`, `_room_transfer`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status` FROM `tbl_room_lodging` WHERE (`_room_id` LIKE '$roomid') AND (`_status` LIKE 'reserved' OR `_status` LIKE 'checked-in') AND (`_arrival_time` BETWEEN '$arrival' AND '$checkout' OR `_checkout_time` BETWEEN '$arrival' AND '$checkout')";
        $result= $con_str->query($sql);
        $apiresponse='';
        if($result->num_rows > 0) {
            // $apiresponse = 'unavailable';
        }else{
            $apiresponse = 'available';
        }
        echo $apiresponse;

       ?>