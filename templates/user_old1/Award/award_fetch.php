<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$aid = $_POST['award_value'];

//query
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		$query = "SELECT * FROM award where id = '$id' and award_id = '$aid'";
    	$result = mysql_query($query);
		if(!$result)
		{
			return;	
		}
		else
		{
    	$details = mysql_fetch_array($result);
$award_details = array($details['award_agency'], $details['award_date'], $details['url'], $details['remark'], $details['award_id']);
foreach($award_details as $a)
    echo $a."|";
		}
?>