<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
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
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	$num_rows = 0;
	$ar = array();
	
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		if($num_rows == 0){
			$num_rows++;
			continue;
		}
		//print_r($filesop);
		$id = $filesop[0];
		$book_id = $filesop[1];
		$role = $filesop[2];
		$book_or_chapter = $filesop[3];
		$book_title = $filesop[4];
		$book_edition = $filesop[5];
		$publisher_name = $filesop[6];
		$isbn = $filesop[7];
		$book_date = $filesop[8];
		$authors = $filesop[9];
		$chapters = $filesop[10];
		$authors_array = explode(";", $authors);
		$chapters_array = explode(";", $chapters);
		echo "   authors_array  ";
		print_r($authors_array);
		echo "   chapters_array    ";
		print_r($chapters_array);
		$book_ar = array();
		$book_authors_ar = array();
		$book_chapters_ar = array();
		//echo $id."  ".$book_id."  ".$role."  ".$book_or_chapter."  ".$book_title;
		//echo "  ".$book_edition."  ".$publisher_name." ".$isbn." ".$book_date." ".$authors." ".$chapters; 
		$query_book = "INSERT INTO book(id, book_id, role, book_or_chapter, book_title, book_edition, publisher_name, isbn, book_date)
				VALUES ('$id', '$book_id', '$role', '$book_or_chapter', '$book_title', '$book_edition', '$publisher_name','$isbn', '$book_date')";
		$flag = 1;
		if(!(mysql_query($query_book)))
		{
			echo mysql_error();
			array_push($book_ar, $num_rows);
		}
		else {
			$c++;
		}
		if($authors !== ""){
// 			$query_book_authors = [];
			$len_authors_array = count($authors_array);
			for($i = 0; $i < $len_authors_array; $i++){
				$author_num = $i+1;
				$query_book_authors = "INSERT into book_authors(id, book_id, author_number, author_name)
				VALUES('$id','$book_id', '$author_num', '$authors_array[$i]')";
				if(!(mysql_query($query_book_authors))){
					$flag = 0;
					echo mysql_error();
					array_push($book_authors_ar, array($num_rows, $i));
				}
			}
		}
		if($chapters !== "")
		{
// 			$query_book_chapters = [];
			$len_chapters_array = count($chapters_array);
			for($i = 0; $i < $len_chapters_array; $i++){
				$query_book_chapters = "INSERT into book_chapters(id, book_id, chapter_name)
				VALUES('$id','$book_id', '$chapters_array[$i]')";
				if(!(mysql_query($query_book_chapters))){
					$flag = 0;
					echo mysql_error();
					array_push($book_chapters_ar, array($num_rows, $i));
				}
			}
		}	
		$num_rows++;
	}
 	echo "Num of rows inserted = ".$c. " ".$num_rows."<br>";
 	if(count($book_ar) > 0){
 		echo "Rows not inserted : ";
 		for($i = 0; $i < count($book_ar); $i++){
 			echo $book_ar[$i].", ";
 		}
 	}
	echo "book ar    ";
	print_r($book_ar);
	echo "  authors array  ";
	print_r($authors_array);
	echo "   chapters array   ";
	print_r($chapters_array);
	if(++$c == $num_rows && $flag){
		echo "You database has been imported successfully";
	}else{
		echo "Sorry! There is some problem.";
	}
}
?>
