<?php
session_start();
//$community_id = $_POST['profile_value'];

//query
		include("../../db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM profile where id = '$id'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
$award_details = array($details['qualification'],$details['institution'], $details['location'],$details['university'], $details['join_month'], $details['join_year'],$details['pass_year'], $details['percentage'],$details['class1']);
foreach($award_details as $a)
    echo $a.",";
?>