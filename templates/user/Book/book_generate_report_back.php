<?php
	session_start();
	$data = json_decode(stripslashes($_POST['data']));
	include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
	
	//$id = 'I4iA41flS';
	$flag = 0;
	$matrix = array();
	//print_r($matrix);
	$id = $_SESSION['faculty_id'];
	//print_r($data);
	    echo '<table class = "div_table_award_overview">';
	echo '<tr>
			<td class = "div_table_award_overview_th">Book ID</td>
			<td class = "div_table_award_overview_th">Role</td>
			<td class = "div_table_award_overview_th">Book or Chapter</td>
			<td class = "div_table_award_overview_th">Book Title</td>
			<td class = "div_table_award_overview_th">Book Edition</td>
			<td class = "div_table_award_overview_th">Authors</td>
			<td class = "div_table_award_overview_th">Chapters</td>
			<td class = "div_table_award_overview_th">Publisher Name</td>
			<td class = "div_table_award_overview_th">ISBN</td>
			<td class = "div_table_award_overview_th">Book Date</td>
		</tr>';
		
		 
		
    foreach ($data as $i){
		$result = mysql_query("select * from book where id = '$id' and book_id = '$i'");
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
		
		
         echo "<tr>";
            echo "<td>$book_id</td>";
            echo "<td>$role</td>";
            echo "<td>$book_or_chapter</td>";
            echo "<td>$book_title</td>";
			echo "<td>$book_edition</td>";
			echo "<td>$authors</td>";
			echo "<td>$chapters</td>";
			echo "<td>$publisher_name</td>";
			echo "<td>$isbn</td>";	
			echo "<td>$book_date</td>";
        echo "</tr>";
		
	}