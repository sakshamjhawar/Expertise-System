<?php	
		session_start();
		//session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");	

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$id = $_SESSION['faculty_id'];
		//echo "hi";
		$community_id = $_POST['id'];
		$name_of_event = $_POST['name_of_event'];
		$role = $_POST['role'];
		$location = $_POST['location'];
		$to_date = $_POST['to_date'];
		$from_date = $_POST['from_date'];
		$url = $_POST['url'];
		$additional_information = $_POST['additional_information'];
		
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		
		
		if($community_id == '')
			$community_id = '%';
		if($name_of_event == '')
			$name_of_event = '%';
		if($role == '')
			$role = '%';
		if($from_date == '')
			$from_date = '1950-01-01';
		if($to_date == '')
			$to_date = '2999-01-01';
		if($location == '')
			$location = '%';
			
		if($url == '')
			$url = '%';
			
		$additional_information = '%'.$additional_information.'%';

	
		$result = mysql_query("select * FROM communityuser where id = '$id' and community_user_id like '$community_id' and role like '$role' and location like '$location' and date_of_event >= '$from_date' and date_of_event <= '$to_date' and url like '$url' and additional_information like '$additional_information' ");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		//echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $community_details = array($details['community_user_id'], $details['name_of_event'], $details['role'], $details['location'], $details['date_of_event'], $details['url'], $details['additional_information']);
		foreach($community_details as $a)
    		echo $a.",";
		}

    
		mysql_close($con);
			
	// }
//}
?>