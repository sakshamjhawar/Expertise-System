<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style.css" content="text/css;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<script type="text/javascript">
	var conID; // variable to hold control to be disabled/ made readOnly in case of error.
	function hideAlert() // function to remove error message and enable the control.
	{
		document.getElementById('alertLayer').style.visibility = "hidden";
		document.getElementById('btnsubmit').style.visibility = "visible"; // enabling submit button after error message is displayed.
		var controlType = document.getElementById(conID).type;
		if(controlType == 'select-one')
			document.getElementById(conID).disabled = false;
		else
			document.getElementById(conID).readOnly = false;
	}
	
	function makeAlert(aTitle,aMessage,eid,ht) // function to show error message with title aTiTle and message aMessage at specified height ht and disable the control eid.
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
    }
	
	function validate() // function to validate each of field and call makeAlert() if necessary.
	{
		var fn = document.form1.uname;
		//var pid = document.form1.textid;
		var dp = document.form1.depselect;
		var em = document.form1.email;
		var mob = document.form1.mobile;
		var addr = document.form1.address;
		var sub1 = document.form1.sub1select;
		var sub2 = document.form1.sub2select;
		var sub3 = document.form1.sub3select;
		var pw = document.form1.pass;
		var letters = /^[A-Za-z]/;  
		if(fn.value.match(letters))
		{  
		}  
		else  
		{  
			makeAlert('Name field' , 'Name should not be blank!<br/>Tip: The name must not begin with blank spaces.','uname','200px'); 
			fn.focus();
			return false;  
		} 
		var letters = /^[A-Za-z0-9]+$/;  
		/*if(pid.value.match(letters))
		{  
			
		}  
		else  
		{  
			makeAlert('ID field' , 'Enter a valid ID string!<br/>Tip: Remove blank spaces if any.','textid','300px');
			pid.focus();
			return false;  
		} */
		if(dp.value=='---Choose Department---')
		{
			makeAlert('Department Select' , 'Select a valid Department!','depselect','330px');
			dp.focus();
			return false;
		}
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
		if(em.value.match(mailformat))  
		{  
		}  
		else  
		{  
			makeAlert('Email field' , 'You have entered an invalid email address!<br/>Tip: Remove blank spaces if any.','email','370px'); 
			em.focus(); 
			return false;  
		}  
		var numbers = /^[0-9]+$/;  
		if(mob.value.length ==10)
		{
			if(mob.value.match(numbers))  
			{  
		 
			}  
			else  
			{  
				makeAlert('Phone number field','Mobile number must have numeric characters only!','mobile','410px');  
				mob.focus();
				return false;  
			}  
		}
		else
		{  
			makeAlert('Phone number field' , 'Mobile number must be 10 digits long!','mobile','410px');  
			mob.focus();   
			return false;  
		}
		letters = /^\w/;
		if(addr.value.match(letters))
		{
		}
		else
		{	
			makeAlert('Address field' , 'Address cannot be blank!<br/>Tip: Address must not begin with blank spaces.','address','450px');  
			addr.focus();   
			return false;  
		}
		/*if(sub1.value=='---Choose Subject1---')
		{
			makeAlert('Subject taken field' , 'Select Subject1!','sub1select','580px');
			sub1.focus();
			return false;
		}if(sub2.value=='---Choose Subject2---')
		{
			makeAlert('Subject taken field' , 'Select Subject2!','sub2select','620px');
			sub2.focus();
			return false;
		}if(sub3.value=='---Choose Subject3---')
		{
			makeAlert('Subject taken field' , 'Select Subject3!','sub3select','660px');
			sub3.focus();
			return false;
		}*/
		var re = /^\w+$/;
		var len = pw.value.length;
		if ((len < 6)||(len>10))
		{
			makeAlert('Password field' , 'Password must be 6 to 10 characters long!<br/>Tip: View password help.','pass','700px');
			pw.focus();
			return false;
		} 
		if(!re.test(form1.pass.value))
		{
			makeAlert('Password field' , 'Password must not contain any special characters!<br/>Tip: View password help.','pass','700px');
			pw.focus();
			return false;
		}          
		re = /[0-9]/;
		if(!re.test(form1.pass.value))
		{
			makeAlert('Password field' , 'Password must contain atleast one numeric value!<br/>Tip: View password help.','pass','700px');
			pw.focus();
			return false;
		}
		re = /[A-Za-z]/;
		if(!re.test(form1.pass.value))
		{
			makeAlert('Password field' , 'Password must contain atleast one character!<br/>Tip: View password help.','pass','700px');
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
	function isFalse() // function to hide the confirm submission check box.
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
		float:left;
		cursor: default;
		filter: alpha(opacity=90);
		background-color: #E4E4E4;
		position:absolute;
		margin-left:120px;
		width: 300px;
		height:130px;
		visibility:hidden; 
		z-index: 999;
		border-style: groove;
		border-width: 5px;
		border-color: #FFFFFF;
		border-radius:0.7em;
	}
	.confirmation
	{
		float:left;
		cursor: default;
		filter: alpha(opacity=90);
		background-color: #E4E4E4;
		position:absolute;
		margin-left:120px;
		width: 300px;
		margin-top:2em;
		height:130px;
		visibility:hidden; 
		z-index: 999;
		border-style: groove;
		border-width: 5px;
		border-color: #FFFFFF;
		border-radius:0.7em;
	}
	
</STYLE>
</head>

<body>
<div id="alertLayer" class="alertBoxStyle">

	<table border=0 width=100% height=100%>
	<tr height=5><td colspan=4 align="center" id="alertttl" class="alertTitle"></td></tr>
	<tr height=5><td width=5></td></tr>
	<tr><td width=5></td><td width="20" align="left"><img src="rvcelogo.png" class="alerticon"></td><td align="center" id="alertMsg" class="alertMessage"></td><td width=5></td></tr>
	<tr height=5><td width=5></td></tr>
	<tr><td width=5></td><td colspan=2 align=center><input type=button value='OK' onClick='hideAlert()' class="okButton"><BR></td><td width=5></td></tr>
	<tr height=5><td width=5></td></tr>
	</table>
	
</div>
<div class = "header">
	<table align="center">
		<tr>
			<td>
				<img src="rvcelogo.png" height="80em" width="80em" alt="RV logo"/>
			</td>
			<td>
				<h1 style="display:inline-block;"> R.V. COLLEGE OF ENGINEERING </h1>
			</td>
		</tr>
	</table>
</div>

<div class="div_register" >
	<p style="margin-bottom:1.5em;'"> Please fill the form </p>
   	<form id="form1" name="form1"  method="post" target="_self" style="background-color:#FFFF99;">
		
		<div id="confirmLayer" class=confirmation>
		<table border="0" width=100% height=100%>
		<tr height="5"><td colspan="4" class="alertTitle">Confirm submission</td></tr>
		<tr height="5"><td width="5"></td></tr>
		<tr><td width="5"></td><td width="20" align="left"><img src="rvcelogo.png" class="alerticon"></td><td align="center" class="alertMessage">Are you sure?<BR></td><td width="5"></td></tr>
		<tr height="5"><td width="5"></td></tr>
		<tr><td width="5"></td><td width="5"></td><td align="center"><input type="submit" value='YES' class="okButton" onclick="/modified/temp.php"><input type="button" value='NO' onClick="isFalse()" class="okButton"><BR></td><td width="5"></td></tr>
		<tr height="5"><td width=5></td></tr>
		</table>
		</div>
		
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
		<td class="register_form_field_container"><span id="register_form_fields">Date_of_Birth<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="text" name="dob" id="dob" placeholder="dd-mm-yyyy" required="required"/><br/><br/></td>
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
		<option>Computer Science
        </option>
        <option>Information Science
        </option>
        <option>Mechanical
        </option>
        </select>
		<br/><br/>
		</td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Joining_date<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="text" name="doj" id="doj" placeholder="dd-mm-yyyy" required="required"/><br/><br/></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Email Address<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="text" name="email" id="email" placeholder="xyz@abc.com" required="required" /><br/><br/></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Phone Number<span id="star" style="font-size:15px;">*</span></td>
		<td><input class = "register_form_input" type="text" id="mobile" name="mobile" placeholder="+91-" maxlength="10" required="required" /><br/><br/></td>
		</tr>
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Address<span id="star" style="font-size:15px;">*<br/><br/><br/><br/><br/><br/> </span></td>
		<td><textarea class="text_area" rows="3" cols="31" style="height:80px;" placeholder="Type your address" id="address" name="address" required="required"></textarea><br/><br/></td>
		</tr>
		<!--<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Subjects taken<span id="star" style="font-size:15px;">*<br/><br/><br/><br/><br/><br></span></td>
		<td>
		<select class="register_form_select" id="sub1select" name="sub1select"> 
        <option selected="selected">---Choose Subject1---
        </option>
		<option>Subject1
        </option>
        <option>Subject2
        </option>
        <option>Subject3
        </option>
        </select>
        <select class="register_form_select" id="sub2select" name="sub2select"> 
        <option selected="selected">---Choose Subject2---
        </option>
		<option>Subject1
        </option>
        <option>Subject2
        </option>
        <option>Subject3
        </option>
        </select>
        <select class="register_form_select" id="sub3select" name="sub3select"> 
        <option selected="selected">---Choose Subject3---
        </option>
		<option>Subject1
        </option>
        <option>Subject2
        </option>
        <option>Subject3
        </option>
        </select>
		</td>
		</tr>-->
		<tr>
		<td class="register_form_field_container"><span id="register_form_fields">Password<span id="star" style="font-size:15px;" pattern="">*</span></td>
		<td><input class = "register_form_input" type="password" id="pass" name="pass" placeholder="Type your password" maxlength="10" required="required" style="width:15em; float:left;"/>&nbsp&nbsp <a href="#" tooltip="The password must be 6 to 10 characters long combination of alphabets with least one digit without any special characters." class="pass_tip">help?</a><td/>
		</tr>
		</table>
		
    <input type="button" class="form_button_register_page_submit" onclick="return validate();" id="btnsubmit" value="Submit"/>	
	<br/>
	<br/>
	</form>
<br/>
<br/>
</div>
</body>
</html>

