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
	$filename = $id."_consultancy_".time().".csv";
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-type: text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Expires: 0");
	$fp = fopen('php://output', 'w');
	$header = ["Consultancy Id", "Client", "Work Title", "Collaborations", "Start Date", "End Date",
			"Faculty Involved", "Students Involved", "Revenue Generated", "Summary", "Labs Allocated", "URL"
	];
	
	fputcsv($fp, $header);
	$num_column = count($header);
	$query = "SELECT * FROM consultancy where id = '$id'";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)) {
		$row_to_put = array();
		$consultancy_id = $row['consultancy_id'];
		array_push($row_to_put, $row['id']);
		array_push($row_to_put, $consultancy_id);
		array_push($row_to_put, $row['client']);
		array_push($row_to_put, $row['work_title']);
		$query = "SELECT collaborator_name from consultancy_collaboration 
		          where id = '$id' and consultancy_id = '$consultancy_id'";
		$res = mysql_query($query);
		$collaborators = array();
		$n = mysql_num_rows($res);
		for($i = 0; $i < $n; $i++){
			array_push($collaborators, $res[$i]);
		}
		$collaborators_list = implode(" ,", $collaborators);
		array_push($row_to_put, $collaborators);
		
		array_push($row_to_put, $row['start_date']);
		array_push($row_to_put, $row['end_date']);
		
		$query = "SELECT faculty_name from consultancy_faculty_involved
		where id = '$id' and consultancy_id = '$consultancy_id'";
		$res = mysql_query($query);
		$faculty = array();
		$n = mysql_num_rows($res);
		for($i = 0; $i < $n; $i++){
			array_push($faculty, $res[$i]);
		}
		$faculty_list = implode(" ,", $faculty);
		array_push($row_to_put, $faculty_list);
		
		$query = "SELECT student_us fnrom consultancy_student_involved
		where id = '$id' and consultancy_id = '$consultancy_id'";
		$res = mysql_query($query);
		$students = [];
		$n = mysql_num_rows($res);
		for($i = 0; $i < $n; $i++){
			array_push($students, $res[$i]);
		}
		$students_list = implode(" ,", $students);
		array_push($row_to_put, $students_list);
		
		array_push($row_to_put, $row['revenue_generated']);
		array_push($row_to_put, $row['summary']);
		array_push($row_to_put, $row['labs_allocated']);
		array_push($row_to_put, $row['url']);
		
		fputcsv($fp, $row_to_put);
	}
	
	fclose($fp);
// 	readfile($filename);
// 	exit;
	
}	
?>