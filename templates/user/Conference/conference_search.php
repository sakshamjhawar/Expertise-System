<?php	
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");	

		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
			
		$conference_id = $_POST['conference_id'];
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
		$authors = $_POST['authors'];
		
		
		
		//echo $book_id.','.$book_or_chapter;
		
		if($conference_id == '')
			$conference_id = '%';
		if($conference_type == '')
			$conference_type = '%';
		if($project_name == '')
			$project_name = '%';
		if($paper_title == '')
			$paper_title = '%';
		if($conference_name == '')
			$conference_name = '%';
		if($organizer == '')
			$organizer = '%';
		if($url == '')
			$url = '%';
		if($venue == '')
			$venue = '%';
		$abstract = '%'.$abstract.'%';
		$keywords = '%'.$keywords.'%';
		if($paper_associated_project == '')
			$paper_associated_project = '%';
		if($research_area == '')
			$research_area = '%';
		if($from_page == '')
			$from_page = 0;
		if($to_page == '')
			$to_page = 100000;
		if($from_date == '')
			$from_date = '1970-01-01';
		if($to_date == '')
			$to_date = '2999-01-01';
	
		
		$result = mysql_query("select conference_id FROM conference where id = '$id' and conference_id like '$conference_id' and  conference_type like '$conference_type' and project_name like '$project_name' and paper_title like '$paper_title' and  conference_name like '$conference_name' and organizer like '$organizer' and url like '$url' and from_date >= '$from_date' and  to_date <= '$to_date' and venue like '$venue' and paper_associated_project like '$paper_associated_project' and research_area like '$research_area' and from_page >= '$from_page' and to_page <= '$to_page' and abstract like '$abstract' and keywords like '$keywords'");		
	
		
		$conference_id_array = array();
		
		//print_r( mysql_fetch_array($result));
		$num = mysql_num_rows($result);
		//echo $num;
		for($i = 0; $i < $num; $i++){
			$conference_id = mysql_fetch_array($result);
			//$book_id = $book_id['book_id'];
			$conference_id_array[$i] = $conference_id['conference_id'];
		}
		$authors = json_decode(stripslashes($_POST['authors']));
		//print_r($conference_id);
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
					$query = "select * from conference_authors where id = '$id' and conference_id = '$conference_id_array[$j]' and author_name = '$authors[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	
						//echo "found";
						$conference_id_array[$p] = $conference_id_array[$j];
						$p++;
						
					}
				}
			}
			//echo "ppp".$p;
			$num = $p;
			//}
		}
		
		//print_r($conference_id);
		//echo $num;
		//print_r($book_id_array);
		
		
		for ($i = 0; $i < $num; $i++){
        	$result = mysql_query("select * from conference where id = '$id' and conference_id = '$conference_id_array[$i]'");
			$row = mysql_fetch_array($result);
        	$conference_id = $row['conference_id'];
        	$conference_type = $row['conference_type'];
			$research_area = $row['research_area'];
        	$project_name = $row['project_name'];
       	 	$paper_title = $row['paper_title'];
			$conference_name = $row['conference_name'];
			$organizer = $row['organizer'];
			$from_date = $row['from_date'];
			$to_date = $row['to_date'];
			$from_page = $row['from_page'];
			$to_page = $row['to_page'];
			$url = $row['url'];
		
      
			$authors = "";
			$query = "SELECT * FROM conference_authors where id = '$id' and conference_id = '$conference_id'";
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
		
			
			echo $conference_id.';'.$conference_type.';'.$research_area.';'.$project_name.';'.$paper_title.';'.$authors.';'.$conference_name.';'.$organizer.';'.$from_date.';'.$to_date.';'.$from_page.'-'.$to_page.';'.$url.';';		

		}
		mysql_close($con);
?>