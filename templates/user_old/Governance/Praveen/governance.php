
<html>
<head>

<title> Governance Details </title>

<link rel="stylesheet" type="text/css" href="../../../style.css" />

<script type="text/javascript" >

	function fsubmit()
	{
		var name_of_committee = document.getElementById('name_of_committee');
		var status_of_committee = document.getElementById('status_of_committee');
		var service_from = document.getElementById('service_from');
		var service_to = document.getElementById('service_to');
		var role = document.getElementById('role');
		var responsibility = document.getElementById('responsibility');

		var alphaExp = /^[a-zA-Z ]*$/;
		var date1 = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;

		if (name_of_committee.value=="")
		{
			alert('Please enter the Name of the committee');
			name_of_committee.focus();
			name_of_committee.select();
			return false;
		}
		else
		{
			if(!name_of_committee.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Name of committee');
				name_of_committee.focus();
				name_of_committee.select();
				return false;
			}
		}

		if(status_of_committee.value == "-1")
		{
			alert('Please select Status of Committee');
			return false;
		}
		
		if (service_from.value == "" )
		{
			alert('Please enter the Date of starting of service');
			service_from.focus();
			service_from.select();
			return false;
		}
		else
			{
					if(!service_from.value.match(date1))
					{
							alert('Please enter Valid date in format YYYY-MM-DD');
							service_from.focus();
							service_from.select();
							return false;
					}
			}


	if (service_to.value != "" )
			{
						if(!service_to.value.match(date1))
						{
								alert('Please enter Valid date in format YYYY-MM-DD');
								service_to.focus();
								service_to.select();
								return false;
						}
						
			}


		if (role.value == '' )
		{
			alert('Please enter a Role');
			role.focus();
			role.select();
			return false;
		}
		

	}

</script>
</head>
<body>
<h1 style="color:green; text-align:center; margin-top:2%">Governance Details</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return fsubmit();">
<div class="div_award_main">
<p class="div_award_field_text" style="color:red; display: block;"><b>Enter the details of Governance</b></p>

<span class= "div_award_field_text">Name of Committee</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="name_of_committee" id="name_of_committee" maxlength=100 size=100>
        <br/>
        <br/>

<span class= "div_award_field_text">Status of the Committee</span>
        <span id="star">*</span>
<select name="status_of_committee" id="status_of_committee" class="award_form_input">
<option value="-1">Status of Committee</option>state
<option value="State">State</option>state
<option value="University">University</option>university
<option value="Others">Others</option>other
</select>
<br><br>

<span class= "div_award_field_text">Service from</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="service_from" id="service_from" value="<?php echo date('Y-m-d'); ?>" maxlength=12 size=12>
        <br/>
        <br/>

<span class= "div_award_field_text">Service to</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="service_to" id="service_to" maxlength=12 size=12>
        <br/>
        <br/>
        
<span class= "div_award_field_text">Role</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="role" id="role" maxlength=50 size=50>
        <br/>
        <br/>
        
<span class= "div_award_field_text">Responsibility</span>
        <input class="award_form_input" type=name name="responsibility" id="responsibility" maxlength=50 size=50>
        <br/>
        <br/>

<span class= "div_award_field_text">Additional Information about the role/responsibility/service</span>
        <input class="award_form_input" type=name name="additional_info" id="additional_info" maxlength=50 size=100>
        <br/>
        <br/>

 <span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>    
 <input type="submit" class="form_button_register_page_submit" value="Submit" style="margin-right:8%; margin-top: 8%; outline:none">

</form>
</div>
<p>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$con=mysql_connect('localhost','root','rock');
		if(!($con))
		{
			die('could not connect:'.mysql_error());
		}

		mysql_select_db('college site');

		$result = mysql_query("select committee_id FROM governance order by committee_id desc");
		$row=mysql_fetch_array($result);
		$committee_id=0;

		if($row=="")
		{
			$committee_id="1";
		}
		else
		{
			$committee_id = $row['committee_id'];
			++$committee_id;

		}

		$sql="INSERT INTO governance (name_of_committee,status_of_committee,service_from,service_to,role,responsibility,additional_info) VALUES('$_POST[name_of_committee]','$_POST[status_of_committee]','$_POST[service_from]','$_POST[service_to]','$_POST[role]','$_POST[responsibility]','$_POST[additional_info]')";

		if(!mysql_query($sql,$con))
		{
		die('error:'.mysql_error());
		}
		echo "\ncommittee id".$committee_id;
		echo "\nGovernance Details Added";
		mysql_close($con);
	}
?>
</p>
</body>
</html>



