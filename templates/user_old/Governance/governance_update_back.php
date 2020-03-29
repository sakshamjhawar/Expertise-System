<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		
		$governance_id = mysql_real_escape_string($_POST['governance_id']);
		$status_of_committee = mysql_real_escape_string($_POST['status_of_committee']);
		$served_from = mysql_real_escape_string($_POST['served_from']);
		$served_to = mysql_real_escape_string($_POST['served_to']);
		$role = mysql_real_escape_string($_POST['role']);
		$responsibility = mysql_real_escape_string($_POST['responsibility']);
		
		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		mysql_query("update governance set status_of_committee = '$status_of_committee', served_from = '$served_from', served_to = '$served_to',  role = '$role', responsibility = '$responsibility' where governance_id = '$governance_id' and id = '$id' ");
			mysql_close($con);
	}
?>