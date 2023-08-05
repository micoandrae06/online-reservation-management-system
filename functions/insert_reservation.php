<?php 
require ("../db_connection/myConn.php");


$transaction_num = $_GET['transaction_num'];
$_date = $_GET['_date'];
$_time = $_GET['_time'];
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
$payment = $_GET['payment'];
$balance = $_GET['balance'];
$rate = $_GET['rate'];
$gcash_code = $_GET['gcash_code'];
$arrival = strtotime($_date . ' ' . $_time);
$arrival =date('Y-m-d H:i',$arrival);
$checkout = date("Y-m-d H:i", strtotime('+'.$_hour.' hours', strtotime($arrival)));


      $query="INSERT INTO `tbl_room_lodging`(`_transaction_num`,`_date`, `_arrival_time`, `_checkout_time`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_room_id`, `_room_type`, `_hours`, `_rate`, `_extra_person`, `_extra_person_rate`, `_extra_bed`, `_extra_bed_rate`,`_exceeding_hours_rate`, `_total_amount`, `_payment`, `_balance`, `_guest_origin`, `_status`,`_gcash_request_code`) VALUES ('$transaction_num','$_date','$arrival','$checkout','$guest_email','$guest_name','$guest_contact','$guest_address','$roomid','$roomtype',$_hour,$rate,$extra_person,$extra_person_rate,$extra_bed,$extra_bed_rate,$exceeding_hours_rate,$total_amount,$payment,$balance,'reservation','pending','$gcash_code')";
                    if(mysqli_query($con_str,$query)){
                    echo '200'; 
                    }

       ?>