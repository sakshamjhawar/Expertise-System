<?php
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	error_reporting(E_ALL ^ E_DEPRECATED);

//query
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		//echo "hi2";
		if(!($con))
		{

			die('could not connect:'.mysql_error());
			echo "hi1";
		}
		//echo "hi3";

		if(!mysql_select_db('college site'))
			echo mysql_error();
	$flag = 0;
	
	
	echo '<table class = "div_table_award_overview" cellpadding="15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Consultancy ID </td>
			<td class = "div_table_award_overview_th">Client</td>
			<td class = "div_table_award_overview_th">Work Title</td>
			<td class = "div_table_award_overview_th">Collaborations</td>
			<td class = "div_table_award_overview_th">Start date</td>
			<td class = "div_table_award_overview_th">End Date</td>
			<td class = "div_table_award_overview_th">Teachers Involved</td>
			<td class = "div_table_award_overview_th">Students Involved</td>
			<td class = "div_table_award_overview_th">Revenue</td>
			<td class = "div_table_award_overview_th">Summary</td>
			<td class = "div_table_award_overview_th">labs allocated</td>
			<td class = "div_table_award_overview_th">url</td>
		</tr>';
	
	foreach ($data as $j){
	
	$query = "SELECT * FROM consultancy where id = '$id' and consultancy_id = '$j'";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);

 
       $row = mysql_fetch_array($result);
        $consultancy_id = $row['consultancy_id'];
        $client = $row['client'];
        $work_title = $row['work_title'];
		$query_collaboration = "SELECT collaborator_name FROM consultancy_collaboration WHERE id = '$id' and consultancy_id='$consultancy_id'";
 		$result_collaboration = mysql_query($query_collaboration);
		$num_collaboration= mysql_num_rows($result_collaboration);
		$row_collaboration = mysql_fetch_array($result_collaboration);
		$collaboration=$row_collaboration['collaborator_name'];
		for($j=0;$j<$num_collaboration-1;$j++)
		{
			$row_collaboration = mysql_fetch_array($result_collaboration);
			$collaboration.=",".$row_collaboration['collaborator_name'];
		}
		$start_date = $row['start_date'];
		$end_date = $row['end_date'];
		$query_faculty = "SELECT faculty_name FROM consultancy_faculty_involved WHERE id = '$id' and consultancy_id='$consultancy_id'";
		
 		$result_faculty = mysql_query($query_faculty);
		$num_faculty= mysql_num_rows($result_faculty);
		$row_faculty = mysql_fetch_array($result_faculty);
		$faculty=$row_faculty['faculty_name'];
		for($j=0;$j<$num_faculty-1;$j++)
		{
			$row_faculty = mysql_fetch_array($result_faculty);
			$faculty.=",".$row_faculty['faculty_name'];
		}
		
		$query_student = "SELECT student_usn FROM consultancy_student_involved WHERE id = '$id' and consultancy_id='$consultancy_id'";
		
 		$result_student = mysql_query($query_student);
		$num_student= mysql_num_rows($result_student);
		$row_student = mysql_fetch_array($result_student);
		$student=$row_student['student_usn'];
		for($j=0;$j<$num_student-1;$j++)
		{
			$row_student = mysql_fetch_array($result_student);
			$student.=",".$row_student['student_usn'];
		}
		
		$revenue_generated = $row['revenue_generated'];
		$summary = $row['summary'];
		$labs_allocated = $row['labs_allocated'];
		$url=$row['url'];

        echo "<tr>";
            echo "<td>$consultancy_id</td>";
            echo "<td>$client</td>";
            echo "<td>$work_title</td>";
			echo "<td>$collaboration</td>";
		    echo "<td>$start_date</td>";
			echo "<td>$end_date</td>";
			echo "<td>$faculty</td>";
			echo "<td>$student</td>";
			echo "<td>$revenue_generated</td>";
			echo "<td>$summary</td>";
			echo "<td>$labs_allocated</td>";
			echo "<td>$url</td>";
        echo "</tr>";

    }

    echo '</table>';

    

?>