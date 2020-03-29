<?php	
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");			
		if(!mysql_select_db('college site'))
			echo 'Some problem occured. Please try again later.';
			
		$seminar_title= mysql_real_escape_string($_POST['seminar_title']);
		$seminar_organizing_authority = mysql_real_escape_string($_POST['seminar_organizing_authority']);
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date= mysql_real_escape_string($_POST['end_date']);
		$role = mysql_real_escape_string($_POST['role']);
		$location= mysql_real_escape_string($_POST['location']);
		$seminar_level= mysql_real_escape_string($_POST['seminar_level']);
		$seminar_area= mysql_real_escape_string($_POST['seminar_area']);
		$url= mysql_real_escape_string($_POST['url']);
		$target_audience = mysql_real_escape_string($_POST['target_audience']);
		
	
		if($seminar_title == '')
			$seminar_title= '%';
		if($seminar_organizing_authority== '')
			$seminar_organizing_authority = '%';
		if($start_date== '')
			$start_date = '1950-01-01';
			if($role == '')
			$role= '%';
		if($end_date == '')
			$end_date = '2999-01-01';
		if($location == '')
			$location = '%';
			
		if($seminar_level == '')
			$seminar_level = '%';
			if($seminar_area == '')
			$seminar_area = '%';
			if($url == '')
			$url = '%';
			if($target_audience == '')
			$target_audience = '%';
		

		
		$result = mysql_query("select * FROM seminar where id = '$id' and seminar_title like '$seminar_title' and seminar_organizing_authority like '$seminar_organizing_authority' and start_date >= '$start_date' and end_date <= '$end_date' and role like '$role' and location like '$location' and seminar_level like '$seminar_level' and  seminar_area like '$seminar_area' and url like '$url' and target_audience like '$target_audience'");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
//		echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $profile_details = array($details['seminar_id'], $details['seminar_title'],$details['seminar_organizing_authority'],  $details['start_date'],$details['end_date'],$details['role'],$details['location'],$details['seminar_level'], $details['seminar_area'], $details['url'], $details['target_audience']);
		foreach($profile_details as $a)
    		echo $a.",";
		}
		mysql_close($con);
?>