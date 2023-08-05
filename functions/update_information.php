<?php
require ("../db_connection/myConn.php");
$email = $_GET['email'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$surname = $_GET['surname'];
$birthday = $_GET['birthday'];
$contact = $_GET['contact'];
$address = $_GET['address'];


	$query="UPDATE `tbl_users` SET `_first_name` = '$firstname', `_middle_name` = '$middlename', `_surname` = '$surname', `_birthday` = '$birthday', `_contact` = '$contact', `_address` = '$address' WHERE `_email` LIKE '$email'";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>