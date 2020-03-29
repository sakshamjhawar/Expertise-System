<?php
	session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");
		$workshop_id= mysql_real_escape_string($_POST['workshop_id']);
		$workshop_organizing_authority = mysql_real_escape_string($_POST['workshop_organizing_authority']);
		$start_date= mysql_real_escape_string($_POST['start_date']);
		$end_date= mysql_real_escape_string($_POST['end_date']);
		$role= mysql_real_escape_string($_POST['role']);
		$location = mysql_real_escape_string($_POST['location']);
		$workshop_level = mysql_real_escape_string($_POST['workshop_level']);
		$workshop_area = mysql_real_escape_string($_POST['workshop_area']);
		$url = mysql_real_escape_string($_POST['url']);
		$target_audience = mysql_real_escape_string($_POST['target_audience']);

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		mysql_query("update workshop set workshop_organizing_authority = '$workshop_organizing_authority',start_date = '$start_date',end_date= '$end_date', role = '$role', location = '$location', workshop_level='$workshop_level',workshop_area = '$workshop_area',url='$url',target_audience='$target_audience' where workshop_id = '$workshop_id' and id = '$id' ");
			mysql_close($con);
	
?>