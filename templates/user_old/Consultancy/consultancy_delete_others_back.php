<?php
	//$a = array();
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	$i=mysql_real_escape_string($_POST['data']);
	include("../../../db/db.php");
		//echo "hi3";

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
//	$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	
		echo mysql_query("delete from consultancy_collaboration where consultancy_id = '$i' && id = '$id'");
		echo mysql_query("delete from consultancy_faculty_involved where consultancy_id = '$i' && id = '$id'");
		echo mysql_query("delete from consultancy_student_involved where consultancy_id = '$i' && id = '$id'");
		
		
			//echo "record deleted";
		
		
	
  
?>