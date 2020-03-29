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
	$filename = $id."_conference_.csv";
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-type: text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Expires: 0");
	$fp = fopen('php://output', 'w');
	$header = array("Conference Id", "Conference Name", "Conference Type", "Research Area", "Abstract",
			     "Project Name", "Paper Title", "Organizer", "From Date", "To Date", "Venue", "Authors");
	fputcsv($fp, $header);
	$num_column = count($header);
	$query = "SELECT conference_id, conference_name, conference_type, research_area, abstract, project_name,
			  paper_title, organizer, from_date, to_date, venue from conference where id = '$id'";
	if(!($result = mysql_query($query)))
	{
		echo mysql_error();
		return;
	}
	while($row = mysql_fetch_row($result)) {
		$conference_id = $row[0];
		$query = "Select author_name from conference_authors where id = '$id' and conference_id = '$conference_id'";
		$res = mysql_query($query);
		$n = mysql_num_rows($res);
		$authors = array();
		for($i = 0; $i < $n; $i++){
			$r = mysql_fetch_array($res);
// 			print_r($r);
			$au = $r[$i];
			array_push($authors, $au);
		}
		if(count($authors) > 0){
			$authors_list = implode(", " , $authors);
			array_push($row, $authors_list);
		}
		fputcsv($fp, $row);
	}
	
	fclose($fp);
// 	readfile($filename);
// 	exit;
	
}	
?>