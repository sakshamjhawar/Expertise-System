<?php
session_start();
$consultancy_id = $_POST['consultancy_value'];
error_reporting(E_ALL ^ E_DEPRECATED);

//query
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM consultancy where id = '$id' and consultancy_id = '$consultancy_id'";
    	$result = mysql_query($query);
    	$details = mysql_fetch_array($result);
$award_details = array($details['work_title'], $details['start_date'], $details['end_date'], $details['revenue_generated'], $details['summary'], $details['labs_allocated'], $details['url']);
foreach($award_details as $a)
    echo $a.";";
	$query_collaboration = "SELECT collaborator_name FROM consultancy_collaboration WHERE consultancy_id='$consultancy_id' and id= '$id'";
 		$result_collaboration = mysql_query($query_collaboration);
		$num_collaboration= mysql_num_rows($result_collaboration);
		echo $num_collaboration.";";
		for($j=0;$j<$num_collaboration;$j++)
		{
			$row_collaboration = mysql_fetch_array($result_collaboration);
			echo $row_collaboration['collaborator_name'].";";
		}
		$query_faculty = "SELECT faculty_name FROM consultancy_faculty_involved WHERE consultancy_id='$consultancy_id' and id='$id'";
		
 		$result_faculty = mysql_query($query_faculty);
		$num_faculty= mysql_num_rows($result_faculty);
		echo $num_faculty.";";
		for($j=0;$j<$num_faculty;$j++)
		{
			$row_faculty = mysql_fetch_array($result_faculty);
			echo $row_faculty['faculty_name'].";";
		}
		
		$query_student = "SELECT student_usn FROM consultancy_student_involved WHERE consultancy_id='$consultancy_id' and id='$id'";
		
 		$result_student = mysql_query($query_student);
		$num_student= mysql_num_rows($result_student);
		echo $num_student.";";
		for($j=0;$j<$num_student;$j++)
		{
			$row_student = mysql_fetch_array($result_student);
			echo $row_student['student_usn'].";";
		}
?>