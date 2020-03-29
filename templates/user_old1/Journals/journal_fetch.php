<?php
session_start();
$journal_id = $_POST['conference_value'];

//query
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		

		$id = $_SESSION['faculty_id'];
		
		    $result = mysql_query("select * from journal where id = '$id' and journal_id = '$journal_id'");
			$row = mysql_fetch_array($result);
        	$journal_type = $row['journal_type'];
        	$research_area = $row['research_area'];
        	$paper_associated_project = $row['paper_associated_project'];
			$project_name = $row['project_name'];
			$paper_title = $row['paper_title'];
			$journal_name = $row['journal_name'];
			$volume = $row['volume'];
			$issue = $row['issue'];
			$impact_factor = $row['impact_factor'];
			$citation_index = $row['citation index'];
			$from_page = $row['from_page'];
			$to_page = $row['to_page'];
			$abstract = $row['abstract'];
			$keywords = $row['keywords'];
			$url = $row['url'];
			$journal_month = $row['journal_month'];
			$journal_year = $row['journal_year'];

			
			$query = "SELECT * FROM journal_authors where id = '$id' and journal_id = '$journal_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			$authors = "".$n.',';
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$authors = $authors.$r['author_name'];
				else
					$authors = $authors.$r['author_name'].',';
			}
				
			echo $journal_type.';'.$research_area.';'.$paper_associated_project.';'.$project_name.';'.$paper_title.';'.$authors.';'.$volume.';'.$issue.';'.$impact_factor.';'.$citation_index.';'.$from_page.';'.$to_page.';'.$abstract.';'.$keywords.';'.$url.';'.$journal_month.';'.$journal_year.';';		

?>