<?php
	//$a = array();
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");
		//echo "hi3";

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	foreach($data as $i)
	{
		if( $result = mysql_query("delete from consultancy_collaboration where consultancy_id = '$i' && id = '$id'") and $result = mysql_query("delete from consultancy_faculty_involved where consultancy_id = '$i' && id = '$id'") and $result = mysql_query("delete from consultancy_student_involved where consultancy_id = '$i' && id = '$id'") and $result = mysql_query("delete from consultancy where consultancy_id = '$i' && id = '$id'"))
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