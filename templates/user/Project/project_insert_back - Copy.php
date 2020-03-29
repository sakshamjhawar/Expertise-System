<?php
	
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		
		$id = $_SESSION['faculty_id'];
		if(!mysql_select_db('college site'))
			echo mysql_error();
	
		$result = mysql_query("select MAX(project_id) from project where id = '$id'");	
		
		
		if(mysql_num_rows($result) == 0)
			$result = 0;
		else
		{
			$result = mysql_fetch_array($result);
			$result = $result['MAX(project_id)'];
		}
	
		
		$project_id=(int)$result+1;
		$project_title = mysql_real_escape_string($_POST['project_title']);
		$principal_investigator = mysql_real_escape_string($_POST['principal_investigator']);
		$citation_index = mysql_real_escape_string($_POST['citation_index']);
		$project_status = mysql_real_escape_string($_POST['project_status']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$close_date = mysql_real_escape_string($_POST['close_date']);
		$project_cost = mysql_real_escape_string($_POST['project_cost']);
		$abstract = mysql_real_escape_string($_POST['abstract']);
		$funding_agency = mysql_real_escape_string($_POST['funding_agency']);
		$url = mysql_real_escape_string($_POST['url']);
		
		
		$sql="INSERT INTO project (id, project_id, project_title, principal_investigator, citation_index, project_status, start_date, close_date, project_cost, abstract, funding_agency, url) VALUES('$id','$project_id', '$project_title', '$principal_investigator', '$citation_index','$project_status','$start_date','$close_date', '$project_cost', '$abstract', '$funding_agency', '$url')";
		
		
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
		
		
		$project_associated_departments = json_decode(stripslashes($_POST['project_associated_departments']));
		$project_co_investigators = json_decode(stripslashes($_POST['project_co_investigators']));
		for($i = 1, $p = 1; $i <= $project_associated_departments[0]; $i++)
		{
			if($project_associated_departments[$i] == '')
				continue;
			$sql = "INSERT INTO project_associated_departments (id, project_id, department) VALUES ('$id', '$project_id', '$project_associated_departments[$p]')";
			if(!mysql_query($sql))
			{
				die('error:'.mysql_error());
			}
			$p++;

		}
		
		for($i = 1, $p = 1; $i <= $project_co_investigators[0]; $i++)
		{
			if($project_co_investigators[$i] == '')
				continue;
			$sql = "INSERT INTO project_co_investigator (id, project_id, co_investigator) VALUES ('$id', '$project_id', '$project_co_investigators[$p]')";
			if(!mysql_query($sql))
			{
				die('error:'.mysql_error());
			}
			$p++;
		}
		mysql_close($con);

?>