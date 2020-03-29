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
			<td class = "div_table_award_overview_th">Name Of Committee</td>
			<td class = "div_table_award_overview_th">Status Of Committee</td>
			<td class = "div_table_award_overview_th">Served to</td>
			<td class = "div_table_award_overview_th">Served From</td>
			<td class = "div_table_award_overview_th">Role</td>
			<td class = "div_table_award_overview_th">Responsibility</td>
		</tr>';
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM governance where id='$id'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
        $row = mysql_fetch_array($result);
		$governance_id=$row['governance_id'];
        $name_of_committee = $row['name_of_committee'];
        $status_of_committee = $row['status_of_committee'];
		$served_from = $row['served_from'];
		$served_to = $row['served_to'];
		$role = $row['role'];
		$responsibility = $row['responsibility'];

        echo "<tr>";
            echo "<td>$governance_id</td>";
            echo "<td>$name_of_committee</td>";
		    echo "<td>$status_of_committee</td>";
			echo "<td>$served_from</td>";
			echo "<td>$served_to</td>";
			echo "<td>$role</td>";
			echo "<td>$responsibility</td>";
        echo "</tr>";

    }

    echo '</table>';


?>