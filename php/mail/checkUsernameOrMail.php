<?php
	$email = $_GET['q'];
	if($email == ""){
		echo "";
	}
	else {
		include '../../db/db.php';
		if(!mysql_select_db('college site'))
		{
			echo mysql_error();
			return;
		}
		$query_verify_email = "SELECT * FROM users WHERE email = '$email' or id = '$email'";
		if (!($verified_email = mysql_query($query_verify_email))) {
			echo '<script type="text/javascript">alert("System Error. Please try again later.")</script>';
		}
		if (mysql_num_rows($verified_email) == 0){
			echo "Username or Email is not registered.";
		}
		else {
			echo "";
		}
		mysql_close($con);
	}
?>