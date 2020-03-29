<?php
	
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		$result = mysql_query("select MAX(book_id) from book where id = '$id'");	
		if(mysql_num_rows($result) == 0)
			$result = 0;
		else
		{
			$result = mysql_fetch_array($result);
			$result = $result['MAX(book_id)'];
		}
		
		$book_id=(int)$result+1;
		$role = mysql_real_escape_string($_POST['role']);
		$book_or_chapter = mysql_real_escape_string($_POST['book_or_chapter']);
		$book_title = mysql_real_escape_string($_POST['book_title']);
		$book_edition = mysql_real_escape_string($_POST['book_edition']);
		$publisher_name = mysql_real_escape_string($_POST['publisher_name']);
		$isbn = mysql_real_escape_string($_POST['isbn']);
		$book_date = mysql_real_escape_string($_POST['book_date']);
		$id = $_SESSION['faculty_id'];
		
		$sql="INSERT INTO book (id,book_id,role,book_or_chapter,book_title,book_edition,publisher_name,isbn,book_date) VALUES('$id','$book_id','$role','$book_or_chapter','$book_title','$book_edition','$publisher_name','$isbn', '$book_date')";
		
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		
		
		$authors = json_decode(stripslashes($_POST['authors']));
		$chapters = json_decode(stripslashes($_POST['chapters']));
		for($i = 1, $p = 1; $i <= $authors[0]; $i++)
		{
			if($authors[$i] == '')
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