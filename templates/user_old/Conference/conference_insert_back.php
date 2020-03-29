<?php
	
		//session_start();
		session_start();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(conference_id) from conference where id = '$id'");	
		if(mysql_num_rows($result) == 0)
			$result = 0;
		else
		{
			$result = mysql_fetch_array($result);
			$result = $result['MAX(conference_id)'];
		}
		
		
		$conference_id=(int)$result+1;
        $conference_type = $_POST['conference_type'];
        $project_name = $_POST['project_name'];
        $paper_title = $_POST['paper_title'];
		$conference_name = $_POST['conference_name'];
		$organizer = $_POST['organizer'];
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$from_page = $_POST['from_page'];
		$to_page = $_POST['to_page'];
		$url = $_POST['url'];
		$venue = $_POST['venue'];
		$abstract = $_POST['abstract'];
		$keywords = $_POST['keywords'];
		$paper_associated_project = $_POST['paper_associated_project'];
		$research_area = $_POST['research_area'];
		
		
		
		
		$sql="INSERT INTO conference (id, conference_id, conference_type, research_area, paper_associated_project, project_name, conference_name, organizer, from_date, to_date, venue, abstract, keywords, url, from_page, to_page, paper_title ) VALUES('$id', '$conference_id', '$conference_type', '$research_area', '$paper_associated_project', '$project_name', '$conference_name', '$organizer', '$from_date', '$to_date', '$venue', '$abstract', '$keywords', '$url', '$from_page', '$to_page', '$paper_title')";
		
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
		
		
		$authors = json_decode(stripslashes($_POST['authors']));
		for($i = 1, $p = 1; $i <= $authors[0]; $i++)
		{
			if($authors[$i] == '')
				continue;
			$sql = "INSERT INTO conference_authors (id, conference_id, author_name) VALUES ('$id', '$conference_id', '$authors[$p]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
			$p++;

		}
		echo $conference_id;
		mysql_close($con);

?>