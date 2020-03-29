<?php
	//$a = array();
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{
		if($result = mysql_query("delete from communityuser where community_user_id = '$i' and id = '$id'"))
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