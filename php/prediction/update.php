<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		include("../db.php");

		if(!mysql_select_db('college site'))
		{	
			echo mysql_error();
			return;
		}
		//echo "conn dn";
		$id = $_SESSION['faculty_id'];
		$field = $_POST["field"];
		echo $field;
		$query = "select $field from users_counts where id = '$id'";
		$res = mysql_query($query);
		if($res)
		{
			$cnt  = mysql_fetch_array($res);
			$count = $cnt[$field] + 1;
// 			echo $count;		
			$query_update = "update users_counts set $field = $count where id = '$id'";
			if(!($update = mysql_query($query_update))){
				echo "eerr";
			}
		}
		else 
			echo "Error exec";
		return;
	}
?>