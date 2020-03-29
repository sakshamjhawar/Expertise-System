<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../../db/db.php");
		$faculty_exchange_program_id =mysql_real_escape_string( $_POST['faculty_exchange_program_id']);
		$subject =mysql_real_escape_string( $_POST['subject']);
		$start_date =mysql_real_escape_string( $_POST['start_date']);
		$end_date =mysql_real_escape_string( $_POST['end_date']);
		$ug_pg =mysql_real_escape_string( $_POST['ug_pg']);
		$collaboration_type =mysql_real_escape_string( $_POST['collaboration_type']);
		$details_of_collaboration =mysql_real_escape_string( $_POST['details_of_collaboration']);
		$feedback =mysql_real_escape_string( $_POST['feedback']);

		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		mysql_query("update faculty_exchange_program set subject = '$subject', start_date = '$start_date', end_date = '$end_date', ug_pg = '$ug_pg', collaboration_type = '$collaboration_type', details_of_collaboration = '$details_of_collaboration', feedback = '$feedback' where faculty_exchange_program_id = '$faculty_exchange_program_id' and id = '$id' ");
			mysql_close($con);
	}
?>