<?php
	
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		include("../../../db/db.php");
		$id = $_SESSION['faculty_id'];
		
		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(workshop_id) from workshop where id = '$id'");	
		$row = mysql_fetch_array($result);
		$result = $row['MAX(workshop_id)'];

		
		$workshop_id=(int)$result+1;
		$workshop_title = mysql_real_escape_string($_POST['workshop_title']);
		$workshop_organizing_authority = mysql_real_escape_string($_POST['workshop_organizing_authority']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date = mysql_real_escape_string($_POST['end_date']);
		$role = mysql_real_escape_string($_POST['role']);
		$location = mysql_real_escape_string($_POST['location']);
		$workshop_level = mysql_real_escape_string($_POST['workshop_level']);
		$workshop_area = mysql_real_escape_string($_POST['workshop_area']);
		$url = mysql_real_escape_string($_POST['url']);
		$target_audience = mysql_real_escape_string($_POST['target_audience']);
		
		
		$sql="INSERT INTO workshop (id,workshop_id,workshop_title, workshop_organizing_authority , start_date,end_date,role,location,workshop_level,workshop_area,url,target_audience) VALUES('$id','$workshop_id','$workshop_title','$workshop_organizing_authority','$start_date','$end_date','$role','$location','$workshop_level','$workshop_area','$url','$target_audience')";
		
		if(!mysql_query($sql,$con))
		{
			die('Some problem occured. Please try again later.');
			return;
		}
		mysql_close($con);

?>