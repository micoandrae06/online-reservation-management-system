<?php
require ("../../db_connection/myConn.php");


    $query = "SELECT `_id`, `_room_id`, `_room_type`, `_room_description`, `_img` FROM `tbl_rooms` ";


$columns = array("_id","_room_id","_room_type","_room_description");



if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE (`_room_id` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_room_type` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_room_description` LIKE "%'.$_POST["search"]["value"].'%"
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
 				<a class="btn btn-default" id="btn_edit"
 				data-id="'.$row["_id"].'"
 				data-roomtype="'.$row["_room_type"].'"
 				data-description="'.$row["_room_description"].'"
 				data-roomid="'.$row["_room_id"].'"
 				data-img="'.$row["_img"].'"			
				><img src="../assets/img/icons/Edit_50px.png"></a>
 				<a class="btn btn-default" id="btn_delete"
 				data-id="'.$row["_id"].'">
 				<img src="../assets/img/icons/Trash_36px.png" ></a>
 				</div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center><img style="width:80px;border-radius:5px;box-shadow: 20px 20px 50px grey;" src="../img-room/'.$row["_img"].'"</center></div>';	
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_room_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_room_type"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_room_description"].'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");

 $query = "SELECT `_id`, `_room_id`, `_room_type`, `_room_description`, `_img` FROM `tbl_rooms`";
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