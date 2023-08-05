<?php
require ("../../db_connection/myConn.php");

$image_name = $_GET["image_name"];
$roomid = $_GET["roomid"];
$roomtype = $_GET["roomtype"];
$description = $_GET["description"];

if($_FILES["file_add"]["name"] != ""){
	
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../../img-room/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="UPDATE `tbl_rooms` SET `_room_type` = '$roomtype', `_room_description`='$description', `_img` = '$image' WHERE `_room_id` LIKE '$roomid'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

}else{
	$query="UPDATE `tbl_rooms` SET `_room_type` = '$roomtype', `_room_description`='$description'WHERE `_room_id` LIKE '$roomid'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
}
?>