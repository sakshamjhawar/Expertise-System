<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../../db/db.php");
		
		//$community_id = $_POST['community_id'];
		$qualification = $_POST['qualification'];
		$institution = $_POST['institution'];
		$location = $_POST['location'];
		$university = $_POST['university'];
		$join_year=$_POST['join_year'];
		$temp = explode('-', $join_year);
		$join_year = $temp[0];
		$join_month = $temp[1];
		$pass_year=$_POST['pass_year'];
		$temp = explode('-', $pass_year);
		$pass_year = $temp[0];
		$pass_month = $temp[1];
		$percentage= $_POST['percentage'];
		$class1 = $_POST['class1'];
		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		mysql_query("update profile set  institution = '$institution', location= '$location', university = '$university',join_month='$join_month',join_year='$join_year',pass_year='$pass_year',pass_month='$pass_month',percentage='$percentage',class1='$class1' where id = '$id' and qualification = '$qualification'");
			mysql_close($con);
	}
?>