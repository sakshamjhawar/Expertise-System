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
	$filename = $id."_book_".time().".csv";
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-type: text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Expires: 0");
	$fp = fopen('php://output', 'w');
	$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='college site' AND TABLE_NAME='book'";
	if(!($result = mysql_query($query)))
	{
		echo mysql_error();
		return;
	}
	while ($row = mysql_fetch_row($result)) {
		//print_r($row);
		$header[] = $row[0];
	}	
	$header[] = "authors";
	$header[] = "chapters";
// 	print_r($header);
	
	
	fputcsv($fp, $header);
	$num_column = count($header);
	$query = "SELECT * FROM book where id = '$id'";
	$result = mysql_query($query);
	while($row = mysql_fetch_row($result)) {
		// 		append authors
// 		print_r($row);
		$book_id = $row[1];
// 		echo  " id = ".$id;
// 		echo "book id = ". $book_id;
		$query = "SELECT author_name FROM book_authors where id = '$id' and book_id = '$book_id'";
		$res = mysql_query($query);
		$n = mysql_num_rows($res);
		$authors = array();
		for($j = 0; $j < $n; $j++)
		{
			$r = mysql_fetch_array($res);
			$au = $r['author_name'];
			array_push($authors, $au);
		}
// 		echo "     Authors    ";
// 		print_r($authors);
		if(count($authors) > 0){
			$authors_list = implode(" ,", $authors);
			array_push($row, $authors_list);
		}
// 		append chapters
		$query = "SELECT chapter_name FROM book_chapters where id = '$id' and book_id = '$book_id'";
		$res = mysql_query($query);
		$n = mysql_num_rows($res);
		$chapters = array();
		for($j = 0; $j < $n; $j++)
		{
			$r = mysql_fetch_array($res);
			$au = $r['chapter_name'];
			array_push($chapters, $au);
		}
// 		echo "    chapters       ";
// 		print_r($chapters);
		if(count($chapters) > 0){
			$chapters_list = implode(" ,", $chapters);
			array_push($row, $chapters_list);
		}
		fputcsv($fp, $row);
	}
	
	fclose($fp);
// 	readfile($filename);
// 	exit;
	
}	
?>