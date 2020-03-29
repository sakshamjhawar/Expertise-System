<?php
	
	$data = json_decode(stripslashes($_POST['data']));
	error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
	$id = $_SESSION['faculty_id'];
	$flag = 0;
	
	
	
	  echo '<table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">ID</td>
			<td class = "div_table_award_overview_th">Seminar_title</td>
			<td class = "div_table_award_overview_th">Organizing authority</td>
			<td class = "div_table_award_overview_th">Start_date</td>
			<td class = "div_table_award_overview_th">End_date</td>
			<td class = "div_table_award_overview_th">Role</td>
			<td class = "div_table_award_overview_th">Location</td>
			<td class = "div_table_award_overview_th">Seminar Level</td>
			<td class = "div_table_award_overview_th">Seminar_area</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">Target Audience</td>
		</tr>';
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM seminar where id = '$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
        $row = mysql_fetch_array($result);
	

       $seminar_id= $row['seminar_id'];
        $seminar_title = $row['seminar_title'];
        $seminar_organizing_authority = $row['seminar_organizing_authority'];
        $start_date = $row['start_date'];
        $end_date= $row['end_date'];
		$role= $row['role'];
		$location = $row['location'];
		$seminar_level = $row['seminar_level'];
		$seminar_area = $row['seminar_area'];
		$url = $row['url'];
		$target_audience = $row['target_audience'];
		
        echo "<tr>";
            echo "<td>$seminar_id</td>";
            echo "<td>$seminar_title</td>";
            echo "<td>$seminar_organizing_authority</td>";
			echo "<td>$start_date</td>";
			echo "<td>$end_date</td>";
			echo "<td>$role</td>";
            echo "<td>$location</td>";
		    echo "<td>$seminar_level</td>";
			echo "<td>$seminar_area</td>";
			echo "<td>$url</td>";
			echo "<td>$target_audience</td>";
        echo "</tr>";

    }

    echo '</table>';


?>