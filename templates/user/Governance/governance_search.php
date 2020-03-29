<?php	
		session_start();
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		$id = $_SESSION['faculty_id'];

		if(!mysql_select_db('college site'))
			echo mysql_error();
		

		$governance_id = $_POST['governance_id'];
		$name_of_committee = $_POST['name_of_committee'];
		$status_of_committee = $_POST['status_of_committee'];
		$served_from = $_POST['served_from'];
		$served_to = $_POST['served_to'];
		$role = $_POST['role'];
		$responsibility = $_POST['responsibility'];
		
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		
		
		if($governance_id == '')
			$governance_id = '%';
		if($name_of_committee == '')
			$name_of_committee = '%';
		if($status_of_committee == '')
			$status_of_committee = '%';
		if($served_from == '')
			$served_from = '1950-01-01';
		if($served_to == '')
			$served_to = '2999-01-01';
		if($role == '')
			$role = '%';
		if($responsibility == '')
			$responsibility = '%';

		$id = 'I4iA41flS';
		$result = mysql_query("select * FROM governance where id = '$id' and governance_id	 like '$governance_id' and name_of_committee like '$name_of_committee' and status_of_committee like '$status_of_committee' and served_from >= '$served_from' and served_from <= '$served_to'and served_to >= '$served_from' and served_to <= '$served_to'  and role like '$role' and responsibility like '$responsibility'   ");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		//echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $community_details = array($details['governance_id'], $details['name_of_committee'], $details['status_of_committee'], $details['served_from'], $details['served_to'], $details['role'], $details['responsibility']);
		foreach($community_details as $a)
    		echo $a."|";
		}

    
		mysql_close($con);
			
	// }
//}
?>