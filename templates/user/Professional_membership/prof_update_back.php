<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../../db/db.php");
		
		
		
		$membership_number = mysql_real_escape_string($_POST['membership_num']);
		$membership_type = mysql_real_escape_string( $_POST['type']);
		$from_date = mysql_real_escape_string($_POST['from_date']);
		$to_date= mysql_real_escape_string($_POST['to_date']);
		//$additional_information = $_POST['additional_information'];

		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		if(!(mysql_query("update professional_membership set to_date = '$to_date', membership_type = '$membership_type', from_date = '$from_date' where membership_number = '$membership_number' and id = '$id'")))
		      echo 'failed update';
	    else
		       echo '';
			mysql_close($con);
	}
?>