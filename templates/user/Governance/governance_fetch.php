<?php
session_start();
$governance_id = $_POST['governance_id'];

//query
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM governance where id = '$id' and governance_id = '$governance_id'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
$governance_details = array($details['name_of_committee'], $details['status_of_committee'], $details['served_from'], $details['served_to'], $details['role'], $details['responsibility']);
foreach($governance_details as $a)
    echo $a."|";
?>