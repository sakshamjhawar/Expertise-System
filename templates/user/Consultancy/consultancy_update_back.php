<?php
	
		session_start();
		include("../../../db/db.php");
		//$id = 'I4iA41flS';
		error_reporting(E_ALL ^ E_DEPRECATED);
		if(!($con))
		{

			die('could not connect:'.mysql_error());
			//echo "hi1";
		}
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
	$id = $_SESSION['faculty_id'];
		
		$consultancy_id=mysql_real_escape_string($_POST['consultancy_id']);
		$work_title =mysql_real_escape_string( $_POST['work_title']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date = mysql_real_escape_string($_POST['end_date']);
		$revenue_generated = mysql_real_escape_string($_POST['revenue_generated']);
		$summary =mysql_real_escape_string( $_POST['summary']);
		$labs_allocated =mysql_real_escape_string( $_POST['labs_allocated']);
		$url =mysql_real_escape_string( $_POST['url']);
		//
		
		$sql="UPDATE `consultancy` SET `work_title`='$work_title',`start_date`='$start_date',`end_date`='$end_date',`revenue_generated`='$revenue_generated',`summary`='$summary',`labs_allocated`='$labs_allocated',`url`='$url' WHERE `consultancy_id`='$consultancy_id' and `id`='$id' ";
		
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		
		
		$collaborations = json_decode(stripslashes($_POST['collaborations_jsonstring']));
		$facultys = json_decode(stripslashes($_POST['facultys_jsonstring']));
		$students = json_decode(stripslashes($_POST['students_jsonstring']));
		for($i = 1; $i <= $facultys[0]; $i++)
		{
			$sql = "INSERT INTO `consultancy_faculty_involved`(`id`, `consultancy_id`, `faculty_name`) VALUES ('$id', '$consultancy_id', '$facultys[$i]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}

		}
		
		for($i = 1; $i <= $collaborations[0]; $i++)
		{
			$sql = "INSERT INTO `consultancy_collaboration`(`id`, `consultancy_id`, `collaborator_name`) VALUES ('$id', '$consultancy_id', '$collaborations[$i]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
		}
		for($i = 1; $i <= $students[0]; $i++)
		{
			$sql = "INSERT INTO `consultancy_student_involved`(`id`, `consultancy_id`, `student_usn`) VALUES ('$id', '$consultancy_id', '$students[$i]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}

		}
		mysql_close($con);

?>