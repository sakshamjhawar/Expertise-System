<?php
	session_start();
	$id = $_SESSION['faculty_id'];
	
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$project_id = mysql_real_escape_string($_POST['project_id']);
		$principal_investigator = mysql_real_escape_string($_POST['principal_investigator']);
		$citation_index = mysql_real_escape_string($_POST['citation_index']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$close_date = mysql_real_escape_string($_POST['close_date']);
		$project_cost = mysql_real_escape_string($_POST['project_cost']);
		$abstract = mysql_real_escape_string($_POST['abstract']);
		$funding_agency = mysql_real_escape_string($_POST['funding_agency']);
		$url = mysql_real_escape_string($_POST['url']);
		
		mysql_query("update project set id = '$id', project_id = '$project_id', principal_investigator = '$principal_investigator', citation_index = '$citation_index', start_date = '$start_date', close_date = '$close_date', project_cost = '$project_cost' , abstract = '$abstract' , funding_agency = '$funding_agency' , url = '$url' where id = '$id' and project_id = '$project_id'");
		
		
		mysql_query("delete from project_associated_departments where id = '$id' and project_id = '$project_id'");
		mysql_query("delete from project_co_investigator where id = '$id' and project_id = '$project_id'");
		$authors = json_decode(stripslashes($_POST['project_associated_departments']));
		$chapters = json_decode(stripslashes($_POST['project_co_investigators']));
		for($i = 1, $p = 1; $i <= $authors[0]; $i++)
		{
			if($authors[$i] == '')
				continue;
			$sql = "INSERT INTO project_associated_departments (id, project_id, department) VALUES ('$id', '$project_id', '$authors[$p]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
			$p++;

		}
		
		for($i = 1, $p = 1; $i <= $chapters[0]; $i++)
		{
			if($chapters[$i] == '')
				continue;
			$sql = "INSERT INTO project_co_investigator (id, project_id, co_investigator) VALUES ('$id', '$project_id', '$chapters[$p]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
			$p++;
		}
		
		mysql_close($con);
	
?>