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
<script type="text/javascript">
function validate()
{
  var year=document.getElementById("form1").year.value;
  var title=document.getElementById("form1").title.value;
  var type=document.getElementById("form1").type.value;
  var faculty=document.getElementById("form1").faculty.value;
  if( year === "" || title === "" || type === "" || faculty === "")
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>


<br>
<br>
<body>
<h3 align = "center">PATENT DETAILS ENTRY</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div><br>
</header>
<fieldset>
<legend align="center"><b>Patent DETAILS</legend>
<form id="form1" action="" method="POST" onsubmit="return validate()">
<div align="center">
<table width="450px">

<div class="year of Registration ">
<tr>
 <td valign="top">
  <b><label for="year of Registration">Year_of_Reg</label>
 </td>
 <td valign="top">
 <input type="text" placeholder="" name="year" maxlength="4" Size="20">
 
 <br><br><br>
 </td>
</tr>
</div>


<div class="Patent title">
<tr>
 <td valign="top">
  <b><label for="Patent title">Patent title</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="title" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>


<div class="Patent type">
<tr>
 <td valign="top">
  <b><label for="Patent type">Patent_Type</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="type" maxlength="20" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Faculty name">
<tr>
 <td valign="top">
  <b><label for="Faculty name">Sharing With (if no one enter - )</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="faculty" maxlength="50" size="20">
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
<br>


<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <br><input  type="Submit" name="Submit5" class="btn register">
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


if(isset($_POST["Submit5"]))
{
	$target1 = 'uploads/patent/certificates/';
	$target2 = 'uploads/patent/images/';
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

	$year=$_POST["year"];
  	$title=$_POST["title"];
  	$type=$_POST["type"];
  	$faculty=$_POST["faculty"];


	if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11) && move_uploaded_file($_FILES['file2']['tmp_name'], $target22)) 
	{
		mysql_query("insert into patent values('$year','$essn','$title','$type','$faculty','$Filename1','$Filename2')");
	}
	else
	{
		mysql_query("insert into patent values('$year','$essn','$title','$type','$faculty','','')");
		echo'<script type="text/javascript">
  		alert("Couldnt Upload the Files");</script>';
	}
	echo'<script type="text/javascript">
  	alert("Added this Patent successfully to your profile");
  	window.location="faculty_home.php";
  	</script>';

}
?>

