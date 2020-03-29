<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	
	$id = $_SESSION['faculty_id'];
	$res = mysql_query("select * from faculty_member where fid = '$id'");
	$res = mysql_fetch_array($res);
	$nam = $res['name'];
	//$id = 'I4iA41flS';
	echo '<p></p><br>Professional memberships received by '.$nam.' with id = '.$id;
	echo '<br><br><table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">ID</td>
			<td class = "div_table_award_overview_th">Name</td>
			<td class = "div_table_award_overview_th">Agency</td>
			<td class = "div_table_award_overview_th">Date</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">Remark</td>
		</tr>';
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM professional_membership where id = '$id' and membership_number = '$j'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
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
	



?>