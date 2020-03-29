<?php

		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
	
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	$query = "SELECT * FROM conference where id = '$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Conference ID</td>
			<td class = "div_table_award_overview_th">Conference Type</td>
			<td class = "div_table_award_overview_th">Research Area</td>
			<td class = "div_table_award_overview_th">Project</td>
			<td class = "div_table_award_overview_th">Paper Title</td>
			<td class = "div_table_award_overview_th">Authors</td>
			<td class = "div_table_award_overview_th">Conference Name</td>
			<td class = "div_table_award_overview_th">Organizer</td>
			<td class = "div_table_award_overview_th">From Date</td>
			<td class = "div_table_award_overview_th">To Date</td>
			<td class = "div_table_award_overview_th">Pages</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">Document</td>
		</tr>';
		
	

		 
		
    for ($i = 0; $i < $num; $i++){
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
		
		
			echo "<tr>";
            echo "<td>$conference_id</td>";
            echo "<td>$conference_type</td>";
			echo "<td>$research_area</td>";
            echo "<td>$project_name</td>";
            echo "<td>$paper_title</td>";
			echo "<td>";
			echo "<ul style = 'list-style: none outside none;'>";
			$query = "SELECT * FROM conference_authors where id = '$id' and conference_id = '$conference_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				$au = $r['author_name'];
				if($j == $n - 1)
					echo "<li>$au</li>";
				else
					echo "<li>$au,</li>";
			}
			echo "</ul";
			echo "</td>";
			echo "<td>$conference_name</td>";
			echo "<td>$organizer</td>";
			echo "<td>$from_date</td>";
			echo "<td>$to_date</td>";
			echo "<td>$from_page-$to_page</td>";	
			echo "<td>$url</td>";
			$res = mysql_query("select * from conference_files where id = '$id' and conference_id = '$conference_id'");
			if(!$res)
				{
					echo 'Some problem occured. Please try again later.';
					return;
				}
			$n = mysql_num_rows($res);
			echo "<td>";
			echo "<ul style = 'list-style-type: none;'>";
			
			for($j = 1; $j <=$n; $j++)
			{
				//echo "hi";
				$im = mysql_fetch_array($res);
				$img = $im['file_path'];
				$im_name = explode("/",$im['file_path']);
				$im_name = end($im_name);
				echo "<li><a href = '$img'> $im_name,  </a></li>";
		//		echo "<a href= 'height: 15em; width: 15em; padding:0.5em;' src='uploads/".$actual_image_name."'>";
				//echo ",";
			}
			echo '</ul>';
			echo "</td>";
				echo "</tr>";
			}

    echo '</table>';

    mysql_close($con);

?>