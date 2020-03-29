<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{	
			echo mysql_error();
			return;
		}
		//echo "conn dn";
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		
		$result = mysql_query("select MAX(membership_number) from professional_membership where id = '$id'");	
		//if(!$result)					
			//echo "hsah";
		//echo "hi4";
		/*if(!$result)
		{
			echo 'Some problem occured.';
			return;
		}*/
		
		$result=mysql_fetch_array($result);
		/*if(!$result)
		{
			echo 'Some problem occured.1';
			return;
		}*/
		$membership_number=$result['MAX(membership_number)'];
		$membership_number = $membership_number+1;
/*
		if($row=="")
		{
			$aid="1";
			//echo "1ye";
		}
		else
		{
			$aid = $row['aid'];
			++$aid;
			echo "  ".$aid;
	
		}*/
		
		
		//$aid = 20;
		
		$membership_type = mysql_real_escape_string($_POST['membership_type']);
		//echo "Hi5".$aid.$aname;
		//echo $aname;
		$name = mysql_real_escape_string($_POST['name']);
		$from_date = mysql_real_escape_string($_POST['from_date']);
		
		$to_date = mysql_real_escape_string($_POST['to_date']);
		
		
		
			
			
		
		if(!mysql_query("INSERT INTO professional_membership (id,membership_number,membership_type , name, from_date,to_date) VALUES('$id','$membership_number','$membership_type','$name','$from_date','$to_date')"))
		{
				
			echo mysql_error();
			//echo 'Some problem occured. Please try again later.';
			return;
		}

			echo $membership_number;;
			mysql_close($con);
			
	 }
//}
?>