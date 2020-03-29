<?php
	
		session_start();
		include("../../db.php");
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		//$result = mysql_query("select MAX(id) from profile where id = '$id'");	
		//$row = mysql_fetch_array($result);
		//$result = $row['MAX(community_user_id)'];

		
		//$community_user_id=(int)$result+1;
		$qualification = $_POST['qualification'];
		$institution= $_POST['institution'];
		$location = $_POST['location'];
		$university = $_POST['university'];
		//$join_month = $_POST['join_month'];
		$join_year=$_POST['join_year'];
		$temp = explode('-', $join_year);
		$join_year = $temp[0];
		$join_month = $temp[1];
		$pass_year=$_POST['pass_year'];
		$temp = explode('-', $pass_year);
		$pass_year = $temp[0];
		$pass_month = $temp[1];
		$percentage=$_POST['percentage'];
		$class1=$_POST['class1'];
		$id = $_SESSION['faculty_id'];
		
		$sql="INSERT INTO profile(id,qualification,institution , location, university,join_month, join_year,pass_month, pass_year,percentage,class1) VALUES('$id','$qualification','$institution','$location','$university','$join_month
		', '$join_year','$pass_month','$pass_year','$percentage','$class1')";
		
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
		mysql_close($con);

?>