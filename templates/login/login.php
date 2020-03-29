<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
<title>Login Page</title>
<?php
	session_start();
	if(isset($_SESSION['faculty_id']))
	{	
		if($_SESSION['faculty_id'] == 'admin')
		{
			header('Location: ../admin/admin_view.php');
		}
		else
		{
			header('Location: ../user/Main.php');
		}
	}
	error_reporting(E_ALL ^ E_DEPRECATED);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../db/db.php");
		if(!mysql_select_db('college site'))
		{
				echo '<script type="text/javascript">alert("Some problem occured. Please contact the administrator");</script>';	
				return;
		}

$uname=$_POST['uname'];

echo "uname=$uname------------------";
	//	$uname = mysql_real_escape_string($_POST['uname']);
	  //  $pass = mysql_real_escape_string($_POST['pass']);
		if($uname == "admin" and md5($pass) == "d37a02355b871d23ff27e3af743e5445"){
			session_start();
			$_SESSION['faculty_id'] = 'admin';
			header('Location: ../admin/admin_view.php');
		}
		else{  

echo "<br>******************   unmae=$uname";
			$query = "select id from users where email = '$uname' ";
			$result = mysql_query($query);
			$num = mysql_num_rows($result);

echo "<br>num=$num";

			if( $num == 1){	

echo "uname=$uname  ********* <br>";
				$details = mysql_fetch_array($result);

echo "details=$details";
				if( ($pa = $details['password']) == md5($pass)){
					$id = $details['id'];

echo "id=$id";
					$query_fetch_name = "select name from faculty_member where `fid` = '$id'";
					$result_fetch_name = mysql_query($query_fetch_name);
					$result_fetch = mysql_fetch_array($result_fetch_name);
					$uname = $result_fetch['name'];
					session_start();
					$_SESSION['faculty_id'] = $id;
					header('Location: ../user/Main.php');
				}
				else{
					echo '<script type="text/javascript">alert("Incorrect username or password.")</script>';
				}
			}
			else{
				echo '<script type="text/javascript">alert("User not registered.")</script>';
			}
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
	
	function validate()
	{
		var em = document.form1.uname;
		var pw = document.form1.pass;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		//var mailformat = /^\w+([\.-]?\w+)*@rvce.edu.in$/;
		
		/*if(!em.value.match(mailformat))  
		{  
			alert('Invalid email address. Use official mail id.');
			em.focus(); 
			return false;  
		}  */
		return true;
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
<div id="alertLayer" class=alertBoxStyle>

	<table border=0 width=100% height=100%>
	<tr height=5><td colspan=4 align="center" id="alertttl" class="alertTitle"></td></tr>
	<tr height=5><td width=5></td></tr>
	<tr><td width=5></td><td width="20" align="left"><img src="../../images/rvcelogo.png" class="alerticon"></td><td align="center" id="alertMsg" class="alertMessage"></td><td width=5></td></tr>
	<tr height=5><td width=5></td></tr>
	<tr><td width=5></td><td colspan=2 align=center><input type=button value='OK' onClick='hideAlert()' class="okButton"><BR></td><td width=5></td></tr>
	<tr height=5><td width=5></td></tr>
	</table>
	
</div>
<div class="div_login">
	<form class = "login_form" " method="post" id="form1" name="form1" onsubmit="return validate();">
    	<h2 style="margin-left:2.75em; color:red; margin-top:1.5em; margin-bottom:1.75em; font-variant: small-caps;">Faculty Login</h2>
        
        <p style="line-height:1px; font-size:18px;  font-variant: small-caps;">Username</p>
        <input style=" display:block; margin-top:10px; background-image:url('../../images/yellow-user-icon.png'); background-repeat:no-repeat;" class="login_form_input" type="text"  name="uname" id="uname" required="required" placeholder="Username"/>   
        <br/>
        <br/>
        <span style="display:block line-height:1px; font-size:18px; font-variant: small-caps;">Password</span>
        <a href="../../php/login/forgot-password.php" class="forgot" target="_self" style = "font-variant: small-caps; float: right;">Forgot Password?</a>
        <input style=" display:block; margin-top:10px; background-image:url('../../images/yellow-lock-icon.png'); background-repeat:no-repeat;" class="login_form_input" type="password" name="pass" id="pass" required="required" placeholder="Password" maxlength="10"/>  
        <br/>
        <input class="form_button_login" type="submit" id="btnlogin" name="btnlogin" value="Log in"/>
        <a href="../registration/register.php"> 
        <input class="form_button_register" type="button" name="btnreg" id="btnreg" value="Register"/></a>
        <br/>
        <input type="checkbox" name="remember_me" value="Remember me" />
        <p style="display:inline-block; font-variant: small-caps; font-variant: small-caps;">Remember me</p>
        
    </form>
</div>


</body>
</html>
