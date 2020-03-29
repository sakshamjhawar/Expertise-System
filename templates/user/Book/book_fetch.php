<?php
session_start();
$book_id = $_POST['book_value'];

//query
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
		
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		    $result = mysql_query("select * from book where id = '$id' and book_id = '$book_id'");
			$row = mysql_fetch_array($result);
        	$book_id = $row['book_id'];
        	$role = $row['role'];
        	$book_or_chapter = $row['book_or_chapter'];
        	$book_title = $row['book_title'];
			$book_edition = $row['book_edition'];
			$publisher_name = $row['publisher_name'];
			$isbn = $row['isbn'];
			$book_date = $row['book_date'];
			
			$query = "SELECT * FROM book_authors where id = '$id' and book_id = '$book_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			$authors = "".$n.',';
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$authors = $authors.$r['author_name'];
				else
					$authors = $authors.$r['author_name'].',';
			}
		
			$query = "SELECT * FROM book_chapters where id = '$id' and book_id = '$book_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			$chapters = "".$n.',';
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$chapters = $chapters.$r['chapter_name'];
				else
					$chapters = $chapters.$r['chapter_name'].',';
			}
			
			echo $role.';'.$book_or_chapter.';'.$book_edition.';'.$authors.';'.$chapters.';'.$publisher_name.';'.$isbn.';'.$book_date.';';		

?>