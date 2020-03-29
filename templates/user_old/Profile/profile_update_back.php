<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../db.php");
		
		//$community_id = $_POST['community_id'];
		$qualification = $_POST['qualification'];
		$institution = $_POST['institution'];
		$location = $_POST['location'];
		$university = $_POST['university'];
		$join_month = $_POST['join_month'];
		$join_year= $_POST['join_year'];
		$pass_year = $_POST['pass_year'];
		$percentage= $_POST['percentage'];
		$class1 = $_POST['class1'];
		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		mysql_query("update profile set qualification = '$qualification', institution = '$institution', location= '$location', university = '$university',join_month='$join_month',join_year='$join_year',pass_year='$pass_year',percentage='$percentage',class1='$class1' where id = '$id'");
			mysql_close($con);
	}
?>