<?php
	//session_start();
	session_start();
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$conference_id = $_POST['conference_id'];
        $conference_type = $_POST['conference_type'];
        $project_name = $_POST['project_name'];
        $paper_title = $_POST['paper_title'];
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
		//echo $authors = $_POST['authors'];
		
		mysql_query("update conference set project_name = '$project_name', paper_title = '$paper_title', organizer = '$organizer', from_date = '$from_date', to_date = '$to_date', from_page = '$from_page', to_page = '$to_page', url = '$url', venue = '$venue', abstract = '$abstract', keywords = '$keywords', paper_associated_project = '$paper_associated_project', research_area = '$research_area' where id = '$id' and conference_id = '$conference_id'");
		
		//echo "Vivekrocks";
		
		$authors = json_decode(stripslashes($_POST['authors']));
		mysql_query("delete from conference_authors where id = '$id' and conference_id = '$conference_id'");
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
		
		mysql_close($con);
	
?>