<?php
require ("../../db_connection/myConn.php");

    $query = "SELECT `_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_birthday`, `_contact`, `_address`, `_usertype`, `_password`, `_status` FROM `tbl_users` WHERE `_usertype` LIKE 'Frontdesk'";


$columns = array("_id","_email","_surname","_birthday","_contact","_address");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_first_name` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_middle_name` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_surname` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_email` LIKE "%'.$_POST["search"]["value"].'%"
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
  
 $sub_array[] = '<div class="btn-group" id="td_name'.$row["_id"].'">
 				<a class="btn btn-success";"
 				data-id="'.$row["_id"].'"
 				data-email="'.$row["_email"].'" 
 				data-firstname="'.$row["_first_name"].'"
 				data-middlename="'.$row["_middle_name"].'"
 				data-surname="'.$row["_surname"].'"
 				data-birthday="'.$row["_birthday"].'"
 				data-contact="'.$row["_contact"].'"
 				data-address="'.$row["_address"].'"
 				id="btn_edit_user">
 				Edit</a>
 				<a class="btn btn-danger";"
 				data-id="'.$row["_id"].'" id="btn_delete_user">
 				Delete</a>
 				</div>';
 
 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_email"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_first_name"].' '.$row["_middle_name"].' '. $row["_surname"] . '</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_birthday"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_contact"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_address"].'</center></div>';



 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");

 $query = "SELECT `_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_birthday`, `_contact`, `_address`, `_usertype`, `_password`, `_status` FROM `tbl_users` WHERE `_usertype` LIKE 'Frontdesk'";
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