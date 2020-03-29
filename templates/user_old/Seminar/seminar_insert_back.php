<?php
	
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		include("../../../db/db.php");
		$id = $_SESSION['faculty_id'];
		
		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(seminar_id) from seminar where id = '$id'");	
		$row = mysql_fetch_array($result);
		$result = $row['MAX(seminar_id)'];

		
		$seminar_id=(int)$result+1;
		$seminar_title = mysql_real_escape_string($_POST['seminar_title']);
		$seminar_organizing_authority = mysql_real_escape_string($_POST['seminar_organizing_authority']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date = mysql_real_escape_string($_POST['end_date']);
		$role = mysql_real_escape_string($_POST['role']);
		$location = mysql_real_escape_string($_POST['location']);
		$seminar_level = mysql_real_escape_string($_POST['seminar_level']);
		$seminar_area = mysql_real_escape_string($_POST['seminar_area']);
		$url = mysql_real_escape_string($_POST['url']);
		$target_audience = mysql_real_escape_string($_POST['target_audience']);
		
		
		$sql="INSERT INTO seminar (id,seminar_id,seminar_title, seminar_organizing_authority , start_date,end_date,role,location,seminar_level,seminar_area,url,target_audience) VALUES('$id','$seminar_id','$seminar_title','$seminar_organizing_authority','$start_date','$end_date','$role','$location','$seminar_level','$seminar_area','$url','$target_audience')";
		
		if(!mysql_query($sql,$con))
		{
			die('Some problem occured. Please try again later.');
			return;
		}
		mysql_close($con);

?>