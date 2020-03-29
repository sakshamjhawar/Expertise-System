<?php
	session_start();
	$id = $_SESSION['faculty_id'];
	
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$book_id = mysql_real_escape_string($_POST['book_id']);
		$role = mysql_real_escape_string($_POST['role']);
		$book_or_chapter = mysql_real_escape_string($_POST['book_or_chapter']);
		$book_edition = mysql_real_escape_string($_POST['book_edition']);
		$publisher_name = mysql_real_escape_string($_POST['publisher_name']);
		$isbn = mysql_real_escape_string($_POST['isbn']);
		$book_date = mysql_real_escape_string($_POST['book_date']);
		
		mysql_query("update book set id = '$id', book_id = '$book_id', role = '$role', book_or_chapter = '$book_or_chapter', book_edition = '$book_edition', publisher_name = '$publisher_name', isbn = '$isbn', book_date = '$book_date' where id = '$id' and book_id = '$book_id'");
		
		
		mysql_query("delete from book_authors where id = '$id' and book_id = '$book_id'");
		mysql_query("delete from book_chapters where id = '$id' and book_id = '$book_id'");
		$authors = json_decode(stripslashes($_POST['authors']));
		$chapters = json_decode(stripslashes($_POST['chapters']));
		for($i = 1, $p = 1; $i <= $authors[0]; $i++)
		{
			if($chapters[$i] == '')
				continue;
			$sql = "INSERT INTO book_authors (id, book_id, author_number, author_name) VALUES ('$id', '$book_id', '$p', '$authors[$p]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
			$p++;

		}
		
		for($i = 1, $p = 1; $i <= $chapters[0]; $i++)
		{
			if($chapters[$i] == '')
				continue;
			$sql = "INSERT INTO book_chapters (id, book_id, chapter_name) VALUES ('$id', '$book_id', '$chapters[$p]')";
			if(!mysql_query($sql,$con))
			{
				die('error:'.mysql_error());
			}
			$p++;
		}
		
		mysql_close($con);
	
?>