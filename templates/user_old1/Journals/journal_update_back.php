<?php
	session_start();	
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		$id = $_SESSION['faculty_id'];
		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$journal_id = $_POST['journal_id'];
        $journal_type = $_POST['journal_type'];
        $project_name = $_POST['project_name'];
        $paper_title = $_POST['paper_title'];
		$volume = $_POST['volume'];
		$issue = $_POST['issue'];
		$from_page = $_POST['from_page'];
		$to_page = $_POST['to_page'];
		$url = $_POST['url'];
		$impact_factor = $_POST['impact_factor'];
		$citation_index = $_POST['citation_index'];
		$abstract = $_POST['abstract'];
		$keywords = $_POST['keywords'];
		$paper_associated_project = $_POST['paper_associated_project'];
		$research_area = $_POST['research_area'];
		$journal_month = $_POST['journal_month'];
		$journal_year = $_POST['journal_year'];
		//echo $authors = $_POST['authors'];
		$quer="update journal set project_name = '$project_name', journal_type = '$journal_type',paper_title = '$paper_title', volume = '$volume',  issue = '$issue',from_page = '$from_page'   ,   to_page = '$to_page',   url = '$url',   impact_factor = '$impact_factor', abstract = '$abstract', keywords = '$keywords', paper_associated_project = '$paper_associated_project',  `citation index` = '$citation_index' ,journal_month = '$journal_month', journal_year = '$journal_year', research_area = '$research_area' where id = '$id' and journal_id = '$journal_id'";
		
		$x=mysql_query($quer);
		//echo "Vivekrocks";
		
		$authors = json_decode(stripslashes($_POST['authors']));
		mysql_query("delete from journal_authors where id = '$id' and journal_id = '$journal_id'");
		for($i = 1, $p = 1; $i <= $authors[0]; $i++)
		{
			if($authors[$i] == '')
				continue;
			$sql = "INSERT INTO journal_authors (id, journal_id, author_name) VALUES ('$id', '$journal_id', '$authors[$p]')";
				if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
			$p++;

		}
		
		mysql_close($con);
	
?>