<?php
	
		session_start();
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		$result = mysql_query("select MAX(faculty_exchange_program_id) from faculty_exchange_program where id = '$id'");	
		$row = mysql_fetch_array($result);
		$result = $row['MAX(faculty_exchange_program_id)'];

		
		$faculty_exchange_program_id=(int)$result+1;
		$institution = mysql_real_escape_string($_POST['institution']);
		$subject = mysql_real_escape_string($_POST['subject']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date = mysql_real_escape_string($_POST['end_date']);
		$ug_pg = mysql_real_escape_string($_POST['ug_pg']);
		$collaboration_type = mysql_real_escape_string($_POST['collaboration_type']);
		$details_of_collaboration = mysql_real_escape_string($_POST['details_of_collaboration']);
		$feedback = mysql_real_escape_string($_POST['feedback']);
		
		
		$sql="INSERT INTO faculty_exchange_program (`id`, `institution`, `subject`, `start_date`, `end_date`, `ug_pg`, `collaboration_type`, `details_of_collaboration`, `feedback`, `faculty_exchange_program_id`) VALUES('$id','$institution','$subject','$start_date','$end_date','$ug_pg','$collaboration_type','$details_of_collaboration','$feedback','$faculty_exchange_program_id')";
		
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		mysql_close($con);

?>