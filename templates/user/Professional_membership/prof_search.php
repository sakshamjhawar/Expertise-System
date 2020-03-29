<?php	
		error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");	
		
		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		//echo "hi";
		$membership_number =mysql_real_escape_string( $_POST['membership_number']);
		$name =mysql_real_escape_string( $_POST['name']);
		$membership_type = mysql_real_escape_string($_POST['membership_type']);
		$to_date = mysql_real_escape_string($_POST['to_date']);
		$from_date = mysql_real_escape_string($_POST['from_date']);
		
		
		
		
		if($membership_number == '')
			$membership_number = '%';
		if($name == '')
			$name = '%';
		if($membership_type == '')
			$membership_type= '%';
		if($from_date == '')
			$from_date = '1970-01-01';
		if($to_date == '')
			$to_date = '2999-01-01';
			
		//echo $membership_number.$name.$membership_type.$from_date.$to_date;
		$id = $_SESSION['faculty_id'];
		$result = mysql_query("select * FROM professional_membership where id = '$id' and membership_number like '$membership_number' and membership_type like '$membership_type' and name like '$name' and from_date >= '$from_date' and to_date <= '$to_date' ");	
		
		
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
				$award_details = array($details['membership_number'], $details['name'], $details['membership_type'], $details['from_date'], $details['to_date']);
				foreach($award_details as $a)
					echo $a."|";
				}
		
			
				mysql_close($con);
		}
		
		
				
	// }
//}
?>
