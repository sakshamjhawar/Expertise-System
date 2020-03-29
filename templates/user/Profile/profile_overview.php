<?php

		error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
	
	//$id = 'I4iA41flS';
	$id = $_SESSION['faculty_id'];
	$query = "SELECT * FROM profile where id = '$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview" cellpadding="15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Qualification</td>
			<td class = "div_table_award_overview_th">Institution</td>
			<td class = "div_table_award_overview_th">Location</td>
			<td class = "div_table_award_overview_th">University</td>
			<td class = "div_table_award_overview_th">Join_Month</td>
			<td class = "div_table_award_overview_th">Join_Year</td>
			<td class = "div_table_award_overview_th">Pass_Year</td>
			<td class = "div_table_award_overview_th">Percentage</td>
			<td class = "div_table_award_overview_th">Class</td>
		</tr>';
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
		
        $qualification = $row['qualification'];
        $institution = $row['institution'];
        $university = $row['university'];
        $location = $row['location'];
		$join_month = $row['join_month'];
		$join_year = $row['join_year'];
		$pass_month = $row['pass_month'];
		$pass_year = $row['pass_year'];
		$percentage = $row['percentage'];
		$class1 = $row['class1'];
		
        echo "<tr>";
            echo "<td>$qualification</td>";
            echo "<td>$institution</td>";
            echo "<td>$location</td>";
			echo "<td>$university</td>";
		    echo "<td>$join_month</td>";
			echo "<td>$join_year</td>";
			echo "<td>$pass_year</td>";
			echo "<td>$percentage</td>";
			echo "<td>$class1</td>";
        echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>