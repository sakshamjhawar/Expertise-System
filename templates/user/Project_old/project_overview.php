<?php

		session_start();
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
	
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	$query = "SELECT * FROM project where id = '$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Project ID</td>
			<td class = "div_table_award_overview_th">Title</td>
			<td class = "div_table_award_overview_th">P Investigator</td>
			<td class = "div_table_award_overview_th">Citation Index</td>
			<td class = "div_table_award_overview_th">Status</td>
			<td class = "div_table_award_overview_th">Asso Depts</td>
			<td class = "div_table_award_overview_th">Co Inves.</td>
			<td class = "div_table_award_overview_th">Start Date</td>
			<td class = "div_table_award_overview_th">Close Date</td>
			<td class = "div_table_award_overview_th">Project Cost</td>
			<td class = "div_table_award_overview_th">Fund Agency</td>
			<td class = "div_table_award_overview_th">URL</td>		
		</tr>';
		
		 
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $project_id = $row['project_id'];
        $project_title = $row['project_title'];
        $principal_investigator = $row['principal_investigator'];
        $citation_index = $row['citation_index'];
		$project_status = $row['project_status'];
		$start_date = $row['start_date'];
		$close_date = $row['close_date'];
		$project_cost = $row['project_cost'];
		$abstract = $row['abstract'];
		$funding_agency = $row['funding_agency'];
		$url = $row['url'];
		
      
		/*$authors = "";
		$chapters = "";
		$query = "SELECT * FROM book_authors where id = '$id' and book_id = '$book_id'";
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
		
		$query = "SELECT * FROM book_chapters where id = '$id' and book_id = '$book_id'";
    	$res = mysql_query($query);
   		$n = mysql_num_rows($res);
		for($j = 0; $j < $n; $j++)
		{
			$r = mysql_fetch_array($res);
			if($j == $n - 1)
				$chapters = $chapters.$r['chapter_name'];
			else
				$chapters = $chapters.$r['chapter_name'].', ';
		}
		
		*/
		
		
         echo "<tr>";
            echo "<td>$project_id</td>";
            echo "<td>$project_title</td>";
            echo "<td>$principal_investigator</td>";
            echo "<td>$citation_index</td>";
			echo "<td>$project_status</td>";
			echo "<td>";
			echo "<ul style = 'list-style: none outside none;'>";
			$query = "SELECT * FROM project_associated_departments where id = '$id' and project_id = '$project_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				$au = $r['department'];
				if($j == $n - 1)
					echo "<li>$au</li>";
				else
					echo "<li>$au,</li>";
			}
			echo "</ul";
			echo "</td>";
			echo "<td>";
			echo "<ul style = 'list-style: none outside none;'>";
			$query = "SELECT * FROM project_co_investigator where id = '$id' and project_id = '$project_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				$au = $r['co_investigator'];
				if($j == $n - 1)
					echo "<li>$au</li>";
				else
					echo "<li>$au,</li>";
			}
			echo "</ul";
			echo "</td>";
			echo "<td>$start_date</td>";
			echo "<td>$close_date</td>";	
			echo "<td>$project_cost</td>";
			echo "<td>$funding_agency</td>";
			echo "<td>$url</td>";
        echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>