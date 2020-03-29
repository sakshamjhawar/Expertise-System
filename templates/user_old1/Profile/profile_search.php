<?php	
		session_start();
		include("../../db.php");	

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		//echo "hi";
		$qualification = $_POST['qualification'];
		$institution = $_POST['institution'];
		$location = $_POST['location'];
		$university = $_POST['university'];
		$join_month = $_POST['join_month'];
		$join_year= $_POST['join_year'];
		$pass_year= $_POST['pass_year'];
		$percentage= $_POST['percentage'];
		$class1= $_POST['class1'];
		//$additional_information = $_POST['additional_information'];
		
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		
		
		if($qualification == '')
			$qualification= '%';
		if($institution== '')
			$institution = '%';
		if($join_year== '')
			$join_year = '1950-01-01';
			if($university == '')
			$university = '%';
		if($pass_year == '')
			$pass_year = '2999-01-01';
		if($location == '')
			$location = '%';
			
		if($class1 == '')
			$class1 = '%';
			
		

		//$id = 'I4iA41flS';
		$id=$_SESSION['fid'];
		$result = mysql_query("select * FROM profile where id = '$id' and qualification like '$qualification' and institution like '$institution' and location like '$location' and join_year >= '$join_year' and pass_year <= '$pass_year' and class1 like '$class1' ");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		//echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $profile_details = array($details['qualification'], $details['institution'],  $details['location'],$details['university'], $details['join_month'], $details['join_year'], $details['pass_year'],$details['percentage'],$details['class1']);
		foreach($profile_details as $a)
    		echo $a.",";
		}

    
		mysql_close($con);
			
	// }
//}
?>