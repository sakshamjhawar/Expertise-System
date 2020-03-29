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
		
		$result = mysql_query("select MAX(award_id) from award where id = '$id' group by id");	
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
		$aid=$result['MAX(award_id)'];
		$aid = $aid+1;
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
		
		$aname = mysql_real_escape_string($_POST['aname']);
		//echo "Hi5".$aid.$aname;
		//echo $aname;
		$agency = mysql_real_escape_string($_POST['agency']);
		$date = mysql_real_escape_string($_POST['date']);
		
		$url = mysql_real_escape_string($_POST['url']);
		$rmk = mysql_real_escape_string($_POST['rmk']);
		
		
		
			
			
		
		if(!mysql_query("INSERT INTO award (id,award_id,award_name,award_agency,award_date,url,remark) VALUES('$id','$aid','$aname','$agency','$date','$url','$rmk')"))
		{
				
			echo mysql_error();
			//echo 'Some problem occured. Please try again later.';
			return;
		}

			echo $aid;;
			mysql_close($con);
			
	 }
//}
?>