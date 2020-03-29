<html>
<head>
<title> Staff Profile </title>
<link rel="stylesheet" type="text/css" href="../../../style.css" />
<script type="text/javascript" >	
	function fsubmit()
	{
		
		var qf=document.getElementById('qf');
		var inst=document.getElementById('inst');
		var locn=document.getElementById('locn');
		var unv = document.getElementById('unv');
		var jmonth = document.getElementById('jmonth');
		var jyear = document.getElementById('jyear');
		var pyear = document.getElementById('pyear');
		var per = document.getElementById('per');
		var cls = document.getElementById('cls');

		var alphaExp = /^[a-zA-Z ]*$/;		

		if (qf.value=="-1")
		{
			alert('Please select Qualification');
			return false;
		}
               
		if (inst.value == "" )
		{
			alert('Please enter the Institution name');
			inst.focus();
			inst.select();
			return false;
		}
		else
		{
			if(!inst.value.match(alphaExp))
			{
				alert('Please enter only Letters for Institution name');
				inst.focus();
				inst.select();
				return false;
			}
		}
		
		if (locn.value == "" )
		{
			alert('Please enter Location');
			locn.focus();
			locn.select();
			return false;
		}
		else
		{
			if(!locn.value.match(alphaExp))
			{
				alert('Please enter only Letters for Location');
				locn.focus();
				locn.select();
				return false;
			}
		}
		
		if (unv.value == "" )
		{
			alert('Please enter the University');
			unv.focus();
			unv.select();
			return false;
		}
		else
		{
			if(!unv.value.match(alphaExp))
			{
				alert('Please enter only Letters for University');
				unv.focus();
				unv.select();
				return false;
			}
		}
		
		if(pyear.value=="-1")
		{
			alert("Please select Year of Passing");
			return false;
		}
		
		if (per.value == "" )
		{
			alert('Please enter Percentage');
			per.focus();
			per.select();
			return false;
		}
		else
		{
			if(per.value>100 || per.value <0)
			{
				alert('Please enter Percentage between 0-100');
				per.focus();
				per.select();
				return false;
			}			
		}
		
		if(cls.value=="-1")
		{
			alert("Please select a class");
			return false;
		}
	
	}

</script>

</head>
<body>
<h1 style="color:red; text-align:center; margin-top:2%">Qualification Details</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return fsubmit();">
<div class="div_profile_main">
<p class="div_award_field_text" style="color:red; display: block;"><b>Enter your Qualification details</b></p>

<span class= "div_award_field_text">Qualification</span>
        <span id="star">*</span>
<select class="conference_form_select" name="qf" id="qf" >
<option value="-1">Qualification</option>
<option value="B.E" >B.E</option>
<option value="B.Tech" >B.Tech</option>
<option value="M.E" >M.E</option>
<option value="M.Tech" >M.Tech</option>
<option value="Ph.D" >Ph.D</option>
<option value="B.Sc" >B.Sc</option>
<option value="M.Sc" >M.Sc</option>
<option value="MCA" >MCA</option>
<option value="M.S" >M.S</option>
<option value="Diploma" >Diploma</option>
<option value="others" >Others</option>
</select>
<br><br>


<span class= "div_award_field_text">Institution</span>
        <span id="star">*</span>
<input type=name class="conference_form_input" id="inst" name="inst" size=100 maxlength=100>
<br><br>

<span class= "div_award_field_text">Location</span>
        <span id="star">*</span>
<input type=name class="conference_form_input" id="locn" name="locn" size=100 maxlength=100>
<br><br>

<span class= "div_award_field_text">University</span>
        <span id="star">*</span>
<input type=name class="conference_form_input" id="unv" name="unv" size=100 maxlength=100>
<br><br>

<span class= "div_award_field_text">Join Month</span>
<select class="conference_form_select" name='jmonth' id='jmonth'>
<option value='-1'>Join Month</option> 
<option value='January'>Jan</option>
<option value='February'>Feb</option>
<option value='March'>Mar</option>
<option value='April'>Apr</option>
<option value='May'>May</option>
<option value='June'>Jun</option>
<option value='July'>Jul</option>
<option value='August'>Aug</option>
<option value='September'>Sep</option>
<option value='October'>Oct</option>
<option value='November'>Nov</option>
<option value='December'>Dec</option>
</select><br><br>

<span class= "div_award_field_text">Join Year</span>
<select class="conference_form_select" id="jyear" name="jyear">
<option value='-1'>Join Year</option>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = year; i > 1960; i--){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
</select><br><br>

<span class= "div_award_field_text">Passed Year</span>
        <span id="star">*</span>
<select class="conference_form_select" id="pyear" name="pyear">
<option value='-1'>Passed Year</option>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = year; i > 1960; i--){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
</select><br><br>
<span class= "div_award_field_text">Percentage</span>
<input type=name class="conference_form_input" id="per" name="per" size=5 maxlength=5>%
<span id="star">*</span><br><br>

<span class= "div_award_field_text">Class</span>
        <span id="star">*</span>
<select class="conference_form_select" name="cls" id="cls">
<option value="-1">Class</option>
<option value="FCD" >FCD</option>
<option value="FC" >FC</option>
<option value="SC" >SC</option>
<option value="FAIL" >FAIL</option>
</select>
<br><br>


<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>     
        <input type="submit" class="form_button_register_page_submit" value="Submit" style="margin-right:8%; margin-top: 8%; outline:none">
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

		$result = mysql_query("select pid FROM profile order by pid desc");						
		$row=mysql_fetch_array($result);
		$pid=0;

		if($row=="")
		{
			$pid="1";
		}
		else
		{
			$pid = $row['pid'];
			++$pid;
	
		}
		$sql="INSERT INTO profile (pid,qf,inst,locn,unv,jmonth,jyear,pyear,per,cls) VALUES('$pid','$_POST[qf]','$_POST[inst]','$_POST[locn]','$_POST[unv]','$_POST[jmonth]','$_POST[jyear]','$_POST[pyear]','$_POST[per]','$_POST[cls]')";

		if(!mysql_query($sql,$con))		{
			die('error:'.mysql_error());
		}
		echo "\nProfile id".$pid; 
		echo "\nProfile Details Added";
		mysql_close($con);
	}
?>
</p>
</body>
</html>



