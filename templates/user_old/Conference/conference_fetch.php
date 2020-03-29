<?php
//session_start();
$conference_id = $_POST['conference_value'];

//query
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		
		$id = 'I4iA41flS';
		//$id = $_SESSION['faculty_id'];
		    $result = mysql_query("select * from conference where id = '$id' and conference_id = '$conference_id'");
			$row = mysql_fetch_array($result);
        	$conference_type = $row['conference_type'];
        	$research_area = $row['research_area'];
        	$paper_associated_project = $row['paper_associated_project'];
			$project_name = $row['project_name'];
			$paper_title = $row['paper_title'];
			$organizer = $row['organizer'];
			$from_date = $row['from_date'];
			$to_date = $row['to_date'];
			$venue = $row['venue'];
			$from_page = $row['from_page'];
			$to_page = $row['to_page'];
			$abstract = $row['abstract'];
			$keywords = $row['keywords'];
			$url = $row['url'];

			
			$query = "SELECT * FROM conference_authors where id = '$id' and conference_id = '$conference_id'";
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
				
			echo $conference_type.';'.$research_area.';'.$paper_associated_project.';'.$project_name.';'.$paper_title.';'.$authors.';'.$organizer.';'.$from_date.';'.$to_date.';'.$venue.';'.$from_page.';'.$to_page.';'.$abstract.';'.$keywords.';'.$url.';';		

?>