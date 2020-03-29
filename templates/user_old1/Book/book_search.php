<?php	
		session_start();
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		$book_id = mysql_real_escape_string($_POST['book_id']);
		$role = mysql_real_escape_string($_POST['role']);
		$book_or_chapter = mysql_real_escape_string($_POST['book_or_chapter']);
		$book_title = mysql_real_escape_string($_POST['book_title']);
		$book_edition = mysql_real_escape_string($_POST['book_edition']);
		$publisher_name = mysql_real_escape_string($_POST['publisher_name']);
		$isbn = mysql_real_escape_string($_POST['isbn']);
		$from_date = mysql_real_escape_string($_POST['from_date']);
		$to_date = mysql_real_escape_string($_POST['to_date']);
		$authors = json_decode(stripslashes($_POST['authors']));
		$chapters = json_decode(stripslashes($_POST['chapters']));
		
		//echo $book_id.','.$book_or_chapter;
		
		if($book_id == '')
			$book_id = '%';
		if($role == '')
			$role = '%';
		if($book_or_chapter == '')
			$book_or_chapter = '%';
		if($book_title == '')
			$book_title = '%';
		if($book_edition == '')
			$book_edition = '%';
		if($publisher_name == '')
			$publisher_name = '%';
		if($isbn == '')
			$isbn = '%';
		if($from_date == '')
			$from_date = '1970-01-01';
		if($to_date == '')
			$to_date = '2999-01-01';
	
		
		$result = mysql_query("select book_id FROM book where id = '$id' and book_id like '$book_id' and  book_title like '$book_title' and book_or_chapter like '$book_or_chapter' and role like '$role' and  book_edition like '$book_edition' and publisher_name like '$publisher_name' and isbn like '$isbn' and book_date >= '$from_date' and  book_date <= '$to_date'");		
	
		
		//$book_id_array = array();
		
		//print_r( mysql_fetch_array($result));
		$num = mysql_num_rows($result);
		//echo $num;
		for($i = 0; $i < $num; $i++){
			$book_id = mysql_fetch_array($result);
			//$book_id = $book_id['book_id'];
			$book_id_array[$i] = $book_id['book_id'];
		}
		
		
		if($authors[0] != 0)
		{
			$p = $num;
			for($i = 1; $i <= $authors[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($authors[$i] == '')	
				{
						$p = $num;
						continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					$query = "select * from book_authors where id = '$id' and book_id = '$book_id_array[$j]' and author_name = '$authors[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	$book_id_array[$p] = $book_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		
		//echo $num;
		//print_r($book_id_array);
		if($chapters[0] != 0)
		{
			$p = $num;
			for($i = 1; $i <= $chapters[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($chapters[$i] == '')	
				{	
					$p = $num;
					continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					$query = "select * from book_chapters where id = '$id' and book_id = '$book_id_array[$j]' and chapter_name = '$chapters[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	
						$book_id_array[$p] = $book_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		
		
		for ($i = 0; $i < $num; $i++){
        	$result = mysql_query("select * from book where id = '$id' and book_id = '$book_id_array[$i]'");
			$row = mysql_fetch_array($result);
        	$book_id = $row['book_id'];
        	$role = $row['role'];
        	$book_or_chapter = $row['book_or_chapter'];
        	$book_title = $row['book_title'];
			$book_edition = $row['book_edition'];
			$publisher_name = $row['publisher_name'];
			$isbn = $row['isbn'];
			$book_date = $row['book_date'];
		
      
			$authors = "";
			$chapters = "";
			$query = "SELECT * FROM book_authors where id = '$id' and book_id = '$book_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$authors = $authors.$r['author_name'];
				else
					$authors = $authors.$r['author_name'].', ';
			}
		
			$query = "SELECT * FROM book_chapters where id = '$id' and book_id = '$book_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$chapters = $chapters.$r['chapter_name'];
				else
					$chapters = $chapters.$r['chapter_name'].', ';
			}
			
			echo $book_id.';'.$role.';'.$book_or_chapter.';'.$book_title.';'.$book_edition.';'.$authors.';'.$chapters.';'.$publisher_name.';'.$isbn.';'.$book_date.';';		

		}
		mysql_close($con);
?>