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
	$query = "SELECT * FROM communityuser where id = '$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview" cellpadding="15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Community ID</td>
			<td class = "div_table_award_overview_th">Name of Event</td>
			<td class = "div_table_award_overview_th">Role</td>
			<td class = "div_table_award_overview_th">Location</td>
			<td class = "div_table_award_overview_th">Date of Event</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">Additional Inforamtion</td>
		</tr>';
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $community_user_id = $row['community_user_id'];
        $name_of_event = $row['name_of_event'];
        $role = $row['role'];
        $location = $row['location'];
		$date_of_event = $row['date_of_event'];
		$url = $row['url'];
		$additional_information = $row['additional_information'];
		
        echo "<tr>";
            echo "<td>$community_user_id</td>";
            echo "<td>$name_of_event</td>";
            echo "<td>$role</td>";
            echo "<td>$location</td>";
		    echo "<td>$date_of_event</td>";
			echo "<td>$url</td>";
			echo "<td>$additional_information</td>";
        echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>