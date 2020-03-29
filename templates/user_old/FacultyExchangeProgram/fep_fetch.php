<?php
session_start();
$faculty_exchange_program_id = $_POST['faculty_exchange_program_id'];

//query
include("../../../db/db.php");		

if(!mysql_select_db('college site'))
{
	die(mysql_error());
	return false;
}
//$id = 'I4iA41flS';
$id = $_SESSION['faculty_id'];
$query = "SELECT * FROM faculty_exchange_program where id = '$id' and faculty_exchange_program_id = '$faculty_exchange_program_id'";
$result = mysql_query($query);
$details = mysql_fetch_array($result);
$fep_details = array($details['institution'], $details['subject'], $details['start_date'], $details['end_date'], $details['ug_pg'], $details['collaboration_type'], $details['details_of_collaboration'], $details['feedback']);
foreach($fep_details as $a)
    echo $a.",";
?>