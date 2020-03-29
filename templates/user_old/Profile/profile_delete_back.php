<?php
	//$a = array();
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	include("../../db.php");

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{
		if($result = mysql_query("delete from profile where id = '$id' and qualification='$i' "))
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