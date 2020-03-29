<?php
	
		session_start();
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		$id = $_SESSION['faculty_id'];

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(governance_id) from governance where id = '$id'");	
		$row = mysql_fetch_array($result);
		$result = $row['MAX(governance_id)'];

		
		$governance_id=(int)$result+1;
		$name_of_committee = mysql_real_escape_string($_POST['name_of_committee']);
		$status_of_committee = mysql_real_escape_string($_POST['status_of_committee']);
		$served_from = mysql_real_escape_string($_POST['served_from']);
		$served_to = mysql_real_escape_string($_POST['served_to']);
		$role = mysql_real_escape_string($_POST['role']);
		$responsibility = mysql_real_escape_string($_POST['responsibility']);
		//$id = $_SESSION['faculty_id'];
		
		$sql="INSERT INTO governance (`id`, `name_of_committee`, `status_of_committee`, `served_from`, `served_to`, `role`, `responsibility`, `governance_id`) VALUES('$id','$name_of_committee','$status_of_committee','$served_from','$served_to','$role','$responsibility','$governance_id')";
		
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		mysql_close($con);

?>