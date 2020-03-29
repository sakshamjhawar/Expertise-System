<?php
	//$a = array();
	session_start();
	//$id = 'I4iA41flS';
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{
		if($result = mysql_query("delete from book where book_id = '$i' and id = '$id'"))
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