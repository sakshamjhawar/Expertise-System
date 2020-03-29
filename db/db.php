<?php
/*define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'college site');
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if(!($con))
		{

			die('could not connect:'.mysql_error());
			//echo "hi1";
		}*/
		
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		if(!($con=mysql_connect('localhost','root','')))
		{
			die('could not connect:'.mysql_error());
		}
?>
