<?php	
		session_start();
		include("../../db.php");	

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		//echo "hi";
		$membership_number = $_POST['membership_number'];
		$name = $_POST['name'];
		$membership_type = $_POST['membership_type'];
		$to_date = $_POST['to_date'];
		$from_date = $_POST['from_date'];
		
		
		
		
		if($membership_number == '')
			$membership_number = '%';
		if($name == '')
			$name = '%';
		if($membership_type == '')
			$membership_type= '%';
		if($from_date == '')
			$from_date = '1950-01-01';
		if($to_date == '')
			$to_date = '2999-01-01';
			

		$id = $_SESSION['faculty_id'];;
		$result = mysql_query("select * FROM professional_membership where id = '$id' and membership_number like '$membership_number' and type like '$membership_type' and name like '$name' and from_date >= '$from_date' and to_date <= '$to_date' ");	
		
		$num = mysql_num_rows($result);
	
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $prof_details = array($details['membership_number'], $details['name'], $details['membership_type'], $details['from_date'], $details['to_date']);
		foreach($prof_details as $a)
    		echo $a.",";
		}

    
		mysql_close();
			
	// }
//}
?>
