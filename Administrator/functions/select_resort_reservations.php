<?php
require ("../../db_connection/myConn.php");

    $query = "SELECT `_id`, `_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code` FROM `tbl_resort_lodging` WHERE (`_status` NOT LIKE 'cancelled' AND `_status` NOT LIKE 'checked-in' AND `_status` NOT LIKE 'checked-out'  AND `_guest_origin` LIKE 'reservation')";


$columns = array("_id","_transaction_num","_date","_resort_id","_tour_type","_rate","_total_amount","_payment","_balance","_gcash_request_code");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_resort_id` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_tour_type` LIKE "%'.$_POST["search"]["value"].'%"
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
$tz = 'Asia/Hong_Kong';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp);
	$now = date_format($dt,"Y-m-d");


if ($row["_status"]=='pending'){
 $sub_array[] = '<div class="btn-group" id="td_name'.$row["_id"].'">
 				<a class="btn btn-success";"
 				data-id="'.$row["_transaction_num"].'" id="btn_received_resort">
 				Payment received</a>
 				<a class="btn btn-danger";"
 				data-id="'.$row["_transaction_num"].'" id="btn_cancel_resort">
 				Payment did not received</a>
 				</div>';
 }else if ($row["_date"]==$now){
 $sub_array[] = '<div class="btn-group" id="td_name'.$row["_id"].'">
 				<a class="btn btn-primary";"
 				data-id="'.$row["_transaction_num"].'" id="btn_checkin_resort">
 				Check-in</a>
 				
 				</div>';
 }
 else{
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>N/A</center></div>';	
 }
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_transaction_num"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>Name: '.$row["_guest_name"].'<br>Contact#: '.$row["_guest_contact"].'<br>Address: '.$row["_guest_address"].'<br>Email: '.$row["_guest_email"].' </center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_resort_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_tour_type"].'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_rate"],2).'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_total_amount"],2).'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_payment"],2).'</center></div>';
 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_balance"],2).'</center></div>';

$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_gcash_request_code"].'</center></div>';

 

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code` FROM `tbl_resort_lodging`";
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