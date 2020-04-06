<?php
session_start();
include("include.php");
$name=$_SESSION["name"];
$essn=$_SESSION["essn"];

$result=mysql_query("select * from faculty where ESSN='$essn'");
	$r=mysql_fetch_row($result);


echo'<!-- DOCTYPE HTML -->
<html>
<head>
<title>
Faculty Course Details
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<nav class="w3-sidebar w3-black w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
<div class="w3-container">
<h3 class="w3-padding-32"><b><font color="white" >Welcome Faculty <img src="images/'.$essn.'.jpg" alt=" " style="width:130px;height:130px;"><br> '.$essn.'<br></b> '.$r[0].' </h3>
    </div>
<div class="w3-bar-block">
<a href="faculty_home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
<a href="update_profile.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Update Profile</a> 
<a href="facultydetails.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Faculty Details</a> 
<a href="course2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Course</a> 
<a href="award2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Awards</a> 
<a href="doctor2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Doctorate</a> 
<a href="consultancy2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Consultancy</a>
<a href="patent2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Patent</a>
<a href="invited_talk2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Invited Talk</a>
<a href="project2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Project</a>
<a href="workshop2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Workshop</a>
<a href="paper2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Paper</a>
<br>
<span class="Logout_span">
<center>
<a href="main.html" style="colour:#fff;">LOGOUT</a> </center>
</span>
</div>
</nav>


<style>
body {
    background-color: #d3d3d3;
}
header{
		background: #ffffff;
		}
h3   {color:Black;
		font-family: Bree Serif, serif;
	    font-size: 26px;	
		position:relative
padding: 12px 20px;
}
</style>
</head>

<body>
<h3 align = "center">FACULTY COURSE DETAILS ENTRY</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<fieldset>
<legend align="center"><b><font color="black" >COURSE DETAILS- COURSES YOU HAVE HANDLED</legend>

<script type="text/javascript">
function validate()
{
  var dept=document.getElementById("form1").Department.value;
  var cc=document.getElementById("form1").course_code.value;
  var cn=document.getElementById("form1").course_name.value;
  var year=document.getElementById("form1").year.value;
  var semester=document.getElementById("form1").semester.value;
  var section=document.getElementById("form1").section.value;
  if( dept === "*" || cc === "" || cn === "" || year === "" || semester === "*" || section === "*")
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>
<form id="form1" action=""  method="POST" onsubmit="return validate()">
<div align="center">
<table width="450px">

<div class="branch">
<tr>
 <td valign="top">
  <b><label for="bank_name">Branch</label><br>
 </td>
 <td valign="top">';
 $result=mysql_query("select id from department");
  echo'<select  name="Department" size=1 ><option>*</option>*';
  while($row=mysql_fetch_row($result))
  {
    echo'<option>'.$row[0].'</option>'.$row[0];
  }

 echo'<br><br><br><br>
 </td>
</tr>
</div>

<br>
<div class="course_code">
<tr>
 <td valign="top">
  <b><label for="bank_name">Course_Code</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="course_code" maxlength="40" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="course_name">
<tr>
 <td valign="top">
  <b><label for="course_name">Course_Name</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="course_name" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="year">
<tr>
 <td valign="top">
  <b><label for="year">year</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="year" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="semester">
<tr>	
 <td valign="top">
  <b><label for="semester">semester</label>
 </td>
<td valign="top">
 <select name="semester">
<option value="1"> 1</option>
<option value="2"> 2</option>
<option value="3"> 3</option>
<option value="4"> 4</option>
<option value="5"> 5</option>
<option value="6"> 6</option>
<option value="7"> 7</option>
<option value="8"> 8</option>

</select>


<br><br><br>
 </td> 
</tr> 
</div>

<div name="section">
<tr>	
 <td valign="top">
  <b><label for="section">section</label>
 </td>
<td valign="top">
 <select name="section">
<option value="A"> A</option>
<option value="B"> B</option>
<option value="C"> C</option>
<option value="D"> D</option>
 
</select>


<br><br><br>
 </td> 
</tr> 
</div>

<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <input  type="Submit" name="Submit1" class="btn register">
  <br><br><br>
 </td>
</tr>
</div>
</table>
</div>
</form>
</fieldset>
<hr>';
if(isset($_POST["Submit1"]))
{
	$dept=$_POST["Department"];
	$cc=$_POST["course_code"];
	$cn=$_POST["course_name"];
	$year=$_POST["year"];
	$semester=$_POST["semester"];
	$section=$_POST["section"];
	mysql_query("insert into courses values('$dept','$cc','$cn','$year','$semester','$section','$essn')");
	echo'<script type="text/javascript">
  	alert("Added this course successfully to your profile");
  	window.location="faculty_home.php";
  	</script>';
}

echo'</body>
</html>
';
?>
