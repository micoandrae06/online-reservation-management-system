<?php 
require ("../db_connection/myConn.php");


$transaction_num = $_GET['transaction_num'];
$_date = $_GET['_date'];

$resortid = $_GET['resortid'];

$tourtype = $_GET['tourtype'];
$guest_email = $_GET['guest_email'];
$guest_name = $_GET['guest_name'];
$guest_contact = $_GET['guest_contact'];
$guest_address = $_GET['guest_address'];
$total_amount = $_GET['total_amount'];
$payment = $_GET['payment'];
$balance = $_GET['balance'];
$rate = $_GET['rate'];
$gcash_code = $_GET['gcash_code'];


      $query="INSERT INTO `tbl_resort_lodging`(`_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`,`_guest_origin`, `_status`, `_gcash_request_code`) VALUES ('$transaction_num','$_date','$guest_email','$guest_name','$guest_contact','$guest_address','$resortid','$tourtype',$rate,$total_amount,$payment,$balance,'reservation','pending','$gcash_code')";
                    if(mysqli_query($con_str,$query)){
                    echo '200'; 
                    }

       ?>