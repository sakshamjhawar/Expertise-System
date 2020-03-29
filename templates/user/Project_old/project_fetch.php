<?php
session_start();
$project_id = $_POST['project_value'];

//query
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		    $result = mysql_query("select * from project where id = '$id' and project_id = '$project_id'");
			$row = mysql_fetch_array($result);
        	$project_id = $row['project_id'];
        	$principal_investigator = $row['principal_investigator'];
        	$citation_index = $row['citation_index'];
        	$project_status = $row['project_status'];
			$start_date = $row['start_date'];
			$close_date = $row['close_date'];
			
			$project_cost = $row['project_cost'];
			$abstract = $row['abstract'];
			$funding_agency = $row['funding_agency'];
			$url = $row['url'];
			
			$query = "SELECT * FROM project_associated_departments where id = '$id' and project_id = '$project_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			$authors = "".$n.',';
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$authors = $authors.$r['department'];
				else
					$authors = $authors.$r['department'].',';
			}
		
			$query = "SELECT * FROM project_co_investigator where id = '$id' and project_id = '$project_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			$chapters = "".$n.',';
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$chapters = $chapters.$r['co_investigator'];
				else
					$chapters = $chapters.$r['co_investigator'].',';
			}
			
			echo $principal_investigator.';'.$citation_index.';'.$start_date.';'.$authors.';'.$chapters.';'.$close_date.';'.$project_cost.';'.$abstract.';'.$funding_agency.';'.$url.';'.$project_status.';';		

?>