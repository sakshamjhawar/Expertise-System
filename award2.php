<?php
session_start();
include("include.php");
$essn=$_SESSION["essn"];
$name=$_SESSION["name"];


$result=mysqli_query("select * from faculty where ESSN='$essn'");
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
  var aname=document.getElementById("form1").aname.value;
  var agency=document.getElementById("form1").agency.value;
  var ayear=document.getElementById("form1").ayear.value;
  var url=document.getElementById("form1").url.value;
  if( aname === "" || agency === "" || ayear === "" || url === "" )
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>


<body>


   


<div style="position:absolute; left:30%; top:1%;">
 
 
      <div style="position:absolute; left:-10%;top:1%; ">
<img src="rv.png" height="150" width="150">
</div>
  
<h2 align="center" style="color:red; height:500%; position:relative; left:30%; overflow:hidden; "><strong>R V COLLEGE OF ENGINEERING</strong></h2>
<h4 align="center" style="color:black; height:150%;  position:absolute; top:70%; width:100%; left:25%; overflow:hidden; "><strong>Dept. of Information Science and Engineering</strong></h4>
</div><br><br><br><br><br>
<h2 align="center"  style="color:blue;font-family:calibri; position:relative; top:3%; left:8%"><strong>FACULTY EXPERTISE SYSTEM</strong></h2>
</div>
</div>






</header>
<br>
<br>
<fieldset>
<legend align="center"><b>AWARD DETAILS</legend>
<form id="form1" action="" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
<div align="center">
<table width="450px">


<div name="Award_name">
<tr>
 <td valign="top">
  <b><label for="Award name">Award_name</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="aname" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="Agency">
 <tr>
 <td valign="top">
  <b><label for="Agency">Agency</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="agency" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div name="A_year">
<tr>
 <td valign="top">
  <b><label for="Recieving Year">A_year</label>
 </td>
 <td valign="top"> 
  <input  type="text" name="ayear" placeholder="" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>



<div name="url">
<tr>
 <td valign="top">
  <b><label for="Url">url </label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="url" maxlength="50" size="20">
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





<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
<br>
<br>
  <input  type="Submit" name="Submit2" class="btn register">
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
if(isset($_POST["Submit2"]))
{
	$target1 = 'uploads/award/certificates/';
	$target2 = 'uploads/award/images/';
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

	$aname=$_POST["aname"];
	$agency=$_POST["agency"];
	$ayear=$_POST["ayear"];
	$url=$_POST["url"];

	if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11) && move_uploaded_file($_FILES['file2']['tmp_name'], $target22)) 
	{
		mysql_query("insert into award values ('$aname','$agency','$ayear','$url','$essn','$Filename1','$Filename2')");
	}
	else
	{
		mysql_query("insert into award values ('$aname','$agency','$ayear','$url','$essn','','')");
		echo'<script type="text/javascript">
  		alert("Couldnt Upload the Files");</script>';
	}
	echo'<script type="text/javascript">
  	alert("Added this Award successfully to your profile" );
  	window.location="faculty_home.php";
  	</script>';

}
?>
