<?php
session_start();
include("include.php");

$name=$_SESSION["name"];
$essn=$_SESSION["essn"];

$result=mysql_query("select * from faculty where ESSN='$essn'");
	$r=mysql_fetch_row($result);



echo'<html>
<head>
<title>
Award Details
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

<script type="text/javascript">
function validate()
{
  var topic=document.getElementById("form1").topic.value;
  var date=document.getElementById("form1").date.value;
  var research=document.getElementById("form1").research.value;
  var org=document.getElementById("form1").org.value;
  var level=document.getElementById("form1").level.value;
  if( topic === "" || date === "" || research === "" || org === ""|| level === "")
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>


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
<h3 align = "center">FACULTY INVITED TALK DETAILS ENTRY</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="80" height ="80" /></div>
</header>
<br>
<br>
<fieldset>
<legend align="center"><b>TALK DETAILS</legend>
<form id="form1" action="" method="POST" onsubmit="return validate()">
<div align="center">
<table width="450px">

<div class="topic">
<tr>
 <td valign="top">
  <b><label for="topic">Topic name</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="topic" maxlength="20" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Date on which talk was delivered">
<tr>
 <td valign="top">
  <b><label for="Date on which talk was delivered">Date on which talk was delivered</label>
 </td>
 <td valign="top">
 <input type="date" placeholder="" name="date" maxlength="20" Size="20">
 
 <br><br><br>
 </td>
</tr>
</div>

<div class="research_area">
<tr>
 <td valign="top">
  <b><label for="research_area">Research area</label>
 </td>
 <td valign="top">
 <input type="text" placeholder="" name="research" maxlength="20" Size="20">
 
 <br><br><br>
 </td>
</tr>
</div>

<div class="Name of institution/Organization">
<tr>
 <td valign="top">
  <b><label for="Name of institution/Organization">Name of institution/Organization</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="org" maxlength="20" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="Participation_level">
<tr>	
 <td valign="top">
  <b><label for="Participation_level">Participation_level</label>
 </td>
<td valign="top">
 <select name="level">
 <option value="UG"> UG</option>
<option value="PG"> PG</option>
<option value="Others"> Others</option>

</select>
<br><br><br>
 </td> 
</tr> 
</div>

<div>
<tr>
 <td valign="top"><b>
SELECT FILE TO UPLOAD:</td><td>
<input type="file" name="file1" id="file" >
</td>
</tr>
</div>

<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <br><input  type="Submit" name="Submit6" class="btn register">
  <br><br><br>
 </td>
</tr>
</div>
</table>
</div>
</form>
</fieldset>
<hr>

';
if(isset($_POST["Submit6"]))
{
$target1 = 'uploads/invited_talk/';
if (!file_exists($target1))
  	{
    	mkdir($target1, 0777, true);
  	}
$target11 = $target1.basename( $_FILES['file1']['name']);
	$Filename1=basename( $_FILES['file1']['name']);


  $topic=$_POST["topic"];
  $date=$_POST["date"];
  $research=$_POST["research"];
  $org=$_POST["org"];
  $level=$_POST["level"];

if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11)) 
	{
  mysql_query("insert into invited_talk values('$topic','$date','$research','$org','$essn','$level','$Filename1')");
}
else
{
mysql_query("insert into invited_talk values('$topic','$date','$research','$org','$essn','$level','')");
}
  echo'<script type="text/javascript">
    alert("Added this INVITED-Talk successfully to your profile");
    window.location="faculty_home.php";
    </script>';
}
?>
