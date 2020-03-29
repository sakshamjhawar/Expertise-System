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
	echo '<p></p><br>Awards received by '.$nam.' with id = '.$id;
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
	
	$query = "SELECT * FROM award where id = '$id' and award_id = '$j'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
        $row = mysql_fetch_array($result);
        $aid = $row['award_id'];
        $aname = $row['award_name'];
        $agency = $row['award_agency'];
        $date = $row['award_date'];
		$url = $row['url'];
		$rmk = $row['remark'];

        echo "<tr>";
            echo "<td>$aid</td>";
            echo "<td>$aname</td>";
            echo "<td>$agency</td>";
            echo "<td>$date</td>";
		    echo "<td>$url</td>";
			echo "<td>$rmk</td>";
        echo "</tr>";

    }
	

    echo '</table>';


?>