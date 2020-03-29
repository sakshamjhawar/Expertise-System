<?php
	//$a = array();
	//session_start();
	session_start();
		
		//$id = 'I4iA41flS';
	include("../../../db/db.php");
	$data = json_decode(stripslashes($_POST['data']));
	

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{	
		if($result = mysql_query("delete from conference where conference_id = '$i' and id = '$id'"))
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