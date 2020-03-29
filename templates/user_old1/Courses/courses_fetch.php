<?php
session_start();
$course_id = $_POST['course_id'];

//query
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM courses_taught where id = '$id' and course_id = '$course_id'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
$fep_details = array($details['academic_year'], $details['number_of_students'], $details['pass_percent']);
foreach($fep_details as $a)
    echo $a.",";
?>