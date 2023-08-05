<?php
require ("../db_connection/myConn.php");
$email = $_GET['email'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$surname = $_GET['surname'];
$birthday = $_GET['birthday'];
$contact = $_GET['contact'];
$address = $_GET['address'];
$password = $_GET['password'];

	$query="INSERT INTO `tbl_users`(`_email`, `_first_name`, `_middle_name`, `_surname`, `_birthday`, `_contact`, `_address`, `_usertype`, `_password`) VALUES ('$email','$firstname','$middlename','$surname','$birthday','$contact','$address','Guest','$password')";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>