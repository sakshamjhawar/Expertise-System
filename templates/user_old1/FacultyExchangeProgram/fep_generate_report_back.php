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
	
	//$id = $_SESSION['faculty_id'];
	
	 echo '<table class = "div_table_award_overview" cellpadding="15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Faculty Exchange Program ID</td>
			<td class = "div_table_award_overview_th">Institution </td>
			<td class = "div_table_award_overview_th">Subject</td>
			<td class = "div_table_award_overview_th">Start date</td>
			<td class = "div_table_award_overview_th">End date</td>
			<td class = "div_table_award_overview_th">UG/PG</td>
			<td class = "div_table_award_overview_th">Collaboration Type</td>
			<td class = "div_table_award_overview_th">Details of collaboration</td>
			<td class = "div_table_award_overview_th">Feedback</td>
		</tr>';
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM faculty_exchange_program WHERE id='$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
        $row = mysql_fetch_array($result);
		$faculty_exchange_program_id=$row['faculty_exchange_program_id'];
		$institution=$row['institution'];
        $subject = $row['subject'];
        $start_date = $row['start_date'];
		$end_date = $row['end_date'];
		$ug_pg = $row['ug_pg'];
		$collaboration_type = $row['collaboration_type'];
		$details_of_collaboration = $row['details_of_collaboration'];
		$feedback=$row['feedback'];

        echo "<tr>";
			echo "<td>$faculty_exchange_program_id</td>";
            echo "<td>$institution</td>";
            echo "<td>$subject</td>";
		    echo "<td>$start_date</td>";
			echo "<td>$end_date</td>";
			echo "<td>$ug_pg</td>";
			echo "<td>$collaboration_type</td>";
			echo "<td>$details_of_collaboration</td>";
			echo "<td>$feedback</td>";
        echo "</tr>";

    }

    echo '</table>';


?>