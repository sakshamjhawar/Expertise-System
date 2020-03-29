<html>
<head>

<title> Faulty Exchange Program Details </title>
<link rel="stylesheet" type="text/css" href="../../../style.css" />
<script type="text/javascript" >
	function fsubmit()
	{

		var inst = document.getElementById('inst');
		var sub = document.getElementById('sub');
		var sdate = document.getElementById('sdate');
		var edate = document.getElementById('edate');
		var ug_pg = document.getElementById('ug_pg');
		var ctype = document.getElementById('ctype');
		var fback = document.getElementById('fback');
		var details = document.getElementById('details');
		
		var alphaExp = /^[a-zA-Z ]*$/;
		
		var date1 = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;

		if (inst.value == "" )
		{
			alert('Please enter the Name of the institution');
			inst.focus();
			inst.select();
			return false;
		}
		else
		{
			if(!inst.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Event');
				inst.focus();
				inst.select();
				return false;
			}
		}
                
		if (sub.value == "" )
		{
			alert('Please enter the Name of subject taught');
			sub.focus();
			sub.select();
			return false;
		}
		else
		{
			if(!sub.value.match(alphaExp))
			{
				alert('Please enter only Letters for Name of the Event');
				sub.focus();
				sub.select();
				return false;
			}
		}
		
		if (sdate.value == "" )
		{
			alert('Please enter the Starting Date');
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
			
		if (edate.value != "" )
		{
			if(!edate.value.match(date1))
					{
							alert('Please enter Valid date in format YYYY-MM-DD');
							edate.focus();
							edate.select();	
							return false;
					}
		}
		
		if (ug_pg.value == "-1" )
		{
			alert('Please select UG of PG');
			return false;
		}
	
	}

</script>
</head>


<body>
<center>
<h1 style="color:green; text-align:center; margin-top:2%">Faulty Exchange Program Details</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return fsubmit();">
<div class="div_faculty_ex_main">
<p class="div_faculty_ex_field_text" style="color:red; display: block;"><b>Enter the details of Faulty Exchange Program</b></p>

<span class= "div_faculty_ex_field_text">Name of the Institution</span>
<span id="star">*</span>
<input class="faculty_ex_form_input" type=name name="inst" id="inst" maxlength=100 size=100>
<br/>
<br/>

<span class= "div_faculty_ex_field_text">Name of Subject Taught</span>
<span id="star">*</span>
<input class="faculty_ex_form_input" type=name name="sub" id="sub" maxlength=50 size=50>
<br/>
<br/>

<span class= "div_faculty_ex_field_text">Starting Date</span>
<span id="star">*</span>
<input class="faculty_ex_form_input" type=name name="sdate" id="sdate" value="<?php echo date('Y-m-d'); ?>" maxlength=12 size=12>
<br/>
<br/>

<span class= "div_faculty_ex_field_text">Ending Date</span>
<input class="faculty_ex_form_input" type=name name="edate" id="edate" maxlength=12 size=12>
<br/>
<br/>

<span class= "div_faculty_ex_field_text">Taught for UG or PG students</span>
<span id="star">*</span>
<select class="faculty_ex_form_date" name="ug_pg" id="ug_pg" >
<option value=-1> Select </option>
<option value="UG" >Under Graduate</option>
<option value="PG" >Post Graduate</option>
<option value="Others" >Others</option>
</select>
<br>

<span class= "div_faculty_ex_field_text">Type of Collaboration</span>
<input type=name class="faculty_ex_form_input" name="ctype" id="ctype"size=40 maxlength=40>
<br><br>

<span class= "div_faculty_ex_field_text">Feedback on the Subject Taught</span>
<input type=name class="faculty_ex_form_input" name="fback" id="fback"size=100 maxlength=100>
<br><br>

<span class= "div_faculty_ex_field_text">Details of the Collaboration</span>
<input type=name class="faculty_ex_form_input" name="details" id="deatils"size=100 maxlength=100>
<br><br>

 <span style="color:red; margin-left:2em; margin-bottom:5em;">Fields with * are Mandatory</span>

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

		$result = mysql_query("select fid FROM  faculty_mem order by fid desc");						
		$row=mysql_fetch_array($result);
		$fid=0;

		if($row=="")
		{
			$fid="1";
		}
		else
		{
			$fid = $row['fid'];
			++$fid;
	
		}
		$sql="INSERT INTO faculty_mem (fid,inst,sub,sdate,edate,ug_pg,ctype,fback,details) VALUES('$_POST[fid]','$_POST[inst]','$_POST[sub]','$_POST[sdate]','$_POST[edate]','$_POST[ug_pg]','$_POST[ctype]','$_POST[fback]','$_POST[details]')";

		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		echo "\nFaculty Exchange Program id".$fid; 
		echo "\nFaculty Exchange Program Added";
		mysql_close($con);
	}
?>

<a href="login_success.php">back to login page!!!</a>
</body>
</html>



