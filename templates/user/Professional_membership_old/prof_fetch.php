<?php
session_start();
$membership_number = $_POST['membership_number'];

//query
		include("../../../db/db.php");

		if(!mysqli_select_db($con,'college site'))
		{
			die(mysqli_error($con));
			return false;
		}
		//$id = 'I4iA41flS';
		$id = $_SESSION['faculty_id'];
		$query = "SELECT * FROM professional_membership where id = '$id' and membership_number = '$membership_number'";
    	$result = mysqli_query($con,$query);
    	$details = mysqli_fetch_array($result);
$award_details = array($details['name'], $details['membership_type'], $details['from_date'], $details['to_date']);
foreach($award_details as $a)
    echo $a.",";
?>