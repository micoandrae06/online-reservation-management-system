<?php
require ("../../db_connection/myConn.php");
$email = $_GET['email'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$surname = $_GET['surname'];
$birthday = $_GET['birthday'];
$contact = $_GET['contact'];
$address = $_GET['address'];

$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

$password = $rand;

	$query="INSERT INTO `tbl_users`(`_email`, `_first_name`, `_middle_name`, `_surname`, `_birthday`, `_contact`, `_address`, `_usertype`, `_password`,`_status`) VALUES ('$email','$firstname','$middlename','$surname','$birthday','$contact','$address','Frontdesk','$password','verified')";
					if(mysqli_query($con_str,$query)){
					echo '200';	
					}
?>