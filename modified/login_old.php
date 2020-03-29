<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Login Page</title>
<?php
	session_start();
	if(isset($_SESSION['uname']))
	{	unset($_SESSION['uname']);
	}
	session_destroy();
	error_reporting(E_ALL ^ E_DEPRECATED);

	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../college site/db.php");
		//echo "connected";
		
		

		if(!mysql_select_db('college site'))
		{
				echo '<script type="text/javascript">alert("Some problem occured. Please contact the administrator");</script>';	
				return;
		}
	//	echo "db dn";
	$uname = mysql_real_escape_string($_POST['uname']);
	//echo $uname." ";
    $pass = mysql_real_escape_string($_POST['pass']);
	//echo $pass." ";
	$query = "select * from login where `username` = '$uname' or `id` = '$uname'";
	//echo $query;
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	//echo $num;
	if( $num == 1)
	{	
		//echo "in";
		$details = mysql_fetch_array($result);
		$pa = $details['password'];
		//echo $pa." ";
		//echo md5($pass);
		if( $pa == md5($pass))
		{
			$id = $details['id'];
			$query_fetch_name = "select name from faculty_member where `fid` = '$id'";
			$result_fetch_name = mysql_query($query_fetch_name);
			$result_fetch = mysql_fetch_array($result_fetch_name);
			$uname = $result_fetch['name'];
			session_start();
			//$_SESSION['uname'] = $uname;
			$_SESSION['faculty_id'] = $id;
			//echo $_SESSION['uname'];
			header('Location: http://localhost/college%20site/Main.php');
		}
		else
		{
			echo '<script type="text/javascript">alert("Incorrect username or password.")</script>';
		}
	}
	else
	{
		echo '<script type="text/javascript">alert("the username is not registered.")</script>';
	}
	}
?>
    
<script type="text/javascript">
 var conID; // variable to hold control to be disabled/ made readOnly in case of error.
	function hideAlert() // function to remove error message and enable the control.
	{
		document.getElementById('alertLayer').style.visibility = "hidden";
		document.getElementById(conID).readOnly = false;
		document.getElementById('btnlogin').style.visibility = "visible";
	document.getElementById('btnreg').style.visibility = "visible";
	}
	
	function makeAlert(aTitle,aMessage,eid,ht) // function to show error message with title aTiTle and message aMessage at specified height ht and disable the control eid.
	{
	document.getElementById('alertLayer').style.marginTop=ht;
	conID = eid;
	document.getElementById(conID).readOnly = true;
	document.getElementById('btnlogin').style.visibility = "hidden";
	document.getElementById('btnreg').style.visibility = "hidden";
	document.getElementById('alertttl').innerHTML = aTitle;
	document.getElementById('alertMsg').innerHTML = aMessage;
	document.getElementById('alertLayer').style.visibility = "visible";
    }
	
	function validate()
	{
		var em = document.form1.uname;
		var pw = document.form1.pass;
		//var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
		/*if(em.value.match(mailformat))  
		{  
		}  
		else  
		{  
			makeAlert('Username field' , 'You have entered an invalid Username string!<br/>Tip: Your registered email is your Username.','uname','80px'); 
			em.focus(); 
			return false;  
		}  */
		var re = /^\w+$/;
		/*var len = pw.value.length;
		if ((len < 6)||(len>10))
		{
			makeAlert('Password field' , 'Invalid password string.<br/>Tip: Follow the forget password link.','pass','150px');
			pw.focus();
			return false;
		} 
		if(!re.test(form1.pass.value))
		{
			makeAlert('Password field' , 'Invalid password string.<br/>Tip: Follow the forget password link.','pass','150px');
			pw.focus();
			return false;
		}          
		re = /[0-9]/;
		if(!re.test(form1.pass.value))
		{
			makeAlert('Password field' , 'Invalid password string.<br/>Tip: Follow the forget password link.','pass','150px0px')
			pw.focus();
			return false;
		}*/
		return true;
	}
</script>
<STYLE type="text/css">
	.okButton 
	{
		background-color:#9DA3FF;
		font-color: #000000;
		font-size: 9pt;
		font-family: arial;
		width:70px;
		height:25px; 
		border-radius:1em; 
	}
	.okButton:hover
	{
		background-color:#6393DC;
	}
	.alertTitle 
	{
		background-color: #3C56FF;
		font-family: arial;
		font-size: 9pt;
		color: #FFFFFF;
		font-weight: bold;
		text-align: center;

	}
	.alertMessage 
	{
		font-family: arial;
		font-size: 9pt;
		color: #000000;
		font-weight: normal;
		text-align:justify;
	}
	.alerticon
	{
		width:40px;
		height:40px;
	}
	.alertBoxStyle 
	{
		cursor: default;
		filter: alpha(opacity=90);
		background-color: #E4E4E4;
		position: absolute;
		top: 200px;
		left: 200px;
		width: 300px;
		height:130px;
		visibility:hidden; z-index: 999;
		border-style: groove;
		border-width: 5px;
		border-color: #FFFFFF;
		border-radius:0.7em;
	}
	
</STYLE>
</head>

<body>
<div class = "header">
	<table align="center">
		<tr>
			<td>
				<img src="rvcelogo.png" height="80em" width="80em" alt="RV logo"/>
			</td>
			<td>
				<h1 style="display:inline-block"> R.V. COLLEGE OF ENGINEERING </h1>
			</td>
		</tr>
	</table>
</div>
<div id="alertLayer" class=alertBoxStyle>

	<table border=0 width=100% height=100%>
	<tr height=5><td colspan=4 align="center" id="alertttl" class="alertTitle"></td></tr>
	<tr height=5><td width=5></td></tr>
	<tr><td width=5></td><td width="20" align="left"><img src="rvcelogo.png" class="alerticon"></td><td align="center" id="alertMsg" class="alertMessage"></td><td width=5></td></tr>
	<tr height=5><td width=5></td></tr>
	<tr><td width=5></td><td colspan=2 align=center><input type=button value='OK' onClick='hideAlert()' class="okButton"><BR></td><td width=5></td></tr>
	<tr height=5><td width=5></td></tr>
	</table>
	
</div>
<div class="div_login">
	<form class = "login_form" " method="post" id="form1" name="form1" onsubmit="return validate();">
    	<h2 style="margin-left:2.75em; color:red; margin-top:1.5em; margin-bottom:1.75em;">Faculty Login</h2>
        
        <p style="line-height:1px; font-size:20px; font-family:Verdana, Geneva, sans-serif">Username</p>
        <input style=" display:block; margin-top:10px; background-image:url('yellow-user-icon.png'); background-repeat:no-repeat;" class="login_form_input" type="text"  name="uname" id="uname" required="required" placeholder="Username"/>   
        <br/>
        <br/>
        <span style="display:block line-height:1px; font-size:20px; font-family:Verdana, Geneva, sans-serif">Password</span>
        <a href="forgot-password.php" class="forgot" target="_self">Forgot Password?</a>
        <input style=" display:block; margin-top:10px; background-image:url('yellow-lock-icon.png'); background-repeat:no-repeat;" class="login_form_input" type="password" name="pass" id="pass" required="required" placeholder="Password" maxlength="10"/>  
        <br/>
        <input class="form_button_login" type="submit" id="btnlogin" name="btnlogin" value="Log in"/>
        <a href="register.php"> 
        <input class="form_button_register" type="button" name="btnreg" id="btnreg" value="Register"/></a>
        <br/>
        <input type="checkbox" name="remember_me" value="Remember me" />
        <p style="display:inline-block">Remember me</p>
        
    </form>
</div>


</body>
</html>
