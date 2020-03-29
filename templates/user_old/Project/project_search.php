<?php	
		session_start();
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		
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
		$authors = json_decode(stripslashes($_POST['project_associated_departments']));
		$chapters = json_decode(stripslashes($_POST['project_co_investigators']));
		
		//echo $project_id.','.$principal_investigator;
		
		
		if($project_title == '')
			$project_title = '%';
		if($principal_investigator == '')
			$principal_investigator = '%';
		if($citation_index == '')
			$citation_index = '%';
		if($project_status == '')
			$project_status = '%';
		if($project_cost == '')
			$project_cost = '%';
		if($url == '')
			$url = '%';
		if($abstract == '')
			$abstract = '%';
		if($funding_agency == '')
			$funding_agency = '%';
		if($start_date == '')
			$start_date = '1970-01-01';
		if($close_date == '')
			$close_date = '2999-01-01';
	
		$query="select project_id FROM project where id = '$id'  and  citation_index like '$citation_index' and citation_index like '$citation_index' and principal_investigator like '$principal_investigator' and project_title like '$project_title'  and  project_status like '$project_status' and project_cost like '$project_cost' and abstract like '$abstract' and url like '$url' and funding_agency like '$funding_agency' and start_date >= '$start_date' and  start_date <= '$close_date' and close_date >= '$start_date' and  close_date <= '$close_date'";
		$result = mysql_query($query);		
	
		
		//$project_id_array = array();
		
		//print_r( mysql_fetch_array($result));
		$num = mysql_num_rows($result);
		//echo $num;
		for($i = 0; $i < $num; $i++){
			$project_id = mysql_fetch_array($result);
			//$project_id = $project_id['project_id'];
			$project_id_array[$i] = $project_id['project_id'];
		}
		
		
		if($authors[0] != 0)
		{
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
					$query = "select * from project_associated_departments where id = '$id' and project_id = '$project_id_array[$j]' and department = '$authors[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	$project_id_array[$p] = $project_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		
		//echo $num;
		//print_r($project_id_array);
		if($chapters[0] != 0)
		{
			$p = $num;
			for($i = 1; $i <= $chapters[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($chapters[$i] == '')	
				{	
					$p = $num;
					continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					$query = "select * from project_co_investigator where id = '$id' and project_id = '$project_id_array[$j]' and co_investigator = '$chapters[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	
						$project_id_array[$p] = $project_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		
		
		for ($i = 0; $i < $num; $i++){
        	$result = mysql_query("select * from project where id = '$id' and project_id = '$project_id_array[$i]'");
			$row = mysql_fetch_array($result);
        	$project_id = $row['project_id'];
        	$project_title = $row['project_title'];
        	$principal_investigator = $row['principal_investigator'];
        	$citation_index = $row['citation_index'];
			$project_status = $row['project_status'];
			$project_cost = $row['project_cost'];
			$abstract = $row['abstract'];
			$start_date = $row['start_date'];
			$close_date = $row['close_date'];
			$funding_agency = $row['funding_agency'];
			$url = $row['url'];
		
      
			$authors = "";
			$chapters = "";
			$query = "SELECT * FROM project_associated_departments where id = '$id' and project_id = '$project_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$authors = $authors.$r['department'];
				else
					$authors = $authors.$r['department'].', ';
			}
		
			$query = "SELECT * FROM project_co_investigator where id = '$id' and project_id = '$project_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$chapters = $chapters.$r['co_investigator'];
				else
					$chapters = $chapters.$r['co_investigator'].', ';
			}
			
			echo $project_id.';'.$project_title.';'.$principal_investigator.';'.$citation_index.';'.$start_date.';'.$close_date.';'.$project_status.';'.$authors.';'.$chapters.';'.$project_cost.';'.$abstract.';'.$funding_agency.';'.$url.';';		

		}
		mysql_close($con);
?>