<?php

//print_r($_POST);

if($_SERVER["REQUEST_METHOD"]=="POST") 
{
		
		session_start();
		$id=$_SESSION['faculty_id'];	
		//echo "in POST";
		include("../../../db/db.php");
		//echo "connected";
		if(!mysql_select_db('college site'))
			echo mysql_error();
		//echo "db dn";
		$name = mysql_real_escape_string($_POST['uname']);
		$gender = mysql_real_escape_string($_POST['gender']);
		$dob = mysql_real_escape_string($_POST['dob']);
		//$parts = explode('-', $dob);
		//$dob = $parts[2].'-'.$parts[1].'-'.$parts[0];
		if(isset( $_POST['deptselect']))
			$dept = $_POST['deptselect'];
		else
			$dept = "Information Science and Engineering";
		//echo $dept;
		$doj = mysql_real_escape_string($_POST['doj']);
		//$parts = explode('-', $doj);
		//$doj = $parts[2].'-'.$parts[1].'-'.$parts[0];
		//$email = mysql_real_escape_string($_POST['email']);
		$mobile = mysql_real_escape_string($_POST['mobile']);
		$addr = mysql_real_escape_string($_POST['address']);
		/*echo "<script>alert($name.'   '.$email.'    '.'dept = '.$dept.' doj = '.$doj.' dob = '.$dob)</script>";*/
		//$name = proper_case($name);
		//$query_verify_email = "SELECT * FROM users WHERE email ='$email'";
		/*$verified_email = mysql_query($query_verify_email);
		if (!$verified_email) 
		{
			echo '<script type="text/javascript">alert("System Error. Please try again later.")</script>';
		}*/
		//if (mysql_num_rows($verified_email) == 0) 
		//{
		// Generate a unique code:
			//$hash = md5(uniqid(rand(), true));
			//$id = createid($gender, $name, $mobile, $password, $dept);
			//$query_create_user = "INSERT INTO `users` (`id`,  `email`, `password`, `hash`) VALUES ( '$id', '$email', '$password', '$hash')";
			$get_pic = "select * from profile_picture where id = '$id'";
			if(!($result = mysql_query($get_pic)))
			{
				echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
				return;
			}
			else
			{
				$result = mysql_fetch_array($result);
				$path = $result['path'];
				$query_create_user = "update faculty_member set name='$name',address='$addr', phone_number='$mobile', gender='$gender', date_of_join='$doj', date_of_birth='$dob', department='$dept' where fid = '$id'";
				$created_user = mysql_query($query_create_user);
				if (!$created_user) 
				{
					echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
					return;
				}
				//if (mysqli_affected_rows($con) == 1) 
				else
				{ //If the Insert Query was successfull.
					
				}
			
			}
	
}
//mail_to('anand.sheen93@gmail.com', 'hgdf', 'hgjfsdgkgef');
?>
