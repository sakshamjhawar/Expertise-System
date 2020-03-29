<?php	
		error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");	

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		//echo "hi";
		$qualification =mysql_real_escape_string( $_POST['qualification']);
		$institution = mysql_real_escape_string($_POST['institution']);
		$location = mysql_real_escape_string($_POST['location']);
		$university = mysql_real_escape_string($_POST['university']);
		$join_year=$_POST['join_year'];
		
		$pass_year=$_POST['pass_year'];
		
		$percentage=mysql_real_escape_string( $_POST['percentage']);
		$class1=mysql_real_escape_string( $_POST['class1']);
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
			$join_year = '1950';
		else
		{
			$temp = explode('-', $join_year);
			$join_year = $temp[0];
			$join_month = $temp[1];
		}
		if($university == '')
			$university = '%';
		if($pass_year == '')
			$pass_year = '1950';
		else
		{
			$temp = explode('-', $pass_year);
			$pass_year = $temp[0];
			$pass_month = $temp[1];
		}
		if($location == '')
			$location = '%';
			
		if($class1 == '')
			$class1 = '%';
			
		

		//$id = 'I4iA41flS';
		$id=$_SESSION['faculty_id'];
		$result = mysql_query("select * FROM profile where id = '$id' and qualification like '$qualification' and institution like '$institution' and location like '$location' and join_year >= '$join_year' and pass_year >= '$pass_year' and class1 like '$class1' ");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		//echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
		if($details['join_month']<10)
		{
				$join_year= implode("-",array( $details['join_year'],"0".$details['join_month']));
		}
		else
		{
			$join_year= implode("-",array( $details['join_year'],$details['join_month']));
		}
		if($details['pass_month']<10)
		{
				$pass_year= implode("-",array( $details['pass_year'],"0".$details['pass_month']));
		}
		else
		{
			$pass_year= implode("-",array( $details['pass_year'],$details['pass_month']));
		}
        $profile_details = array($details['qualification'], $details['institution'],  $details['location'],$details['university'], $join_year,$pass_year,$details['percentage'],$details['class1']);
		foreach($profile_details as $a)
    		echo $a.",";
		}

    
		mysql_close($con);
			
	// }
//}
?>