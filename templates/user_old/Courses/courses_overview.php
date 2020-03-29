
<?php

	include("../../../db/db.php");
	session_start();
	$id= $_SESSION['faculty_id'];
	$query = "SELECT * FROM courses_taught where id='$id'";
	if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
    $result = mysql_query($query);
	if(!$result)
		{
			echo 'Some problem occured.';
			return;
		}
	$num = mysql_num_rows($result);

    echo '<table class = "div_table_award_overview" cellpadding="15">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Course ID</td>
			<td class = "div_table_award_overview_th">Academic Year</td>
			<td class = "div_table_award_overview_th">Number  Of Students</td>
			<td class = "div_table_award_overview_th">Pass Percentage</td>
		</tr>';
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $course_id = $row['course_id'];
        $academic_year = $row['academic_year'];
        $number_of_students = $row['number_of_students'];
        $pass_percent = $row['pass_percent'];
        echo "<tr>";
            echo "<td>$course_id</td>";
            echo "<td>$academic_year</td>";
            echo "<td>$number_of_students</td>";
            echo "<td>$pass_percent</td>";
        echo "</tr>";

    }

    echo '</table>';

    mysql_close($con);

?>
</p>
