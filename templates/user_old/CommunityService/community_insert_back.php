<?php
	
		session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(community_user_id) from communityuser where id = '$id'");	
		$row = mysql_fetch_array($result);
		$result = $row['MAX(community_user_id)'];

		
		$community_user_id=(int)$result+1;
		$role = $_POST['role'];
		$name_of_event = $_POST['name_of_event'];
		$location = $_POST['location'];
		$date_of_event = $_POST['date_of_event'];
		$url = $_POST['url'];
		$additional_information = $_POST['additional_information'];
		
		
		$sql="INSERT INTO communityuser (id,community_user_id, role , name_of_event, location, date_of_event, url, additional_information) VALUES('$id','$community_user_id','$role','$name_of_event','$location','$date_of_event','$url','$additional_information')";
		
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		mysql_close($con);

?>