<?php
	
	include("../../../db/db.php");
	session_start();
	$id = $_SESSION['faculty_id'];
	if(!mysql_select_db('college site'))
	{	echo mysql_error();
		return;
	}
	
	//$id = "C90e-320lS"; 
	
	$result = mysql_query("select * from faculty_member where fid ='$id'");
	//if(!($result = mysql_query('select * from faculty_member where fid = "$id"')));
	//{
		//echo "Some problem occurred! Please try again later!";
		//return;
	//}
	//echo $result;
	$row = mysql_fetch_array($result);
	//echo $row['name'];
	echo $row['name'].";".$row['gender'].";".$row['date_of_birth'].";".$row['department'].";".$row['date_of_join'].";".$row['email'].";".$row['phone_number'].";".$row['address'].";".$row['password'];		
?>
