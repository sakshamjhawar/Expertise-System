<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Forgot Password</title>
<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	include '../mail/mail.php';
	include 'config.php';

	session_start();
	if(isset($_SESSION['uname']))
	{	
		unset($_SESSION['uname']);
	}
	session_destroy();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../db/db.php");
		if(!mysql_select_db('college site'))
		{
				echo mysql_error();
				echo '<script type="text/javascript">alert("Some problem occured. Please try again later. ")</script>';
				return;
		}
		$uname = mysql_real_escape_string($_POST['uname']);
		echo "<script type='text/javascript'>alert('uname = ' + '$uname')</script>";
		$subject = 'Reset Your Password';
		$headers = "From: kpushpinder28@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		//$serverIP = $_SERVER['SERVER_ADDR'];
		$url= "http://$serverIP/FacultyManagementSystem/php/login/resetPassword.php?email=" . urlencode($uname);
		echo "<script>alert($url)</script>";
		$message = '<p>Greetings from RVCE!</p>';
		$message.= '<p><b><font color = "red">Please do not share it with anyone as it directly leads to your account.</font></b></p>';
		$message.='<table cellspacing="0" cellpadding="0"> <tr>';
		$message.= '<td align="center" width="300" height="40" bgcolor="#000091" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
				color: #ffffff; display: block;">';
		$message .= '<a href="'.$url.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none;
				line-height:40px; width:100%; display:inline-block">Reset Password</a>';
		$message .= '</td> </tr> </table>';
		$message.='<br><br><p>Regards</p><p>Team RVCE</p>';
		if(!mail_to($uname, $subject, $message)){
			echo "<script>alert('Check your internet connection.')</script>";
		}
		else {
			echo "<script>alert('A mail has been sent to $uname. Please follow the instructions in the mail to change your password');</script>";
		}
	}
?>
    
<script type="text/javascript">
 var conID; // variable to hold control to be disabled/ made readOnly in case of error.
 	
	function validate(value)
	{
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		//var mailformat = /^\w+([\.-]?\w+)*@rvce.edu.in$/;
		if(!value.match(mailformat))  
		{  
			document.getElementById("validEmail").innerHTML = "Invalid Email Address";
			em.focus(); 
			return false;  
		}  
		else
		{
			document.getElementById("validEmail").innerHTML = "";
		}
		
		var pw = document.form1.pass;
		
		return true;
	}

	function checkUsernameOrMail(mail){
		if(window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}
		else{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if(xmlHttp.responseText != ""){
                    document.getElementById("uname").innerHTML = "";
                }
                document.getElementById("validEmail").innerHTML = xmlHttp.responseText;
            }
        }
        xmlHttp.open("GET","../mail/checkUsernameOrMail.php?q="+mail,true);
        xmlHttp.send();
	}
</script>
</head>

<body>
<div class = "header">
	<table align="center">
		<tr>
			<td>
				<img src="../../images/rvcelogo.png" height="80em" width="80em" alt="RV logo"/>
			</td>
			<td>
				<h1 style="display:inline-block"> R.V. COLLEGE OF ENGINEERING </h1>
			</td>
		</tr>
	</table>
</div>

<div class="div_forgot_password">
	<form class = "login_form" " method="post" id="form1" name="form1">
    	<h3 style="color:red; margin-top:1.5em; margin-bottom:1.75em; font-variant: small-caps;">Reset your password</h3>
        <input style=" display:block; margin-top:10px; background-image:url('yellow-user-icon.png'); background-repeat:no-repeat;" class="login_form_input" type="text"  name="uname" id="uname" required="required" placeholder="Registered Email Id" onblur="validate(this.value); checkUsernameOrMail(this.value)" />   
        <tr>
		<td></td>
		<td><div id = "validEmail"></div></td>
		</tr>
        <br />
        <input class="form_button_login" type="submit" id="btnlogin" name="btnlogin" value="Submit"/>
       
    </form>
</div>


</body>
</html>
