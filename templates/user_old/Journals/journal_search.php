<?php	
		session_start();
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);		

		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
			
		$journal_id = $_POST['journal_id'];
        $journal_type = $_POST['journal_type'];
        $project_name = $_POST['project_name'];
        $paper_title = $_POST['paper_title'];
		$journal_name = $_POST['journal_name'];
		$volume = $_POST['volume'];
		$from_page = $_POST['from_page'];
		$to_page = $_POST['to_page'];
		$url = $_POST['url'];
		$issue = $_POST['issue'];
		$abstract = $_POST['abstract'];
		$keywords = $_POST['keywords'];
		$paper_associated_project = $_POST['paper_associated_project'];
		$research_area = $_POST['research_area'];
		$authors = $_POST['authors'];
		$impact_factor = $_POST['impact_factor'];
		$citation_index = $_POST['citation_index'];
		$journal_month = $_POST['journal_month'];
		$journal_year = $_POST['journal_year'];
		
		
		
		//echo $book_id.','.$book_or_chapter;
		
		if($journal_id == '')
			$journal_id = '%';
		if($journal_type == '')
			$journal_type = '%';
		if($project_name == '')
			$project_name = '%';
		if($paper_title == '')
			$paper_title = '%';
		if($journal_name == '')
			$journal_name = '%';
		if($volume == '')
			$volume = '%';
		if($url == '')
			$url = '%';
		if($issue == '')
			$issue = '%';
		$abstract = '%'.$abstract.'%';
		$keywords = '%'.$keywords.'%';
		if($paper_associated_project == '')
			$paper_associated_project = '%';
		if($research_area == '')
			$research_area = '%';
		if($impact_factor == '')
			$impact_factor = '%';
		if($citation_index == '')
			$citation_index = '%';
		if($journal_month == '')
			$journal_month = '%';
		if($journal_year == '')
			$journal_year = '%';
		if($from_page == '')
			$from_page = 0;
		if($to_page == '')
			$to_page = 100000;
	
		
		$result = mysql_query("select journal_id FROM journal where id = '$id' and journal_id like '$journal_id' and  journal_type like '$journal_type' and project_name like '$project_name' and paper_title like '$paper_title' and  journal_name like '$journal_name' and volume like '$volume' and url like '$url' and issue like '$issue' and paper_associated_project like '$paper_associated_project' and research_area like '$research_area' and from_page >= '$from_page' and to_page <= '$to_page' and abstract like '$abstract' and keywords like '$keywords' and impact_factor like '$impact_factor' and `citation index` like '$citation_index' and journal_month like '$journal_month' and journal_year like '$journal_year'");		
	
		
		$journal_id_array = array();
		
		//print_r( mysql_fetch_array($result));
		$num = mysql_num_rows($result);
		//echo $num;
		for($i = 0; $i < $num; $i++){
			$journal_id = mysql_fetch_array($result);
			//$book_id = $book_id['book_id'];
			$journal_id_array[$i] = $journal_id['journal_id'];
		}
		$authors = json_decode(stripslashes($_POST['authors']));
		//print_r($journal_id);
		//print_r($authors);
		
	//	echo "outside".$authors[0];
		if($authors[0] != 0)
		{
			//echo "world";
			$p = $num;
			for($i = 1; $i <= $authors[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($authors[$i] == '')	
				{
						$p = $num;
						continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					//echo "insidehi";
					$query = "select * from journal_authors where id = '$id' and journal_id = '$journal_id_array[$j]' and author_name = '$authors[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	
						//echo "found";
						$journal_id_array[$p] = $journal_id_array[$j];
						$p++;
						
					}
				}
			}
			//echo "ppp".$p;
			$num = $p;
			//}
		}
		
		//print_r($journal_id);
		//echo $num;
		//print_r($book_id_array);
		
		
		for ($i = 0; $i < $num; $i++){
        	$result = mysql_query("select * from journal where id = '$id' and journal_id = '$journal_id_array[$i]'");
			$row = mysql_fetch_array($result);
        	$journal_id = $row['journal_id'];
        	$journal_type = $row['journal_type'];
			$research_area = $row['research_area'];
        	$project_name = $row['project_name'];
       	 	$paper_title = $row['paper_title'];
			$journal_name = $row['journal_name'];
			$volume = $row['volume'];
			$paper_associated_project = $row['paper_associated_project'];
			$from_page = $row['from_page'];
			$to_page = $row['to_page'];
			$issue = $row['issue'];
			$impact_factor = $row['impact_factor'];
			$citation_index = $row['citation index'];
			$journal_month = $row['journal_month'];
			$journal_year = $row['journal_year'];
			$url = $row['url'];
			$abstract = $row['abstract'];
			$keywords = $row['keywords'];
		
      
			$authors = "";
			$query = "SELECT * FROM journal_authors where id = '$id' and journal_id = '$journal_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$authors = $authors.$r['author_name'];
				else
					$authors = $authors.$r['author_name'].', ';
			}
		
			
			echo $journal_id.';'.$journal_type.';'.$research_area.';'.$paper_associated_project.';'.$project_name.';'.$paper_title.';'.$authors.';'.$journal_name.';'.$volume.';'.$issue.';'.$keywords.';'.$abstract.';'.$from_page.';'.$to_page.';'.$url.';'.$impact_factor.';'.$citation_index.';'.$journal_month.';'.$journal_year.';';		

		}
		mysql_close($con);
?>