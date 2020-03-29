<?php 
// if($_SERVER["REQUEST_METHOD"] == "POST")
{
	session_start();
	
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../../db/db.php");
	if(!mysql_select_db('college site'))
	{
		echo mysql_error();
		return;
	}
	//echo "conn dn";
	$id = $_SESSION['faculty_id'];
	$filename = $id."_courses_".time().".xls";
	header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	$fp = fopen('php://output', 'w');
	$header = ["Course Code", "Course Name", "Academic Year", "Number of Students", "Pass Percent"];
	
	fputcsv($fp, $header);
	$num_column = count($header);
	$query = "SELECT a.course_code, a.course_name, 
				b.academic_year, b.number_of_students, b.pass_percent 
				FROM courses_list a, courses_taught b 
				where b.id='$id' and a.course_id = b.course_id";
	$result = mysql_query($query);
	while($row = mysql_fetch_row($result)) {
		fputcsv($fp, $row);
	}
	
	fclose($fp);
// 	readfile($filename);
// 	exit;
	
}	
?>