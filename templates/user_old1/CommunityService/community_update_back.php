<?php
	//session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		
		$community_id = $_POST['community_id'];
		$role = $_POST['role'];
		$location = $_POST['location'];
		$date_of_event = $_POST['date_of_event'];
		$url = $_POST['url'];
		$additional_information = $_POST['additional_information'];
		
		//echo $additional_information;

		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		mysql_query("update communityuser set url = '$url', role = '$role', date_of_event = '$date_of_event', location = '$location', additional_information = '$additional_information' where community_user_id = '$community_id' and id = '$id' ");
			mysql_close($con);
	}
?>