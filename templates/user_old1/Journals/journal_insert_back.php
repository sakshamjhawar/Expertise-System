<?php
	
		session_start();
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		$id = $_SESSION['faculty_id'];

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(journal_id) from journal where id = '$id'");	
		if(mysql_num_rows($result) == 0)
			$result = 0;
		else
		{
			$result = mysql_fetch_array($result);
			$result = $result['MAX(journal_id)'];
		}
		
		
		$journal_id=(int)$result+1;
        $journal_type = $_POST['journal_type'];
        $project_name = $_POST['project_name'];
        $paper_title = $_POST['paper_title'];
		#$conference_name = $_POST['conference_name'];
		$journal_name = $_POST['journal_name'];
		$from_page = $_POST['from_page'];
		$to_page = $_POST['to_page'];
		$url = $_POST['url'];
		$volume = $_POST['volume'];
		$abstract = $_POST['abstract'];
		$keywords = $_POST['keywords'];
		$paper_associated_project = $_POST['paper_associated_project'];
		$research_area = $_POST['research_area'];
		$issue = $_POST['issue'];
		$impact_factor = $_POST['impact_factor'];
		$citation_index = $_POST['citation_index'];
		//$file = $_POST['file'];
		$journal_month = $_POST['journal_month'];
		$journal_year = $_POST['journal_year'];
		
		
		//$id = $_SESSION['faculty_id'];
		
		$sql="INSERT INTO journal (`id`, `journal_id`, `journal_type`, `research_area`, `paper_associated_project`, `project_name`, `paper_title`, `abstract`, `keywords`, `journal_name`, `volume`, `issue`, `impact_factor`, `citation index`, `url`, `from_page`, `to_page`, `journal_month`, `journal_year`) VALUES('$id', '$journal_id', '$journal_type', '$research_area', '$paper_associated_project', '$project_name', '$paper_title', '$abstract', '$keywords', '$journal_name', '$volume', '$issue', '$impact_factor', '$citation_index', '$url', '$from_page', '$to_page', '$journal_month', '$journal_year')";
		
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		
		
		$authors = json_decode(stripslashes($_POST['authors']));
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
		echo $journal_id;
		mysql_close($con);

?>