<?php
require ("../../db_connection/myConn.php");

$image_name = $_GET["image_name"];
$resortid = $_GET["resortid"];
$description = $_GET["description"];

if($_FILES["file_add"]["name"] != ""){
	
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../../img-resort/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="UPDATE `tbl_resort`SET  `_resort_description` = '$description', `_img` = '$image' WHERE `_resort_id` LIKE '$resortid'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

}else{
	$query="UPDATE `tbl_resort`SET  `_resort_description` = '$description' WHERE `_resort_id` LIKE '$resortid'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
}
?>