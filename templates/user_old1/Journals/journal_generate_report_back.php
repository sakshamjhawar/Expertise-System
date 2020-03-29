<?php
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");
	error_reporting(E_ALL ^ E_DEPRECATED);
		//echo "hi3";

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	
	$id = $_SESSION['faculty_id'];
	//$id = 'I4iA41flS';
	
	echo '<table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Journal ID</td>
			<td class = "div_table_award_overview_th">Journal Type</td>
			<td class = "div_table_award_overview_th">Research Area</td>
			<td class = "div_table_award_overview_th">Paper Associated With Project</td>
			<td class = "div_table_award_overview_th">Project Name</td>
			<td class = "div_table_award_overview_th">Paper Title</td>
			<td class = "div_table_award_overview_th">Abstract</td>
			<td class = "div_table_award_overview_th">Keywords</td>
			<td class = "div_table_award_overview_th">Journal Name</td>
			<td class = "div_table_award_overview_th">Journal Authors</td>
			<td class = "div_table_award_overview_th">Volume</td>
			<td class = "div_table_award_overview_th">Issue</td>
			<td class = "div_table_award_overview_th">Impact Factor</td>
			<td class = "div_table_award_overview_th">Citation Index</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">From Page</td>
			<td class = "div_table_award_overview_th">To Page</td>
			<td class = "div_table_award_overview_th">Journal Month</td>
			<td class = "div_table_award_overview_th">Journal Year</td>
		</tr>';
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM journal where id='$id' and journal_id='$j'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
        $row = mysql_fetch_array($result);
        $journal_id = $row['journal_id'];
		$journal_type=$row['journal_type'];
        $research_area = $row['research_area'];
        $paper_associated_project = $row['paper_associated_project'];
        $project_name = $row['project_name'];
		$paper_title = $row['paper_title'];
		$abstract = $row['abstract'];
		$keywords = $row['keywords'];
		$journal_name = $row['journal_name'];
		$queryfac = "SELECT author_name FROM journal_authors WHERE journal_id=".$journal_id;
		
 		$resultfac = mysql_query($queryfac);
		$numfac= mysql_num_rows($resultfac);
		$rowfac = mysql_fetch_array($resultfac);
		$jauthors=$rowfac['author_name'];
		for($j=0;$j<$numfac-1;$j++)
		{
			$rowfac = mysql_fetch_array($resultfac);
			$jauthors.=",".$rowfac['author_name'];
		}
		$volume = $row['volume'];
		$issue = $row['issue'];
		$impact_factor=$row['impact_factor'];
		$citation_index= $row['citation index'];
		$url = $row['url'];
		$from_page = $row['from_page'];
		$to_page = $row['to_page'];
		$journal_month = $row['journal_month'];
		$journal_year = $row['journal_year'];
        echo "<tr>";
            echo "<td>$journal_id</td>";
            echo "<td>$journal_type</td>";
            echo "<td>$research_area</td>";
            echo "<td>$paper_associated_project</td>";
		    echo "<td>$project_name</td>";
			echo "<td>$paper_title</td>";
			echo "<td>$abstract</td>";
			echo "<td>$keywords</td>";
			echo "<td>$journal_name</td>";
			echo "<td>$jauthors</td>";
			echo "<td>$volume</td>";
            echo "<td>$issue</td>";
            echo "<td>$impact_factor</td>";
		    echo "<td>$citation_index</td>";
			echo "<td>$url</td>";
			echo "<td>$from_page</td>";
			echo "<td>$to_page</td>";
			echo "<td>$journal_month</td>";
			echo "<td>$journal_year</td>";
        echo "</tr>";

    }

    echo '</table>';

    


?>