<?php	
		error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");	

		if(!mysql_select_db('college site'))
		{	echo mysql_error();
			return;
		}
		
		//echo "hi";
		$aid = mysql_real_escape_string($_POST['id']);
		$aname = mysql_real_escape_string($_POST['name']);
		$agency = mysql_real_escape_string($_POST['agency']);
		$from_date = mysql_real_escape_string($_POST['from_date']);
		$to_date = mysql_real_escape_string($_POST['to_date']);
		
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		
		
		if($aid == '')
			$aid = '%';
		if($aname == '')
			$aname = '%';
		if($agency == '')
			$agency = '%';
		if($from_date == '')
			$from_date = '1970-01-01';
		if($to_date == '')
			$to_date = '2999-01-01';
			
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		$result = mysql_query("select * FROM award where id = '$id' and award_id like '$aid' and award_name like '$aname' and award_agency like '$agency' and award_date >= '$from_date' and award_date <= '$to_date' ");	
		if(!$result)
		{
			return;
		}
		else
		{
				//$row=mysql_fetch_array($result);
				$num = mysql_num_rows($result);
				//echo $num;
				for ($i = 0; $i < $num; $i++){
				$details = mysql_fetch_array($result);
				$award_details = array($details['award_id'], $details['award_name'], $details['award_agency'], $details['award_date'], $details['url'], $details['remark']);
				foreach($award_details as $a)
					echo $a."|";
				}
		
			
				mysql_close($con);
		}
			
	// }
//}
?>