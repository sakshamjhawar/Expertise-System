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
	$filename = $id."_seminar_".time().".csv";
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-type: text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Expires: 0");
	$fp = fopen('php://output', 'w');
	$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='college site' AND TABLE_NAME='seminar'";
	if(!($result = mysql_query($query)))
	{
		echo mysql_error();
		return;
	}
	while ($row = mysql_fetch_row($result)) {
		$header[] = $row[0];
	}	
	
	fputcsv($fp, $header);
	$num_column = count($header);
	$query = "SELECT * FROM seminar where id = '$id'";
	$result = mysql_query($query);
	while($row = mysql_fetch_row($result)) {
		fputcsv($fp, $row);
	}
	
	fclose($fp);
// 	readfile($filename);
// 	exit;
	
}	
?>