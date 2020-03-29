<html>
<head>
<title>LOGGED IN</title>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ALL ^ E_NOTICE);
/*function mail_to($to, $subject, $body)
{
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't work
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
 
$mail->Username = "kpushpinder28@gmail.com";
$mail->Password = "maipagalhu1";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "kpushpinder28@gmail.com";
$mail->FromName = "Pushpinder";
 
$mail->addAddress($to,"User 1");
//$mail->addAddress("kpushpinder28@gmail.com","User 2");
 
//$mail->addCC("user.3@ymail.com","User 3");
//$mail->addBCC("user.4@in.com","User 4");
 
$mail->Subject = $subject;
$mail->Body = $body;
 
if(!$mail->Send())
{
    //echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
	echo '<script type="text/javascript">alert("Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo);</script>';
	return false;
}
else
{
	
    echo '<script type="text/javascript">alert("Your account has been registered. Please activate your account from your registered mail id.");
	window.location = "login.php";
	</script>';
	return true;
}
}*/
function createid($gen,$name,$phno,$pass,$dept)
{
	$id = array(10);
	/*
	if($gen=="Male")
   {
       $id[0]="M";
   }
   elseif($gen=="Female")
   {
       $id[0]="F";
   }
   */
   $i = time();
   $id[1] = ((intval(date('m', $i)) * 67)+intval(date('s', $i)))%97;
   $name = trim($name);
   $len = strlen($name);
   $arr = str_split($name);
   $id[2] = $arr[$len-1];
   $id[3] = $arr[0];
   
  	if( ctype_digit(strval($phno)) )
	{
		$phno1 = str_split($phno);
		$sum = intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) ;
		$sum = (string) $sum;
		if( strlen($sum) == 2 )
		{
			$sum1 = str_split($sum);
			$id[4] = $sum1[1];
			$id[5] = $sum1[0];
		}
		else if( strlen($sum) == 1)
		{
			$id[4] = $sum;
			$id[5] = 0;
		}
	}
	else
	{
		$id[4] = rand(0, 9);
		$id[5] = rand(0, 9);
	}
	
	$pass = str_split($pass);
	$r1 = rand(0, 31);
	$r2 = rand(0, 31);
	//print $r1."   ".$pass[$r1]."    ".$r2."     ".$pass[$r2];
	$i1 = ord($pass[$r1]) + ord('$') - ord('!');
	$i2 = ord($pass[$r2]) - ord('"') + ord('(');
	if( ($i1 > 57 && $i1 < 65))
		$i1 = $i1 - 10;
	else if( ($i1 > 90 && $i1 < 97) )
		$i1 = $i1 - 26;
	else if( $i1 > 122  )
		$i1 = $i1 - 26;
	
	//echo "$i2 = ".$i2." ";
	if( ($i2 > 57 && $i2 < 65) )
			$i2 = $i2 - 10;
	else if($i2 > 90 && $i2 < 97)
		$i2 = $i2 - 26;
	else  if($i2 > 122)
		$i2 = $i2 - 26;
	//echo $i2."   	";
	$id[6] = chr($i1);
	$id[7] = chr($i2);
	
	//$dept = trim($dept);
	//$res = explode(' ', $dept);
	//$res0 = str_split($res[0]);
	
	//$res1 = str_split($res[1]);
	
	//echo $res0.'   '.$res1;
	$id[0] = $dept[0];
	$id[8] = $dept[1];
	
	//print_r($id);
	return implode("",$id);
}
//echo "php working";
function proper_case($name)
{
	if( strpos($name, ' ') !== true) 
	{
		 $name = explode(' ', trim($name));
	  // print_r($name);
	   $str = "";
	   foreach ( $name as $n)
	   {
			$n = str_split($n);
			//print_r($n);
			if((ord($n[0])>=97 && ord($n[0])<=122))
			{
				$n[0] = chr(ord($n[0]) - 32);
				$n = implode("", $n);
			}
			$str .= " ";
			$str .= $n;
	   }
	   $str = trim($str);
	   return $str;
	}
	else
	{
		if( ord($name[0]) >= 97 && ord($name[0]) <= 122 )
		{
			$name[0] = chr(ord($name[0] - 32));
			/*echo '<script type="text/javascript">alert("name = " + $name)</script>';*/
		}
		return $name;
	}
   
}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset( $_POST['depselect'])) 
{	
		//echo "in POST";
		include("../college site/db.php");
		//echo "connected";
		if(!mysql_select_db('college site'))
			echo mysql_error();
		//echo "db dn";
		$name = mysql_real_escape_string($_POST['uname']);
	
		$gender = mysql_real_escape_string($_POST['gender']);
		$dob = mysql_real_escape_string($_POST['dob']);
		//$parts = explode('-', $dob);
		//$dob = $parts[2].'-'.$parts[1].'-'.$parts[0];
		if(isset( $_POST['depselect']) ) $dept = $_POST['depselect']; else $dept = 'Information Science and Engineering';
		$doj = mysql_real_escape_string($_POST['doj']);
		//$parts = explode('-', $doj);
		//$doj = $parts[2].'-'.$parts[1].'-'.$parts[0];
		$email = mysql_real_escape_string($_POST['email']);
		$mobile = mysql_real_escape_string($_POST['mobile']);
		$addr = mysql_real_escape_string($_POST['address']);
		$passwords = mysql_real_escape_string($_POST['pass']);
		$password = md5($passwords);
		echo $name.'   '.$email.'    '.$password.'   '.$passwords.'   '.'dept = '.$dept.' doj = '.$doj.' dob = '.$dob;
		//$name = proper_case($name);
		$query_verify_email = "SELECT * FROM users WHERE email ='$email'";
		$verified_email = mysql_query($query_verify_email);
		if (!$verified_email) 
		{
			echo '<script type="text/javascript">alert("System Error. Please try again later.")</script>';
		}
		if (mysql_num_rows($verified_email) == 0) 
		{
		// Generate a unique code:
			$hash = md5(uniqid(rand(), true));
			$id = createid($gender, $name, $mobile, $password, $dept);
			$query_create_user = "INSERT INTO `users` (`id`,  `email`, `password`, `hash`) VALUES ( '$id', '$email', '$password', '$hash')";
			
			$created_user = mysql_query($query_create_user);
			if (!$created_user) 
			{
				echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
				return;
			}
			
			else
			{ //If the Insert Query was successfull.
				//	$subject = 'Activate Your Email';
		
			//$headers = "From: kpushpinder28@gmail.com\r\n";
			//$headers .= "MIME-Version: 1.0\r\n";
			//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			/*$url= 'http://localhost/modified' . '/verify.php?email=' . urlencode($email) . "&key=$hash";
			$message = '<p>Dear '.$name.',<br></p>Greetings from RVCE!';
			$message.= '<p><b><font color = "red">This mail is confidential. Please do not share it with anyone as it directly leads to your account.</font></b></p>';
			$message.= '<p>Your credentials are: </p><font color="blue"><p>ID :  <b>'.$id.'</b></p><p>Username :  <b>'.$email.'</font></p>';
			$message.='<p>You can login with either your Username or ID.</p>';
			$message.='<p>To activate your account please click on Activate buttton</p>';
			$message.='<table cellspacing="0" cellpadding="0"> <tr>';
			$message.= '<td align="center" width="300" height="40" bgcolor="#000091" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
			color: #ffffff; display: block;">';
			$message .= '<a href="'.$url.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none;
			line-height:40px; width:100%; display:inline-block">Click to Activate</a>';
			$message .= '</td> </tr> </table>';
			$message.='<br><br><p>Regards</p><p>Team RVCE</p>';
			
			if(mail_to($email, $subject, $message))
			{
				echo '<script type="text/javascript">alert("Thanks for registering! A confirmation email
			has been sent to your registered email id. Please click on the Activate Button to Activate your account."); 		window.location="login.php";
			</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
			}
			//header('Location: http://localhost/modified/login.php');
			}
			// else
			//{ // If it did not run OK.
			//	echo '<div>You could not be registered due to a system
				//error. We apologize for any
				//inconvenience.</div>';
			//}
			 //  echo 'YOU HAVE BEEN REGISTERED...';*/
			
			$reg = "INSERT INTO faculty_member(`fid`,`username`,`password`,`name`,`address`,`phone_number`,`gender`,`email`,`date_of_join`,`date_of_birth`,`department`)  values('$id','$email','$password','$name','$addr','$mobile','$gender','$email','$doj','$dob','$dept')";
			if(!mysql_query($reg))
			{
			echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
			            }
            else
            {   
            //	echo '<div>Email already registered</div>';
               /* echo '<script type="text/javascript">alert("Email already registered")</script>';*/
            }
	}
    }
	else
	{
		echo '<script type="text/javascript">alert("
		 already registered. Please try logging into your account.");
		window.location="login.php";
		</script>';
	}
  

}
//mail_to('anand.sheen93@gmail.com', 'hgdf', 'hgjfsdgkgef');
?>


</head>
<body>
YOU HAVE SUCCESSFULLY LOGGED IN!!!
<a href="/collegesite/modified/login.php">LOGIN HERE</a>
</body>
</html>
