<?php
require ("../db_connection/myConn.php");
	session_start();
	$email = $_GET['email'];
	$password = $_GET['password'];
	$_status='';		
	$sql = "SELECT `_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_birthday`, `_contact`, `_address`, `_usertype`, `_password`, `_status` FROM `tbl_users` WHERE (`_email` LIKE '$email' ) And (_password LIKE BINARY '$password')  ";
	$result= $con_str->query($sql);

	if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_status =  $row['_status'];
				$_SESSION['_usertype'] = $row["_usertype"];
				$_SESSION['_email'] = $row["_email"];
				$_SESSION['_first_name'] = $row["_first_name"];
				$_SESSION['_middle_name'] = $row["_middle_name"];
				$_SESSION['_surname'] = $row["_surname"];
				$_SESSION['_birthday'] = $row["_birthday"];
				$_SESSION['_contact'] = $row["_contact"];
				$_SESSION['_address'] = $row["_address"];
				$_SESSION['_password'] = $row["_password"];
				$_usertype = $_SESSION['_usertype'];
			}
			if ($_status=='verified'){
				echo $_usertype;	
			}else{
				session_destroy();
				echo 'Your account is not verified! Please check your e-mail!';
			}	
		}else{
			echo 'Invalid e-mail address or password!';
		}

 	
 	$con_str->close();

?>