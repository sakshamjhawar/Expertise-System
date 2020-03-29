<?php	
		session_start();
		include("../../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
		

		$faculty_exchange_program_id = $_POST['faculty_exchange_program_id'];
		$institution = $_POST['institution'];
		$subject = $_POST['subject'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$ug_pg = $_POST['ug_pg'];
		$collaboration_type = $_POST['collaboration_type'];
		$details_of_collaboration = $_POST['details_of_collaboration'];
		$feedback = $_POST['feedback'];
		
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		
		
		if($faculty_exchange_program_id == '')
			$faculty_exchange_program_id = '%';
		if($institution == '')
			$institution = '%';
		if($subject == '')
			$subject = '%';
		if($start_date == '')
			$start_date = '1950-01-01';
		if($end_date == '')
			$end_date = '2999-01-01';
		if($ug_pg == '')
			$ug_pg = '%';
		if($collaboration_type == '')
			$collaboration_type = '%';
		if($details_of_collaboration == '')
			$details_of_collaboration = '%';
		if($feedback == '')
			$feedback = '%';
			
		$feedback = '%'.$feedback.'%';

		$id = $_SESSION['faculty_id'];
		$result = mysql_query("select * FROM faculty_exchange_program where id = '$id' and faculty_exchange_program_id	 like '$faculty_exchange_program_id' and institution like '$institution' and subject like '$subject' and start_date >= '$start_date' and start_date <= '$end_date'and end_date >= '$start_date' and end_date <= '$end_date' and ug_pg like '$ug_pg' and collaboration_type like '$collaboration_type' and details_of_collaboration like '$details_of_collaboration' and feedback like '$feedback'  ");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		//echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $community_details = array($details['faculty_exchange_program_id'], $details['institution'], $details['subject'], $details['start_date'], $details['end_date'], $details['ug_pg'], $details['collaboration_type'], $details['details_of_collaboration'], $details['feedback']);
		foreach($community_details as $a)
    		echo $a.",";
		}

    
		mysql_close($con);
			
	// }
//}
?>