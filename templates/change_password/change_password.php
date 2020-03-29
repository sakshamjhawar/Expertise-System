<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
<script src="../../js/jquery-1.11.1.min.js"></script>

<script>
	function formsubmit()
	{
		old_password = document.getElementById('old_password').value;
		new_password = document.getElementById('new_password').value;
		confirm_password = document.getElementById('confirm_password').value;
		
		if(old_password == '')
		{
			alert('Old Password cannot be empty!');
			return false;	
		}
		
		if(new_password == '')
		{
			alert('New Password cannot be empty!');
			return false;	
		}
		
		if(confirm_password == '')
		{
			alert('Confirm Password cannot be empty!');
			return false;	
		}
		
		if(new_password != confirm_password)
		{	
			alert('New Password and Confirm Password are not same!');
			return false;
		}
		
		$.ajax({
			type:"POST",
			url:"change_password_back.php",
			data:{old_password:old_password, new_password : new_password}
	}).done(function(data){
			alert(data);
			if(data == 'Password Successfully Changed')
			{
				alert('Please login with your new password!');
				window.location = '../login/logout.php';
			}
		});
		
	}

</script>
<title>Change Password</title>
</head>

<body >
<div class="div_change_password_main">
	<h2>Change Password </h2>
    <div style="margin-top:10%">
    <span id= "register_form_fields" >Old Password</span>
    <span id="star">*</span>
    <input class = "register_form_input" type="password" id="old_password" required="required" maxlength="10" />
    <br>
    <br>
    <br />
    
    <span id= "register_form_fields" >New Password</span>
    <span id="star">*</span>
    <input class = "register_form_input" type="password" id="new_password" required="required" maxlength="10"/>
    <br>
    <br>
    <br />
        
    <span id= "register_form_fields" >Confirm Password</span>
    <span id="star">*</span>
    <input class = "register_form_input" type="password" id="confirm_password" required="required" maxlength="10"/>
    <br>
    <br>
    <br />
    
     <input type="button" class='form_button_register_page_submit' value='Change Password' style='margin-left:75%; margin-top: 8%; outline:none; width:auto' onClick="formsubmit()">
   </div>
</div>
</body>
</html>
