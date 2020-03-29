<?php
	//$a = array();
	session_start();
	include("../../../db/db.php");
	error_reporting(E_ALL ^ E_DEPRECATED);
	$id = $_SESSION['faculty_id'];
	
	$data = json_decode(stripslashes($_POST['data']));


		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	foreach($data as $i)
	{
		if($result =mysql_query("delete from journal_authors where journal_id = '$i' and id = '$id'") and mysql_query("delete from journal where journal_id = '$i' and id = '$id'"))
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