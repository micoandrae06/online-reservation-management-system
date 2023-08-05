<?php
require ("../db_connection/myConn.php");

$email = $_GET['email']; 
$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

$new_password = $rand;

$apiresponse='';

	$query="UPDATE `tbl_users` SET `_password` = '$new_password' WHERE `_email` LIKE '$email'";
					if(mysqli_query($con_str,$query)){

				
						$apiresponse = "200";
					}
		

	echo $apiresponse;



?>

