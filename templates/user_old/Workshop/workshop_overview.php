<?php

		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
	
	
	$query = "SELECT * FROM workshop where id = '$id'";
	
    if(!($result = mysql_query($query)))
	{
		echo "<script>alert('Some problem occured. Please try again later.')</script>";
		return;
	}

    $num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">ID</td>
			<td class = "div_table_award_overview_th">workshop_title</td>
			<td class = "div_table_award_overview_th">Organizing authority</td>
			<td class = "div_table_award_overview_th">Start_date</td>
			<td class = "div_table_award_overview_th">End_date</td>
			<td class = "div_table_award_overview_th">Role</td>
			<td class = "div_table_award_overview_th">Location</td>
			<td class = "div_table_award_overview_th">workshop Level</td>
			<td class = "div_table_award_overview_th">workshop_area</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">Target Audience</td>
		</tr>';
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
		
		$workshop_id= $row['workshop_id'];
        $workshop_title = $row['workshop_title'];
        $workshop_organizing_authority = $row['workshop_organizing_authority'];
        $start_date = $row['start_date'];
        $end_date= $row['end_date'];
		$role= $row['role'];
		$location = $row['location'];
		$workshop_level = $row['workshop_level'];
		$workshop_area = $row['workshop_area'];
		$url = $row['url'];
		$target_audience = $row['target_audience'];
		
        echo "<tr>";
            echo "<td>$workshop_id</td>";
            echo "<td>$workshop_title</td>";
            echo "<td>$workshop_organizing_authority</td>";
			echo "<td>$start_date</td>";
			echo "<td>$end_date</td>";
			echo "<td>$role</td>";
            echo "<td>$location</td>";
		    echo "<td>$workshop_level</td>";
			echo "<td>$workshop_area</td>";
			echo "<td>$url</td>";
			echo "<td>$target_audience</td>";
        echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>