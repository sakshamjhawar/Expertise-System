<?php



		include("../college site/db.php");
		include 'mail.php';
		include '../college site/config.php';
		
		
		//error_reporting(E_ALL ^ E_DEPRECATED);

		if(!mysql_select_db('college site')){
			echo mysql_error();
			return;
		}
		
		
		//echo "helovivek";
		//return;
		
		$email = trim(mysql_escape_string($_GET['email']));
		//echo $email;
		//return;
		$new_password = $_GET['password'];
		//echo $new_password;
		//return;
		$new_password = md5($new_password, true);
		//echo $new_password;
		//echo $update_password_login;
		$update_password_users = "UPDATE users set password = '$new_password' where email =  '$email'";
		//echo $update_password_users;
		//echo $update_password_faculty_member;
		//echo "hi";
		//return;
		
		if(mysql_query($update_password_users)){
			
			echo "Password successfully changed. Login again to continue.";
			//return;
			$subject = 'Password Successfully Changed';
			
			//$headers = "From: kpushpinder28@gmail.com\r\n";
			//$headers .= "MIME-Version: 1.0\r\n";
			//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<p>Dear,<br></p>Greetings from RVCE!';
			$message.= '<p><b><font color = "red">Your account password has been successfully changed.</font></b></p>';
			$message.= '<p>Your credentials are: </p><font color="blue"><p>ID :  </b></p><p>Username :  <b>'.$email.'</font></p>';
			$message.='<p>You can login with either your Username or ID.</p>';
			$message.='<br><br><p>Regards</p><p>Team RVCE</p>';
			echo "Password Successfully Changed!";
			echo "email = ".$email;
			echo "\nsubject = ".$subject;
			echo "\nmessage = ".$message;
			
			if(mail_to($email, $subject, $message)) {
				echo "hi";
				echo '<script type="text/javascript">alert("A confirmation mail has been sent to your registered mail-id!"); window.location = ("http://localhost/modified/login.php");';
				return;
				
			}
			else {
				echo "mail not sent";
				return;
			}
			//header('Location: login.php');
		}
		else {
			echo "alert('Some problem occured. Please try again later')";
			header('Location: forgot-password.php');
		}
	
		return;
		
?>