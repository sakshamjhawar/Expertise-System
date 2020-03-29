<?php
	
		include("../../db/db.php");
		include '../login/config.php';
		error_reporting(E_ALL ^ E_DEPRECATED);

		if(!mysql_select_db('college site'))
			echo mysql_error();

		$email = trim(mysql_escape_string($_GET['email']));

		$key = trim(mysql_escape_string($_GET['key']));
		
		$query_verify_email = "SELECT * FROM users WHERE email ='$email' and status = '1'";
		$result_verify_email = mysql_query($query_verify_email);
		
		if (mysql_num_rows($result_verify_email) == 1)
		{
			echo '<script type="text/javascript">alert("Your Account already exists.");</script>';
			echo '<div>Your Account already exists. Please <a href="../../templates/login/login.php">Login.</a></div>';
		}
		else
		{
			if (isset($email) && isset($key))
			{
				$query_update_users = "UPDATE users SET status='1' WHERE email ='".$email."' AND hash='".$key."' " ;

				if(mysql_query($query_update_users)){
					$row = mysql_fetch_array($result_verify_email);
					$id = $row['id'];
					$query_add_user = "INSERT into users_counts(id) values(".$id.")";
					if(!mysql_query($query_add_user)){
						echo '<script type="text/javascript">alert("Some problem occured");</script>';
						return ;
					}
					echo '<script type="text/javascript">alert("Your account has been activated. You can now login to your account.");
						window.location("http://" + $serverIP + "/FacultyManagementSystem/templates/login/login.php");
						</script>';
					echo '<div>Your Account has been activated. Please <a href="../../templates/login/login.php">Login Here</a></div>';
				}
				else {
					echo '<script type="text/javascript">alert("Account could not be activated");</script>';
					 die(mysql_error());
				}
// 				$query_verify_email1 = "SELECT * FROM users WHERE email ='$email'";
// 				$result_verify_email1 = mysql_query($query_verify_email);
// 				$row = mysql_fetch_array($result_verify_email1);
// 				$id = $row['id'];
// 				$username = $row['email'];
// 				$password = $row['password'];
// 				if(mysql_query("insert into login values ('$id','$username','$password')"))
// 				{
					
// 				}
// 				else
// 				{
// 					
// 				}
			}
			mysql_close($con);
		}
?>