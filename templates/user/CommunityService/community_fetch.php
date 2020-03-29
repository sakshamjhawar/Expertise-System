<?php
//session_start();
$community_id = $_POST['community_value'];

//query
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM communityuser where id = '$id' and community_user_id = '$community_id'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
$award_details = array($details['role'], $details['location'], $details['date_of_event'], $details['url'], $details['additional_information']);
foreach($award_details as $a)
    echo $a.",";
?>