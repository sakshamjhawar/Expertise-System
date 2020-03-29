<?php
	//$a = array();
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{
		if($result = mysql_query("delete from faculty_exchange_program where faculty_exchange_program_id = '$i' && id = '$id'"))
		{
			//echo "record deleted";
		}
		else
		{
				echo mysql_error();
				$flag = 1;
		}
		
	}
	if(!$flag)
		echo "Records deleted";

  
?>