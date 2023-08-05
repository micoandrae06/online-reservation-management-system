<?php
require ("../../db_connection/myConn.php");

    $query = "SELECT `_id`, `_transaction_num`, `_date`, `_arrival_time`, `_checkout_time`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_room_id`, `_room_type`, `_hours`, `_rate`, `_extra_person`, `_extra_person_rate`, `_extra_bed`, `_extra_bed_rate`, `_exceeding_hours`, `_exceeding_hours_rate`, `_total_amount`, `_payment`, `_balance`, `_room_transfer`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code`,`_cancellation_reason` FROM `tbl_room_lodging` WHERE (`_status` LIKE 'cancelled' AND `_guest_origin` LIKE 'reservation')";


$columns = array("_id","_transaction_num","_date","_arrival_time","_room_id","_room_type","_hours","_rate","_extra_person","_extra_bed","_total_amount","_payment","_balance","_gcash_request_code");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_room_type` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_transaction_num` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_room_id` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_gcash_request_code` LIKE "%'.$_POST["search"]["value"].'%"
)';
}

 $query .= 'ORDER BY _id ';


$query1 = '';

if($_POST["length"] != -1) {
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($con_str, $query));

$result = mysqli_query($con_str, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result)) {
  $sub_array = array();

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_cancellation_reason"].'</center></div>';	
 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_transaction_num"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>Name: '.$row["_guest_name"].'<br>Contact#: '.$row["_guest_contact"].'<br>Address: '.$row["_guest_address"].'<br>Email: '.$row["_guest_email"].' </center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_arrival_time"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_room_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_room_type"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_hours"].' hours</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_rate"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_extra_person"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_extra_bed"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_total_amount"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_payment"],2).'</center></div>';

 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_balance"],2).'</center></div>';

$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_gcash_request_code"].'</center></div>';

 

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");

 $query = "SELECT `_id`, `_transaction_num`, `_date`, `_arrival_time`, `_checkout_time`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_room_id`, `_room_type`, `_hours`, `_rate`, `_extra_person`, `_extra_person_rate`, `_extra_bed`, `_extra_bed_rate`, `_exceeding_hours`, `_exceeding_hours_rate`, `_total_amount`, `_payment`, `_balance`, `_room_transfer`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code` FROM `tbl_room_lodging`";
 $result = mysqli_query($con_str, $query);
 return mysqli_num_rows($result);
}


$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($con_str),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);




?>