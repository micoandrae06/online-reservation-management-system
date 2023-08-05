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
	$query="INSERT INTO `tbl_resort`(`_resort_id`, `_resort_description`, `_img`) VALUES('$resortid','$description','$image')";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}

}
?>