<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../db.php");
		
		$membership_number = $_POST['membership_number'];
		$name = $_POST['name'];
		$membership_type = $_POST['membership_type'];
		$from_date = $_POST['from_date'];
		$to_date= $_POST['to_date'];
		//$additional_information = $_POST['additional_information'];

		if(!mysqli_select_db($con,'college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		if(!(mysqli_query($con,"update professional_membership set to_date = '$to_date', membership_type = '$membership_type', from_date = '$from_date', name = '$name' where membership_number = '$membership_number' and id = '$id'")))
		      echo 'failed update';
	    else
		       echo 'success';
			mysqli_close($con);
	}
?>