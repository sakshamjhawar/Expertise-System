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
	$filename = $id."_project_".time().".xls";
	header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	$fp = fopen('php://output', 'w');
	$header[] = ["Project Id", "Title", "Principal Investigator", "Citation Index",  
				"Funding Agency", "Project Cost", "Project Status", "Start Date", "End Date",
			    "Associated Departments"];
	fputcsv($fp, $header);
	$num_column = count($header);
	$query = "SELECT project_id, project_title, principal_investigator, citation_index, funding_agency,
	 		  project_cost, project_status, start_date, close_date FROM project where id = '$id'";
	$result = mysql_query($query);
	while($row = mysql_fetch_row($result)) {
		$project_id = $row["project_id"];
		$query = "SELECT department from project_associated_departments where id = '$id' and project_id = '$project_id'";
		$result_inner = mysql_query($query);
		$n = mysql_num_rows($result_inner);
		$depts = [];
		for($j = 0; $j < $n; $j++)
		{
			$r = mysql_fetch_array($res);
			$au = $r['department'];
			array_push($depts, $au);
		}
		// 		echo "    chapters       ";
		// 		print_r($chapters);
		if(count($depts) > 0){
			$depts_list = implode(", ", $depts);
			array_push($row, $depts_list);
		}
		fputcsv($fp, $row);
	}
	
	fclose($fp);
// 	readfile($filename);
// 	exit;
	
}	
?>