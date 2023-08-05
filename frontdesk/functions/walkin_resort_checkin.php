<?php 
require ("../../db_connection/myConn.php");


$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$date=(new DateTime('now'));

$now = date_format($dt,"Y-m-d H:i:s");
$transaction_num = date_format($date,"YmdHisu");
$_date = $_GET['_date'];

$resortid = $_GET['resortid'];

$tourtype = $_GET['tourtype'];
$guest_email = $_GET['guest_email'];
$guest_name = $_GET['guest_name'];
$guest_contact = $_GET['guest_contact'];
$guest_address = $_GET['guest_address'];
$total_amount = $_GET['total_amount'];
$payment = $_GET['payment'];
$balance =0;
$rate = $_GET['rate'];



      $query="INSERT INTO `tbl_resort_lodging`(`_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`,`_guest_origin`, `_status`,`_checkedin_time`) VALUES ('$transaction_num','$now','$guest_email','$guest_name','$guest_contact','$guest_address','$resortid','$tourtype',$rate,$total_amount,$payment,$balance,'walk-in','checked-in','$now')";
                    if(mysqli_query($con_str,$query)){
                    echo '200'; 
                    }

       ?>