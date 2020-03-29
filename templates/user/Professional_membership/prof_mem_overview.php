<?php

		error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
	$id = $_SESSION['faculty_id'];
	//$id = 'I4iA41flS';
	$query = "SELECT * FROM professional_membership where id = '$id'";
    $result = mysql_query($query);
	if(!$result)
		{
			echo 'Some problem occured.';
			return;
		}
    $num = mysql_num_rows($result);


    echo '<table class = "div_table_award_overview" cellpadding="15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Membership ID </td>
			<td class = "div_table_award_overview_th"> Name </td>
			<td class = "div_table_award_overview_th"> Type </td>
			<td class = "div_table_award_overview_th"> Start date </td>
			<td class = "div_table_award_overview_th"> End date </td>
		</tr>';
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $membership_number = $row['membership_number'];
        $name = $row['name'];
        $membership_type = $row['membership_type'];
        $from_date = $row['from_date'];
		$to_date = $row['to_date'];
		
		
        echo "<tr>";
            echo "<td>$membership_number </td>";
            echo "<td>$name </td>";
            echo "<td>$membership_type </td>";
            echo "<td>$from_date </td>";
		    echo "<td>$to_date </td>";
		echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>
