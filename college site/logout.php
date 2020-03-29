<?php
	session_start();
	if(isset($_SESSION['uname']))
	{	
		unset($_SESSION['uname']);
	}
	session_destroy();
	echo "Please wait.....";
	echo '<script type="text/javascript">alert("You have been logged out");</script>';
	header('Location: http://localhost/modified/login.php');

?>