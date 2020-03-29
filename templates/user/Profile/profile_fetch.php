<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$aid = $_POST['profile_value'];


//query
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM profile where id = '$id' and qualification = '$aid'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
		if($details['join_month']<10)
		{
				$join_year= implode("-",array( $details['join_year'],"0".$details['join_month']));
		}
		else
		{
			$join_year= implode("-",array( $details['join_year'],$details['join_month']));
		}
		if($details['pass_month']<10)
		{
				$pass_year= implode("-",array( $details['pass_year'],"0".$details['pass_month']));
		}
		else
		{
			$pass_year= implode("-",array( $details['pass_year'],$details['pass_month']));
		}
$award_details = array($details['qualification'],$details['institution'], $details['location'],$details['university'],$join_year,$pass_year, $details['percentage'],$details['class1']);
foreach($award_details as $a)
    echo $a.",";
?>