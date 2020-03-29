<?php
	$email = $_GET['q'];
	if($email == ""){
		echo "";
	}
	else {
		include '../college site/db.php';
		if(!mysql_select_db('college site'))
		{
			echo mysql_error();
			return;
		}
		$query_verify_email = "SELECT * FROM users WHERE email ='$email'";
		if (!($verified_email = mysql_query($query_verify_email))) {
			echo '<script type="text/javascript">alert("System Error. Please try again later.")</script>';
		}
		else {
			echo '<script type="text/javascript">alert("queried db.")</script>';
		}
		if (mysql_num_rows($verified_email) != 0){
			echo "Email already taken.";
		}
		mysql_close($con);
	}
?>