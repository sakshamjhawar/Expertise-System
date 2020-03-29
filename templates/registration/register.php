<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" href="../../css/style.css" content="text/css;">

<title>Register</title>

<script type="text/javascript">
	var conID; // variable to hold control to be disabled/ made readOnly in case of error.
	/* function hideAlert() // function to remove error message and enable the control.
	{
		document.getElementById('alertLayer').style.visibility = "hidden";
		document.getElementById('btnsubmit').style.visibility = "visible"; // enabling submit button after error message is displayed.
		var controlType = document.getElementById(conID).type;
		if(controlType == 'select-one') 
			document.getElementById(conID).disabled = false;
		else
			document.getElementById(conID).readOnly = false;
	} */
	
	/* function makeAlert(aTitle,aMessage,eid,ht) // function to show error message with title aTiTle and message aMessage at specified height ht and disable the control eid.
	{
		document.getElementById('alertLayer').style.marginTop=ht;
		document.getElementById('btnsubmit').style.visibility = "hidden"; // disabling submit button when error message is displayed.
		conID = eid;
		var controlType = document.getElementById(conID).type;
		if(controlType == 'select-one')
			document.getElementById(conID).disabled = true;
		else
			document.getElementById(conID).readOnly = true;
		document.getElementById('alertttl').innerHTML = aTitle;
		document.getElementById('alertMsg').innerHTML = aMessage;
		document.getElementById('alertLayer').style.visibility = "visible";
    } */
	
	function validate() // function to validate each of field and call makeAlert() if necessary.
	{
		var fn = document.form1.uname;
		var dp = document.form1.depselect;
		var em = document.form1.email;
		var mob = document.form1.mobile;
		var addr = document.form1.address;
		var sub1 = document.form1.sub1select;
		var sub2 = document.form1.sub2select;
		var sub3 = document.form1.sub3select;
		var pw = document.form1.pass;
		var letters = /^[A-Za-z]/;  
		if(!fn.value.match(letters))
		{  
			alert('Name should not be blank! Tip: The name must not begin with blank spaces.');
			fn.focus();
			return false;  
		} 
		var letters = /^[A-Za-z0-9]+$/;  

		if(dp.value=='---Choose Department---')
		{
			alert('Select a valid departmment!');
			dp.focus();
			return false;
		}
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		//var mailformat = /^\w+([\.-]?\w+)*@rvce.edu.in$/;
		
		if(!em.value.match(mailformat))  
		{  
			alert('You have entered an invalid email address! Tip: Use official mail id');
			em.focus(); 
			return false;  
		}  
		var numbers = /^[0-9]+$/;  
		if(mob.value.length ==10)
		{
			if(!mob.value.match(numbers))  
			{  
				alert('Mobile number must have numeric characters only!');
				mob.focus();
				return false; 
			}  
		}
		else
		{  
			alert('Mobile number must be 10 digits long!');
			mob.focus();   
			return false;  
		}
		letters = /^\w/;
		if(!addr.value.match(letters))
		{
			alert('Address cannot be blank! Tip: Address must not begin with blank spaces.'); 
			addr.focus();   
			return false;  
		}

		var re = /^\w+$/;
		var len = pw.value.length;
		if ((len < 6)||(len>10))
		{
			alert('Password must be 6 to 10 characters long! Tip: View password help.');
			pw.focus();
			return false;
		}
		 
		if(!re.test(form1.pass.value))
		{
			alert('Password must not contain any special characters! Tip: View password help.');
			pw.focus();
			return false;
		}          
		
		re = /[0-9]/;
		if(!re.test(form1.pass.value))
		{
			alert('Password must contain atleast one numeric value! Tip: View password help.');
			pw.focus();
			return false;
		}
		
		re = /[A-Za-z]/;
		if(!re.test(form1.pass.value))
		{
			alert('Password must contain atleast one character! Tip: View password help.');
			pw.focus();
			return false;
		}
		
		document.getElementById('btnsubmit').style.visibility = "hidden"; // disabling submit button after confirm submission box is displayed.
		document.getElementById('confirmLayer').style.visibility = "visible"; // call to enable the confirm submission check box.
		var form = document.getElementById('form1');
		var elements = form.elements;
		for (var i=0, len = elements.length; i < len; ++i) // disabling all controls while submitting.
		{
			elements[i].readOnly = true;
			if(elements[i].type == 'select-one')
				elements[i].disabled = true;
		}
		
	}
	
	/* function isFalse() // function to hide the confirm submission check box.
	{
		document.getElementById('btnsubmit').style.visibility = "visible"; // enabling submit button after error message is displayed.
		document.getElementById('confirmLayer').style.visibility = "hidden"; 
		var form = document.getElementById('form1');
		var elements = form.elements;
		for (var i=0, len = elements.length; i < len; ++i)
		{
			elements[i].readOnly = false;
			if(elements[i].type == 'select-one')
				elements[i].disabled = false;
		}
	}
 */
	function checkMail(mail){
		var em = document.form1.email;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
		//var mailformat = /^\w+([\.-]?\w+)*@rvce.edu.in$/;
		if(!em.value.match(mailformat)) {  
			document.getElementById("email").value = "";
			document.getElementById("validEmail").innerHTML = "Use official email id.";
			em.focus(); 
			return false;  
		}  
		else {
			if(window.XMLHttpRequest) {
				xmlHttp = new XMLHttpRequest();
			}
			else {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlHttp.onreadystatechange = function() {
	            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
	                if(xmlHttp.responseText != "") {
	                    document.getElementById("email").value = "";
	                }
	                document.getElementById("validEmail").innerHTML = xmlHttp.responseText;
	            }
	        }
	        xmlHttp.open("GET","checkMail.php?q="+mail,true);
	        xmlHttp.send();
		}
	}
</script>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(E_ALL ^ E_NOTICE);
include '../../php/mail/mail.php';
include '../../php/login/config.php';
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
   
  	if( ctype_digit(strval($phno)) ){
		$phno1 = str_split($phno);
		$sum = intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) + intval($phno1[rand(0, 9)]) ;
		$sum = (string) $sum;
		if( strlen($sum) == 2 ){
			$sum1 = str_split($sum);
			$id[4] = $sum1[1];
			$id[5] = $sum1[0];
		}
		else if( strlen($sum) == 1){
			$id[4] = $sum;
			$id[5] = 0;
		}
	}
	else{
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
	if( ($i2 > 57 && $i2 < 65) )
			$i2 = $i2 - 10;
	else if($i2 > 90 && $i2 < 97)
		$i2 = $i2 - 26;
	else  if($i2 > 122)
		$i2 = $i2 - 26;
	$id[6] = chr($i1);
	$id[7] = chr($i2);
	
	//$dept = trim($dept);
	//$res = explode(' ', $dept);
	//$res0 = str_split($res[0]);
	
	//$res1 = str_split($res[1]);
	
	//echo $res0.'   '.$res1;
	$id[0] = $dept[0];
	$id[8] = $dept[1];
	
	return implode("",$id);
}

function proper_case($name)
{
	if( strpos($name, ' ') !== true) 
	{
	   $name = explode(' ', trim($name));
	   $str = "";
	   foreach ( $name as $n )
	   {
			$n = str_split($n);
			if((ord($n[0])>=97 && ord($n[0])<=122))
			{
				$n[0] = chr(ord($n[0]) - 32);
			}
			$n = implode("", $n);
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
		}
		return $name;
	}
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset( $_POST['depselect'])) 
{	
		include("../../db/db.php");
		if(!mysql_select_db('college site'))
			echo mysql_error();
		$name = mysql_real_escape_string($_POST['uname']);
		$gender = mysql_real_escape_string($_POST['gender']);
		$dob = mysql_real_escape_string($_POST['dob']);
		if(isset( $_POST['depselect']))
		{
			$dept = $_POST['depselect'];
		}
		else
		{
			$dept = 'Information Science and Engineering';
		}
		$doj = mysql_real_escape_string($_POST['doj']);
		$email = mysql_real_escape_string($_POST['email']);
		$mobile = mysql_real_escape_string($_POST['mobile']);
		$addr = mysql_real_escape_string($_POST['address']);
		$passwords = mysql_real_escape_string($_POST['pass']);
		$password = md5($passwords);
		//echo $name.'   '.$email.'    '.$password.'   '.$passwords.'   '.'dept = '.$dept.' doj = '.$doj.' dob = '.$dob;
		//echo "<script>alert('name initially = '+ '$name')</script>";
		$name = proper_case($name);
		//echo "<script>alert('name later = ' + '$name')</script>";
		$query_verify_email = "SELECT * FROM users WHERE email ='$email'";
		if (!($verified_email = mysql_query($query_verify_email))) {
			echo '<script type="text/javascript">alert("System Error. Please try again later.")</script>';
			return;
		}
		if (mysql_num_rows($verified_email) == 0) 
		{
 			// Generate a unique code:
			$hash = md5(uniqid(rand(), true));
			$id = createid($gender, $name, $mobile, $password, $dept);
			
			//send mail first and then insert into the db
			$subject = 'Activate Your Email';
			$headers = "From: kpushpinder28@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		  $url=$serverIP.'/FacultyManagementSystem/php/register/verify.php?email=' . urlencode($email) . "&key=$hash";
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
			if(mail_to($email, $subject, $message)){
				$query_create_user = "INSERT INTO `users` (`id`,  `email`, `password`, `hash`) VALUES ( '$id', '$email', '$password', '$hash')";
				$created_user = mysql_query($query_create_user);
				if (!$created_user){
					echo '<script type="text/javascript">alert("The account is not registered. Please ignore the mail if you have got any and try again later. Sorry for the inconvenience.")</script>';
					return;
				}
				else {
					$reg = "INSERT INTO faculty_member(`fid`,`username`,`name`,`address`,`phone_number`,`gender`,`email`,`date_of_join`,`date_of_birth`,`department`)  values('$id','$email','$name','$addr','$mobile','$gender','$email','$doj','$dob','$dept')";
					if(!mysql_query($reg)){
						echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
					}
					else {
						echo '<script>alert("Thanks for registering! A confirmation email has been sent to your registered email id. Please click on the Activate Button to Activate your account.")</script>';
						$pathname = "../../user_files/".$id;
						if(mkdir($pathname)){
							if(!mkdir($pathname."/awards")){
								echo '<script>alert("dir ".$pathname."_awards not created")</script>';
							}
							if(!mkdir($pathname."/conference")){
								echo '<script>alert("dir ".$pathname."_conference not created")</script>';
							}
							if(!mkdir($pathname."/journal")){
								echo '<script>alert("dir ".$pathname."_journal not created")</script>';
							}
							//make feature to upload degree marks certificate
							if(!mkdir($pathname."/qualification")){
								echo '<script>alert("dir ".$pathname."_qualification not created")</script>';
							}
							if(!mkdir($pathname."/profile")){
								echo '<script>alert("dir ".$pathname."_profile not created")</script>';
							}
							echo '<script>window.location.href = "../login/login.php";</script>';
							
						}
						else {
							echo '<script>alert("dir ".$pathname." not created")</script>';
							
						}
					}
				}
			}
			else{
				echo '<script type="text/javascript">alert("Poor or no connectivity. Please check your internet connection.")</script>';
			}
		}
		else{
			echo '<script type="text/javascript">
			alert("Already registered. Please try logging into your account.");
			window.location="../login/login.php";
			</script>';
		}
    }
?>



</head>

<body>
<div class = "header">
	<table align="center">
		<tr>
			<td>
				<img src="../../images/rvcelogo.png" height="80em" width="80em" alt="RV logo"/>
			</td>
			<td>
				<h1 style="display:inline-block;"> R.V. COLLEGE OF ENGINEERING </h1>
			</td>
		</tr>
	</table>
</div>

<div class="div_register" >
	<p style="margin-bottom:1.5em; font-size:20px; font-variant: small-caps;"> <b>Please fill the form </b></p>
   	<form id="form1" name="form1" method="post" target="_self" style="background-color:#FFFFFF">
				
		<table> 
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Name<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="text" name="uname" id="uname" placeholder="Type your name" required="required"/><br/><br/></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Gender<span id="star" style="font-size:15px;">*</span></td>
		<td>
		<input style="margin-left:3.5em" type="radio" name="gender" id="rad1" required="required" checked="true" value="Male"/>Male
        <input type="radio" style="margin-left:1.5em" name="gender" id="rad2" required="required" value="Female"/>Female
		<br/>
		<br/>
		</td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Date of Birth<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="date" name="dob" id="dob" placeholder="dd-mm-yyyy" required="required"/><br/><br/></td>
		</tr>
		<!--<tr>
		<td class="register_form_field_container"><span id="register_form_fields">ID <span id="star" style="font-size:15px;">*</span></td>
		<td> <input class = "register_form_input" type="text" name="textid" id="textid" placeholder="Type your ID" required="required"/><br/><br/></td>
		</tr>-->
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Department<span id="star" style="font-size:15px;">*</span></td>
		<td>
		<select class="register_form_select" id="depselect" name="depselect"> 
        <option selected="selected">---Choose Department---
        </option>
		<option value = "Computer Science and Engineering" >Computer Science and Engineering
        </option>
        <option value = "Information Science and Engineering">Information Science and Engineering
        </option>
        <option value = "Mechanical Engineering">Mechanical Engineering
        </option>
        <option value = "Civil Engineering">Civil Engineering
        </option>
        <option value = "Instrumentation Engineering">Instrumentation Engineering
        </option>
        <option value = "Electrical Engineering">Electrical Engineering
        </option>
        </select>
		<br/><br/>
		</td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Joining date<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="date" name="doj" id="doj" placeholder="dd-mm-yyyy" required="required"/><br/><br/></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Email Address<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="text" name="email" id="email" placeholder="xyz@abc.com" required="required" onblur="checkMail(this.value)" /><br/><br/></td>
		</tr>
		<tr>
		<td></td>
		<td><div class="valid_email_div"  id = "validEmail"></div></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Phone Number<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="number" maxlength="10" id="mobile" name="mobile" placeholder="+91-" maxlength="10" required="required" /><br/><br/></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Address<span id="star" style="font-size:15px;">*<br/><br/><br/><br/><br/><br/> </span></td>
		<td><textarea class="text_area" rows="3" cols="25" style="height:6em; width:20em" placeholder="Type your address" id="address" name="address" required="required"></textarea><br/><br/></td>
		</tr>
		
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Password<span id="star" style="font-size:15px;" pattern="">*</span></td>
		<td><input class = "register_form_input" type="password" id="pass" name="pass" placeholder="Type your password" maxlength="10" required="required" style="width:15em; float:left;"/>&nbsp&nbsp <a href="#" tooltip="The password must be 6 to 10 characters long combination of alphabets with least one digit without any special characters." class="pass_tip">help?</a><td/>
		</tr>
		</table>
		<br />
		<br />
		
	    <button class="form_button_register_page_submit" onclick="return validate();" id="btnsubmit">Submit</button>
		
	</form>
	<a href="../login/login.php" style="float: left"><button class="form_button_register_page_login">Back to Login Page</button></a>
<br/>
<br/>
</div>
</body>
</html>

