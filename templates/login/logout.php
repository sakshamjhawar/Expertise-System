<?php
	session_start();
	if(isset($_SESSION['uname']))
	{	
		unset($_SESSION['uname']);
	}
	session_destroy();
	echo "Please wait.....";
	echo '<script>alert("You have been logged out");</script>';
	header('Location: login.php');

?>