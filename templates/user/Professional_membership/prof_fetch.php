<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$membership_number = $_POST['membership_value'];

//query
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM professional_membership where id = '$id' and membership_number = '$membership_number'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
$award_details = array($details['name'], $details['membership_type'], $details['from_date'], $details['to_date']);
foreach($award_details as $a)
    echo $a.",";
?>