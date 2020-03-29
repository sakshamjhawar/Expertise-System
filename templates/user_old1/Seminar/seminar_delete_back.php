<?php
	$data = json_decode(stripslashes(mysql_real_escape_string($_POST['data'])));
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../../db/db.php");

	if(!mysql_select_db('college site'))
			echo mysql_error();
	
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{
		if(!($result = mysql_query("delete from seminar where seminar_id = '$i' && id = '$id'")))
		{
			echo "Some problem occured. Please try again later.";
			return;
		}
		
	}

	echo "Records deleted";

  
?>