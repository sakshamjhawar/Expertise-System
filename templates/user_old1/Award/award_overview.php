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
	$query = "SELECT * FROM award where id = '$id'";
    $result = mysql_query($query);
	if(!$result)
		{
			echo 'Some problem occured.';
			return;
		}
    $num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview" cellpadding = "15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">ID</td>
			<td class = "div_table_award_overview_th">Name</td>
			<td class = "div_table_award_overview_th">Agency</td>
			<td class = "div_table_award_overview_th">Date</td>
			<td class = "div_table_award_overview_th">URL</td>
			<td class = "div_table_award_overview_th">Remark</td>
			<td class = "div_table_award_overview_th">Document</td>
		</tr>';
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $aid = $row['award_id'];
        $aname = $row['award_name'];
        $agency = $row['award_agency'];
        $date = $row['award_date'];
		$url = $row['url'];
		$rmk = $row['remark'];
		//$file = $row['file'];

        echo "<tr>";
        echo "<td>$aid</td>";
        echo "<td>$aname</td>";
        echo "<td>$agency</td>";
        echo "<td>$date</td>";
		echo "<td>$url</td>";
        echo "<td>$rmk</td>";
		//	echo "<td>$file</td>";
	
	$res = mysql_query("select * from award_images where id = '$id' and award_id = '$aid'");
	if(!$res)
		{
			echo 'Some problem occured. Please try again later.';
			return;
		}
	$n = mysql_num_rows($res);
	echo "<td>";
	echo "<ul style = 'list-style-type: none;'>";
	
	for($j = 1; $j <=$n; $j++)
	{
		//echo "hi";
		$im = mysql_fetch_array($res);
		$img = $im['image_path'];
		$im_name = explode("/",$im['image_path']);
		$im_name = end($im_name);
		echo "<li><a href = '$img'> $im_name,  </a></li>";
//		echo "<a href= 'height: 15em; width: 15em; padding:0.5em;' src='uploads/".$actual_image_name."'>";
		//echo ",";
	}
	echo '</ul>';
	echo "</td>";
	//echo "</table></td>";
	
			
			
        echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>
