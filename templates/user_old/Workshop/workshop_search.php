<?php	
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");			
		if(!mysql_select_db('college site'))
			echo 'Some problem occured. Please try again later.';
			
		$workshop_title= mysql_real_escape_string($_POST['workshop_title']);
		$workshop_organizing_authority = mysql_real_escape_string($_POST['workshop_organizing_authority']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date= mysql_real_escape_string($_POST['end_date']);
		$role = mysql_real_escape_string($_POST['role']);
		$location= mysql_real_escape_string($_POST['location']);
		$workshop_level= mysql_real_escape_string($_POST['workshop_level']);
		$workshop_area= mysql_real_escape_string($_POST['workshop_area']);
		$url= mysql_real_escape_string($_POST['url']);
		$target_audience = mysql_real_escape_string($_POST['target_audience']);
		
	
		if($workshop_title == '')
			$workshop_title= '%';
		if($workshop_organizing_authority== '')
			$workshop_organizing_authority = '%';
		if($start_date== '')
			$start_date = '1950-01-01';
			if($role == '')
			$role= '%';
		if($end_date == '')
			$end_date = '2999-01-01';
		if($location == '')
			$location = '%';
			
		if($workshop_level == '')
			$workshop_level = '%';
			if($workshop_area == '')
			$workshop_area = '%';
			if($url == '')
			$url = '%';
			if($target_audience == '')
			$target_audience = '%';
		

		
		$result = mysql_query("select * FROM workshop where id = '$id' and workshop_title like '$workshop_title' and workshop_organizing_authority like '$workshop_organizing_authority' and start_date >= '$start_date' and end_date <= '$end_date' and role like '$role' and location like '$location' and workshop_level like '$workshop_level' and  workshop_area like '$workshop_area' and url like '$url' and target_audience like '$target_audience'");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
//		echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $profile_details = array($details['workshop_id'], $details['workshop_title'],$details['workshop_organizing_authority'],  $details['start_date'],$details['end_date'],$details['role'],$details['location'],$details['workshop_level'], $details['workshop_area'], $details['url'], $details['target_audience']);
		foreach($profile_details as $a)
    		echo $a.",";
		}
		mysql_close($con);
?>