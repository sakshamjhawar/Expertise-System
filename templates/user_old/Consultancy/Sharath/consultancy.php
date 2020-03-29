<html>
<head>

<title> Consultancy Details </title>

<link rel="stylesheet" type="text/css" href="../../../style.css" />
<script type="text/javascript" >
	function formsubmit()
	{

		var client = document.getElementById('client');
		var title = document.getElementById('title');
		var sdate = document.getElementById('sdate');
		var cdate = document.getElementById('cdate');
		var f1 = document.getElementById('f1');
		var f2 = document.getElementById('f2');
		var f3 = document.getElementById('f3');
		var revenue = document.getElementById('revenue');
		var summary = document.getElementById('summary');
		var lab = document.getElementById('lab');
		var url = document.getElementById('url');
		var others = document.getElementById('others');

		var alphaExp = /^[a-zA-Z 0]*$/;
		var numExp = /^[0-9]*$/;
		var url1 = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
		var date1 = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;

		if (client.value == "" )
		{
			alert('Please enter the Name of the Client');
			client.focus();
			client.select();
			return false;
		}
		else
		{
			if(!client.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Client');
				client.focus();
				client.select();
				return false;
			}
			
		}
		
		if (title.value == "" )
		{
			alert('Please enter the Title of the work');
			title.focus();
			title.select();
			return false;
		}
		else
		{
			if(!title.value.match(alphaExp))
			{
				alert('Please enter only Letters for Title of the work');
				title.focus();
				title.select();
				return false;
			}
			
		}
		
		if (sdate.value == "" )
		{
			alert('Please enter Duration from (start date)');
			sdate.focus();
			sdate.select();
			return false;
		}
		else
			{
					if(!sdate.value.match(date1))
					{
							alert('Please enter Valid date in format YYYY-MM-DD');
							sdate.focus();
							sdate.select();	
							return false;
					}
					
			}
			
		if (cdate.value != "" )
		{
			if(!cdate.value.match(date1))
					{
							alert('Please enter Valid date in format YYYY-MM-DD');
							sdate.focus();
							sdate.select();	
							return false;
					}
		}
		
		
		if (f1.value == "" )
		{
			alert('Please enter the Faculty 1 - Faculty involved');
			f1.focus();
			f1.select();
			return false;
		}
		else
		{
			if(!f1.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Faculty 1 - Faculty involved');
				f1.focus();
				f1.select();
				return false;
			}
			
		}
		
		if (f2.value != "" )
		{
			if(!f2.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Faculty 2');
				f2.focus();
				f2.select();
				return false;
			}
			
		}
		
		
		if (f3.value != "" )
		{
			if(!f3.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Faculty 3');
				f3.focus();
				f3.select();
				return false;
			}
			
		}
		
		if (revenue.value == "" )
		{
			alert('Please enter the Revenue Generated');
			revenue.focus();
			revenue.select();
			return false;
		}
		else
		{
			if(!revenue.value.match(numExp))
			{
				alert('Please enter only numbers for Revenue Generated');
				revenue.focus();
				revenue.select();
				return false;
			}
			
		}
		
		if (url.value != "" )
		{
			if(!url.value.match(url1))
					{
							alert('Please enter valid URL');
							url.focus();
							url.select();	
							return false;
					}
		}
			
		
	}

</script>
</head>
<body>

<h1 style="color:red; text-align:center; margin-top:2%">Consultancy Details</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return formsubmit();">

<div class="div_consultancy_main">
<p class="div_award_field_text" style="color:red; display: block;"><b>Enter the details of Consultancy undertaken</b></p>

<span class= "div_award_field_text">Name of the Client</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="client" id="client" maxlength=80 size=80>
        <br/>
        <br/>

<span class= "div_award_field_text">Title of the work</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="title" id="title" maxlength=80 size=80>
        <br/>
        <br/>
<span class= "div_award_field_text">Duration from</span>
<span id="star">*</span>
<input class="conference_form_input" type=name name="sdate" id="sdate" size=12 maxlength=12 value="<?php echo date('Y-m-d'); ?>"><br><span class = "dateFormat">(start date YYYY-MM-DD)</span>
<br><br>

<span class= "div_award_field_text">Duration to</span>
<span id="star">*</span>
<input class="conference_form_input" type=name name="cdate" id="cdate" size=12 maxlength=12 ><br><span class = "dateFormat">(completion date YYYY-MM-DD)</span>
<br><br>

<span class= "div_award_field_text">Faculty 1 - Faculty involved </span>
<span id="star">*</span>
<input class="conference_form_input" type=name name="f1" id="f1" size=50 maxlength=50>
<br><span class = "dateFormat">(Your name)</span>
<br><br>

<span class= "div_award_field_text">Faculty 2 </span>
<span id="star">*</span>
<input class="conference_form_input" type=name name="f2" id="f2" size=50 maxlength=50>
<br><span class = "dateFormat">(Other Faculties involved)</span>
<br><br>

<span class= "div_award_field_text">Faculty 3 </span>
<span id="star">*</span>
<input class="conference_form_input" type=name name="f3" id="f3" size=50 maxlength=50>
<br><span class = "dateFormat">(Other Faculties involved)</span>
<br><br>

<span class= "div_consultancy_field_text_revenue">Revenue Generated</span>
<span id="star">*</span>
<input type=name class="consultancy_form_input_revenue" name="revenue" id="revenue" size=15 maxlength=15>
<select class="consultancy_form_select" name='role' id='role'>
<option value='rupee'>Rupee &#x20B9;</option> 
<option value='dollar'>Dollar $</option>
<option value='yen;'>Yen &yen;</option>
<option value='euro;'>Euro &euro;</option>
<option value='pound;'>Pound Sterling &pound;</option>
<option value='franc'>Franc &#8355;</option>
<option value='lira'>Lira &#x20a4;</option>
</select>
<br><br>

<span class= "div_award_field_text">Brief Summary of work undertaken</span>
<input type=name class="award_form_input" name="summary" id="summary" size=100 maxlength=100>
<br><br>

<span class= "div_award_field_text">Facilities/Labs used for consultancy</span>
<input type=name class="award_form_input" name="labs" id="labs" size=100 maxlength=100>
<br><br>

<span class= "div_award_field_text">URL</span>
<input type=name class="award_form_input" name="url" size=50 maxlength=50>
<br><br>

<span class= "div_award_field_text">Additional Information about Work</span>
<input type=name class="award_form_input" name="others" id="others" size=25 maxlength=25>
<br><br>

<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>     
        <input type="submit" class="form_button_register_page_submit" value="Submit" style="margin-left:75%; margin-top: 8%; outline:none">
        


</form>
</div>
<p>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$con = mysql_connect('localhost','root','rock'); 
		 if (!($con))
		 { 
		 die('Could not connect: ' . mysql_error()); 
		 } 
		 mysql_select_db('college site');

		$result = mysql_query("select consultancyid FROM consultancy order by consultancyid desc");						
		$row=mysql_fetch_array($result);
		$consultancyid=0;

		if($row=="")
		{
			$consultancyid="1";
		}
		else
		{
			$consultancyid = $row['consultancyid'];
			++$consultancyid;
	
		}
		$sql="INSERT INTO consultancy (consultancyid,client,title,sdate,cdate,f1,f2,f3,revenue,summary,labs,url,others) VALUES('$consultancyid','$_POST[client]','$_POST[title]','$_POST[sdate]','$_POST[cdate]','$_POST[f1]','$_POST[f2]','$_POST[f3]','$_POST[revenue]','$_POST[summary]','$_POST[labs]','$_POST[url]','$_POST[others]')";

		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		echo "\nConsultancy id".$consultancyid; 
		echo "\nConsultancy Details Added";
		mysql_close($con);
	}
?>
</p>

<a href="login_success.php">back to login page!!!</a>
</body>
</html>



