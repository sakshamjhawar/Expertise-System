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
	echo '<p></p><br>Qualification Details of '.$nam.' with id = '.$id;
	 echo '<br><br><table class = "div_table_award_overview" cellpadding="15">';
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
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM profile where id = '$id'and qualification = '$j'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
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


?>