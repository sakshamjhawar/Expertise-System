
<html>
<head>
<title> Courses Taught Details </title>
<link rel="stylesheet" type="text/css" href="../../../style.css" />
<script type="text/javascript" >
	function formsubmit()
	{

		var title = document.getElementById('title');
		var ug_pg = document.getElementById('ug_pg');
		var sem = document.getElementById('sem');
		var year = document.getElementById('year');
		var num = document.getElementById('num');
		var pass = document.getElementById('pass');

		var alphaExp = /^[a-zA-Z 0-9]*$/;
		var numExp = /[0-9]*/;
		
		if (title.value == "" )
		{
			alert('Please enter the Title of the subject');
			title.focus();
			title.select();
			return false;
		}
		else
		{
			if(!title.value.match(alphaExp))
			{
				alert('Please enter only Letters or Numbers for Title of the subject');
				title.focus();
				title.select();
				return false;
			}
			
		}
		
		if (ug_pg.value == "-1" )
		{
			alert('Please select UG of PG');
			return false;
		}
		
		if (num.value != "" )
		{
			if(!num.value.match(numExp))
					{
							alert('Please enter Valid number of students');
							num.focus();
							num.select();	
							return false;
					}
		}
		
		if (pass.value != "" )
		{
			if(pass.value>100 || pass.value <0)
			{
				alert('Please enter Pass Percentage between 0-100');
				pass.focus();
				pass.select();
				return false;
			}
			
		}
		
	}

</script>
</head>
<body>

<h1 style="color:green; text-align:center; margin-top:2%">Courses Taught Details</h1>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return formsubmit();">
<div class="div_award_main">
<p class="div_award_field_text" style="color:red; display: block;"><b>Enter the details of Courses taught</b></p>
<span class= "div_award_field_text">Title of the Course/Subject taught</span>
        <span id="star">*</span>
        <input class="award_form_input" type=name name="title" id="title" maxlength=50 size =50>
        <br/>
        <br/>

<span class= "div_award_field_text">Above selected course/subject taught for under graduate students or post graduate students</span>
        <span id="star">*</span>
  <select name="ug_pg" id="ug_pg" class="conference_form_select">
<option value="UG" >Under Graduate</option>
<option value="PG" >Post Graduate</option>
<option value="Others" >Others</option>
</select>
<br><br>

<span class= "div_award_field_text">Semester</span>
<select id="sem" name="sem" class="conference_form_select">
<option value=''>Sem</option>
  <script>
  for(var i = 1; i<=10; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
</select>
<br><br>
<span class= "div_award_field_text">During the year</span>
<select id="year" name="year" class="conference_form_select">
<option value=''> Year</option>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = year; i > 1960; i--){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
</select>
<br><br>
<span class= "div_conference_field_text">Number of students in the class</span>
<input class="conference_form_input" type=name name="num" id="num" size=3 maxlength=3>
<br><br>

<span class= "div_conference_field_text">Pass Percentage</span>
<input class="conference_form_input" type=name name="pass" id="pass" size=5 maxlength=5>%<br><br>

<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>

<input class="form_button_register_page_submit" type="submit" value="Submit">


</form>
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

		$result = mysql_query("select cid FROM courses order by cid desc");						
		$row=mysql_fetch_array($result);
		$cid=0;

		if($row=="")
		{
			$cid="1";
		}
		else
		{
			$cid = $row['cid'];
			++$cid;
	
		}
		$sql="INSERT INTO courses (cid,title,ug_pg,sem,year,num,pass) VALUES('$cid','$_POST[title]','$_POST[ug_pg]','$_POST[sem]','$_POST[year]','$_POST[num]','$_POST[pass]')";

		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		echo "\nCourse id".$cid; 
		echo "\nCourse Taught Details Added";
		mysql_close($con);
	}
?>
</p>

<a href="login_success.php">back to login page!!!</a>
</body>
</html>



