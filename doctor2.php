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
<h3 align = "center">FACULTY PHD DETAILS ENTRY</h3>

<script type="text/javascript">
function validate()
{
  var uni=document.getElementById("form1").university.value;
  var y=document.getElementById("form1").year.value;
  var yc=document.getElementById("form1").completion.value;
  var gb=document.getElementById("form1").guided_by.value;
  if( uni === "" || y === "" || yc === "" || gb === "")
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>


<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<fieldset>
<legend align="center"><b>PHD DETAILS</legend>
<form id="form1" action="" method="POST" onsubmit="return validate()">
<div align="center">
<table width="450px">


<div name="University">
<tr>
 <td valign="top">
  <b><label for="University">University</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="university" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="Year_Of_Reg">
 <tr>
 <td valign="top">
  <b><label for="Year_Of_Reg">Year_Of_Reg</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="year" maxlength="4" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="Year_Of_Completion">
<tr>
 <td valign="top">
  <b><label for="Year Of Completion">Year_Of_Completion</label>
 </td>
 <td valign="top"> 
  <input  type="text" name="completion" placeholder="" maxlength="4" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="Guided_By">
<tr>
 <td valign="top">
  <b><label for="Guided_By">Guided_By</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="guided_by" maxlength="50" size="20">
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


<div>
<tr>
 <td valign="top">
<br>
<br><b>
SELECT IMAGE TO UPLOAD:</td><td>
<input type="file" name="file2" id="fileToUpload" >
</td>
</tr>
</div>
<br>

<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <br><input type="submit" value="Submit" name="Submit3">
<br>
<br>
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



if(isset($_POST["Submit3"]))
{
	$target1 = 'uploads/doctor/certificates/';
	$target2 = 'uploads/doctor/images/';
	if (!file_exists($target1))
  	{
    	mkdir($target1, 0777, true);
  	}
	if (!file_exists($target2))
  	{
    	mkdir($target2, 0777, true);
  	}
	$target11 = $target1.basename( $_FILES['file1']['name']);
	$Filename1=basename( $_FILES['file1']['name']);

	$target22 = $target2 . basename( $_FILES['file2']['name']);
	$Filename2=basename( $_FILES['file2']['name']);

	$uni=$_POST["university"];
	$year=$_POST["year"];
	$completion=$_POST["completion"];
	$guided_by=$_POST["guided_by"];

	if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11) && move_uploaded_file($_FILES['file2']['tmp_name'], $target22)) 
	{
		mysql_query("insert into doctor values ('$uni','$year','$completion','$guided_by','$essn','$Filename1','$Filename2')");
	}
	else
	{
		mysql_query("insert into doctor values ('$uni','$year','$completion','$guided_by','$essn','','')");
		echo'<script type="text/javascript">
  		alert("Couldnt Upload the Files");</script>';
	}
	echo'<script type="text/javascript">
  	alert("Added this doctorate deatils successfully to your profile" );
  	window.location="faculty_home.php";
  	</script>';

}
?>

