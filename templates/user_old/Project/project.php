<html>
<head>

<title> Project Details </title>
<link rel="stylesheet" type="text/css" href="../../../style.css" />
<script type="text/javascript" >
	function hide()
	{
		document.getElementById('r1').hidden=true;	
	}
	function unhide()
	{
		document.getElementById('r1').hidden=false;
	}
	function fsubmit()
	{

		var title = document.getElementById('title');
		var pi = document.getElementById('pi');
		var ci = document.getElementById('ci');
		var sdate = document.getElementById('sdate');
		var cdate = document.getElementById('cdate');
		var duration = document.getElementById('duration');
		var cost = document.getElementById('cost');
		var dept = document.getElementById('dept');
		var abstract = document.getElementById('abstract');
		var agency = document.getElementById('agency');
		var url = document.getElementById('url');
		var others = document.getElementById('others');

		var exp=/[0-9]*/
		var alphaExp = /^[a-zA-Z ]*$/;
		var memExp= /[a-zA-Z 0-9]*/
		var url1 = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
		var date1 = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;

		if (title.value == "" )
		{
			alert('Please enter the title');
			title.focus();
			title.select();
			return false;
		}
		else
		{
			if(!title.value.match(alphaExp))
			{
				alert('Please enter only Letters for the title');
				title.focus();
				title.select();
				return false;
			}
		}
                
		if (pi.value == "" )
		{
			alert('Please enter the Principal investigator name');
			pi.focus();
			pi.select();
			return false;
		}
		else
		{
			if(!pi.value.match(alphaExp))
			{
				alert('Please enter only Letters for Principal investigator name');
				pi.focus();
				pi.select();
				return false;
			}
		}
		if(ci.value!="")
		{
			if(!ci.value.match(memExp))
			{
				alert('Please enter only Letters Co-investigator name');
				ci.focus();
				ci.select();
				return false;
			}
		}
		if(status.value=="-1")
		{
			alert("Select a status");
			return false;
		}
		
		if (sdate.value == "" )
		{
			alert('Please enter the start date');
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
				cdate.focus();
				cdate.select();	
				return false;
			}
		}
		
		
		if (cost.value == "" )
		{
			alert("Please enter cost of the project");
			cost.focus();
			cost.select();
			return false;
		}
		else
		{
			if(!cost.value.match(exp))
					{
							alert('Please enter valid cost');
							cost.focus();
							cost.select();	
							return false;
					}
		}

		
		if (abstract.value == "" )
		{
			alert('Please enter the abstract');
			abstract.focus();
			abstract.select();
			return false;
		}
		else
		{
			if(!abstract.value.match(memExp))
			{
				alert('Please enter only Letters or Numbers for abstract');
				abstract.focus();
				abstract.select();
				return false;
			}
		}
		if (agency.value == "" )
		{
			alert('Please enter the agency');
			agency.focus();
			agency.select();
			return false;
		}
		else
		{
			if(!agency.value.match(memExp))
			{
				alert('Please enter only Letters or Numbers for agency');
				agency.focus();
				agency.select();
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

<h1 style="color:red; text-align:center; margin-top:2%">Details of Projects Undertaken</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return fsubmit();">

<div class="div_project_main">
<p class="div_award_field_text" style="color:red; display: block;"><b>Enter the details of Projects Undertaken</b></p>

<span class= "div_award_field_text">Title of the Project</span>
        <span id="star">*</span>
        <input class="project_form_input" type=name name="title" id="title" maxlength=80 size=80>
        <br/>
        <br/>

<span class= "div_award_field_text">Principal Investigator for the Project</span>
        <span id="star">*</span>
        <input class="project_form_input" type=name name="pi" id="pi" maxlength=50 size=50>
        <br/>
        <br/>

<span class= "div_award_field_text">Co-investigator of the Project(if any)</span>
        <input class="project_form_input" type=name name="ci" id="ci" maxlength=50 size=50>
        <br/>
        <br/>


<span class= "div_award_field_text">Status of the Project</span>
        <span id="star">*</span>
<select class="project_form_select" name="status" id="status" onload="unhide();">
<option value="-1" onClick="unhide();" >Status</option>
<option value="In-progress" onClick="unhide();" >In-progress</option>
<option value="completed" onClick="hide();" >Completed</option>
<option value="others" onClick="unhide();" >Others</option>
</select>
<br><br>

<span class= "div_award_field_text">Project start date</span>
<span id="star">*</span>
<input class="project_form_input" type=name name="sdate" id="sdate" size=12 maxlength=12 value="<?php echo date('Y-m-d'); ?>"><br><span class = "dateFormat"> YYYY-MM-DD format</span><br><br>

<span class= "div_award_field_text">Project completion date</span>
<span id="star">*</span>
<input class="project_form_input" type=name name="cdate" id="cdate" size=12 maxlength=12 >
<br><span class = "dateFormat">YYYY-MM-DD format</span><br><br>

<span class= "div_award_field_text" id="r1">Project Duration (Expected duration, if project is not completed)</span>
<input type=name class="project_form_input" name="duration" id="duration" size=25 maxlength=25>
<br>
<br>


<span class= "div_award_field_text">Cost of the Project</span>
        <span id="star">*</span>
        <input type=name class="project_form_input" name="cost" id="cost" size=10 maxlength=10>
        <br/>
        <br/>

<span class= "div_award_field_text">Associated Department</span>
<input type=name class="project_form_input"  name="dept" id="dept" size=25 maxlength=25>
<br><br>

<span class= "div_award_field_text">Abstract</span>
        <span id="star">*</span>
<input type=name class="project_form_input" name="abstract" id="abstract" size=100 maxlength=100>
<br><br>

<span class= "div_award_field_text">Funding Agency</span>
        <span id="star">*</span>
        <input type=name class="project_form_input" name="agency" id="agency" size=25 maxlength=25>
        <br><br>
        
<span class= "div_award_field_text">URL</span>
<input type=name class="project_form_input" name="url" id="url" size=50 maxlength=50>
<br><br>

<span class= "div_award_field_text">Additional Information about the Project</span>
<input type=name class="project_form_input" name="others" id="others" size=100 maxlength=100>
<br><br>


<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>     
        <input type="submit" class="form_button_register_page_submit" value="Submit" style="margin-right:8%; margin-top: 8%; outline:none">

</form>
</div>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$con = mysql_connect('localhost','root','rock'); 
		 if (!($con))
		 { 
		 die('Could not connect: ' . mysql_error()); 
		 } 
		 mysql_select_db('college site');

		$result = mysql_query("select pid FROM projects order by pid desc");						
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
		$sql="INSERT INTO projects (pid,title,pi,ci,status,sdate,cdate,duration,cost,dept,abstract,agency,url,others) VALUES('$pid','$_POST[title]','$_POST[pi]','$_POST[ci]','$_POST[status]','$_POST[sdate]','$_POST[cdate]','$_POST[duration]','$_POST[cost]','$_POST[dept]','$_POST[abstract]','$_POST[agency]','$_POST[url]','$_POST[others]')";

		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		echo "\nProject id".$pid; 
		echo "\nProject Details Added";
		mysql_close($con);
	}
?>
</p>
</body>
</html>



