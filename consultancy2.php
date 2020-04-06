<?php
session_start();
include("include.php");
$name=$_SESSION["name"];
$essn=$_SESSION["essn"];

$result=mysqli_query("select * from faculty where ESSN='$essn'");
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

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-black w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
<div class="w3-container">
<h3 class="w3-padding-32"><b><font color="white" >Welcome Faculty <img src="images/'.$essn.'.jpg" alt=" " style="width:130px;height:130px;"><br>'.$essn.'<br></b>'.$r[0].'	</h3>
    </div>
<div class="w3-bar-block">
<a href="faculty_home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
<a href="update_profile.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Update Profile</a> 
<a href="facultydetails1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Faculty Details</a> 
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
<script type="text/javascript">
function validate()
{
  var year=document.getElementById("form1").year.value;
  var coname=document.getElementById("form1").coname.value;
  var cname=document.getElementById("form1").cname.value;
  var faculty=document.getElementById("form1").faculty.value;
  var rev=document.getElementById("form1").rev.value;
  var url=document.getElementById("form1").url.value;
  if( year === "" || coname === "" || cname === "" || faculty === "" || rev === "" || url === "")
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>


<br>
<br>
<body>
<h3 align = "center">CONSULTANCY DETAILS ENTRY</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<fieldset>
<legend align="center"><b>CONSULTANCY DETAILS</legend>
<form id="form1" action="" method="POST" onsubmit="return validate()">
<div align="center">
<table width="450px">


<div name="Period">
<tr>
 <td valign="top">
  <b><label for="Period">Project_period</label>
 </td>
 <td valign="top"> 
  <input  type="text" name="year" placeholder="" maxlength="4" size="20">
 <br><br><br>
 </td>
</tr>
</div>
<div name="Title">
 <tr>
 <td valign="top">
  <b><label for="Title">Consultancy_Name</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="coname" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>


<div name="Name of client">
<tr>
 <td valign="top">
  <b><label for="Name of client">Name of client</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="cname" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>





<div name="Faculty involved">
<tr>
 <td valign="top">
  <b><label for="Faculty involved">Faculty involved</label>
 </td>
 <td valign="top"> 
  <input  type="text" name="faculty" placeholder="" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>


<div name="Revenue Generation">
<tr>
 <td valign="top">
  <b><label for="Revenue Generation">Revenue Generation</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="rev" maxlength="30" size="20">
 <br><br><br>
 </td>
</tr>
</div>


<div name="URL">
<tr>
 <td valign="top">
  <b><label for="URL">URL</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="url" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>


<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <input  type="Submit" name="Submit4" class="btn register">
  <br><br><br>
 </td>
</tr>
</div>
</table>
</div>
</form>
</fieldset>

<hr>

</body>
</html>
';
if(isset($_POST["Submit4"]))
{
	$year=$_POST["year"];
	$coname=$_POST["coname"];
	$cname=$_POST["cname"];
	$faculty=$_POST["faculty"];
	$rev=$_POST["rev"];
	$url=$_POST["url"];
	mysqli_query("insert into consultancy values ('$year','$coname','$cname','$faculty','$rev','$essn','$url')");
	echo'<script type="text/javascript">
  	alert("Added this consultancy project successfully to your profile");
  	window.location="faculty_home.php";
  	</script>';
}
?>
