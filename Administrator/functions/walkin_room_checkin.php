<?php 
require ("../../db_connection/myConn.php");

$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d H:i:s");
$date=(new DateTime('now'));
$transaction_num = date_format($date,"YmdHisu");

$_hour = $_GET['_hours'];
$roomid = $_GET['roomid'];

$roomtype = $_GET['roomtype'];
$guest_email = $_GET['guest_email'];
$guest_name = $_GET['guest_name'];
$guest_contact = $_GET['guest_contact'];
$guest_address = $_GET['guest_address'];
$extra_person_rate = $_GET['extra_person_rate'];
$extra_person = $_GET['extra_person'];
$extra_bed_rate = $_GET['extra_bed_rate'];
$extra_bed = $_GET['extra_bed'];
$exceeding_hours_rate = $_GET['exceeding_hours_rate'];
$total_amount = $_GET['total_amount'];
$rate = $_GET['rate'];



      $query="INSERT INTO `tbl_room_lodging`(`_transaction_num`,`_date`,`_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_room_id`, `_room_type`, `_hours`, `_rate`, `_extra_person`, `_extra_person_rate`, `_extra_bed`, `_extra_bed_rate`,`_exceeding_hours_rate`, `_total_amount`, `_payment`, `_guest_origin`, `_status`,`_checkedin_time`) VALUES ('$transaction_num','$now','$guest_email','$guest_name','$guest_contact','$guest_address','$roomid','$roomtype',$_hour,$rate,$extra_person,$extra_person_rate,$extra_bed,$extra_bed_rate,$exceeding_hours_rate,$total_amount,$total_amount,'walk-in','checked-in','$now')";
                    if(mysqli_query($con_str,$query)){
                    echo '200'; 
                    }

       ?>