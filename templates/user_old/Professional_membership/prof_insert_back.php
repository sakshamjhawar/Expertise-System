<?php
	
		session_start();
		include("../../db.php");
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		$result = mysql_query("select MAX(membership_number) from professional_membership where id = '$id'");	
		$row = mysql_fetch_array($result);
		$result = $row['MAX(membership_number)'];

		
		$membership_number=(int)$result+1;
		$membership_type = $_POST['membership_type'];
		$name= $_POST['name'];
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		//$url = $_POST['url'];
		//$additional_information = $_POST['additional_information'];
		
		
		$sql="INSERT INTO professional_membership (id,membership_number,membership_type , name, from_date,to_date) VALUES('$id','$membership_number','$membership_type','$name','$from_date','$to_date')";
		
		if(!mysql_query($sql))
		{
			die('error:'.mysql_error());
		}
		mysql_close($con);

?>
