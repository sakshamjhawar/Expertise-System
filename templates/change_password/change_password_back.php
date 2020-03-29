<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../db/db.php");
	//echo "hi3";

	if(!mysql_select_db('college site'))
	{	echo 'Some problem occured. Please try again later!';
		return;
	}
	$id = $_SESSION['faculty_id'];
	//echo $id;
	$query = "select password from users where `id` = '$id'";
	$result = mysql_query($query);
	if(!$result)
	{
				//echo mysql_error();
		$flag = 0;
	}
	
	
	$old_password = mysql_real_escape_string($_POST['old_password']);
	$new_password = mysql_real_escape_string($_POST['new_password']);
	
	//echo $old_password;
	//echo $new_password;
	
	$row = mysql_fetch_array($result);
	$fetched_password = $row['password'];
	
	if(md5($old_password) != $fetched_password)
	{
		//echo $old_password;
		//echo md5($old_password);
		
		echo "Old Password is Incorrect";
		echo $fetched_password;
		return;	
	}
	
	$flag = 1;
	$new_password = md5($new_password);		
	$query_update = "update users set password = '$new_password' where `id` = '$id'";
	$result_update = mysql_query($query_update);
	if(!$result_update)
	{
				//echo mysql_error();
		$flag = 0;
	}
	/*$query_update1 = "update login set password = '$new_password' where `id` = '$id'";
	$result_update1 = mysql_query($query_update1);
	if(!$result_update1)
	{
		$flag = 0;
	}
			
	$query_update2 = "update faculty_member set password = '$new_password' where `fid` = '$id'";
	$result_update2 = mysql_query($query_update2);
	if(!$result_update2)
	{
		$flag = 0;
	}*/
			
	if($result_update)
	{
			echo 'Password Successfully Changed';
	}
	
	else
	{
		echo 'Some prolem occureed! Please try again later';
	}
?>