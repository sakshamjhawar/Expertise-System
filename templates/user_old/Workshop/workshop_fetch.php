<?php
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");
		$workshop_id = mysql_real_escape_string($_POST['workshop_value']);
		if(!mysql_select_db('college site'))
		{
			die("Some problem occured. Please try again later.");
			return false;
		}
		$query = "SELECT * FROM workshop where id = '$id' and workshop_id = '$workshop_id'";
    	
		if(!($result = mysql_query($query)))
		{
			echo "Some problem occured. Please try again later.";
			return;
		}
    	
		$details = mysql_fetch_array($result);
		
$award_details = array($details['workshop_title'],$details['workshop_organizing_authority'],$details['start_date'],$details['end_date'], $details['role'],$details['location'], $details['workshop_level'],$details['workshop_area'], $details['url'], $details['target_audience']);
foreach($award_details as $a)
    echo $a.",";
?>