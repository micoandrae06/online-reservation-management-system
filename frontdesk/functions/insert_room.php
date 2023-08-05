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
	$query="INSERT INTO `tbl_rooms`(`_room_id`, `_room_type`, `_room_description`, `_img`) VALUES('$roomid','$roomtype','$description','$image')";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

}
?>