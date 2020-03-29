<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		include("../../db/db.php");

		if(!mysql_select_db('college site'))
		{	
			echo mysql_error();
			return;
		}
		//echo "conn dn";
		$id = $_SESSION['faculty_id'];
		$query = "select * from users_counts where id = '$id'";
		$res = mysql_query($query);
		if($res){
			$row = mysql_fetch_assoc($res);
			echo json_encode($row);
		}
		return ;
	}
?>