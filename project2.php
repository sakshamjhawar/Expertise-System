<?php
session_start();
include("include.php");
$essn=$_SESSION["essn"];
$name=$_SESSION["name"];


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

<<nav class="w3-sidebar w3-black w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
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
  var pno=document.getElementById("form1").pno.value;
  var name=document.getElementById("form1").name.value;
  var year=document.getElementById("form1").year.value;
  var period=document.getElementById("form1").period.value;
  var amt=document.getElementById("form1").amt.value;
  var fundorg=document.getElementById("form1").fundorg.value;
  var url=document.getElementById("form1").url.value;
  if( pno === "" || name === "" || year === "" || period === ""|| amt === ""|| fundorg === ""|| url === "")
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
<h3 align = "center">PROJECT DETAILS ENTRY</h3>
<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<form id="form1" action="" method="POST" onsubmit="return validate()">
  <fieldset>
  <legend align ="center"><b>PROJECT DETAILS</legend>
  <div align="center">
  <table width="450px">
<div class="Project_Number">
<tr>
 <td valign="top">
 <b> <label for="Project_Number">Project Number</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="pno" maxlength="5" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Project_name">
<tr>
 <td valign="top">
  <b><label for="Project_name">Project name</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="name" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Year_Of_Sanction">
<tr>
 <td valign="top">
  <b><label for="Year_Of_Sanction">Year Of Sanction</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="year" maxlength="4" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Project_Period">
<tr>
 <td valign="top">
  <b><label for="Project_Period">Project Period</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="period" maxlength="2" size="20">
 <br><br><br>
 </td>
</tr>
</div>



<div class="Amount_Sanctioned">
<tr>
 <td valign="top">
  <b><label for="Amount_Sanctioned">Amount Sanctioned</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="amt" maxlength="7" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Funding_Organization">
<tr>
 <td valign="top">
  <b><label for="Funding_Organization">Funding Organization</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="fundorg" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="URL">
<tr>
 <td valign="top">
  <b><label for="URL">URL</label></b>
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
  <input  type="Submit" name="Submit7" class="btn register">
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

if(isset($_POST["Submit7"]))
{


$target1 = 'uploads/project/certificates/';
	$target2 = 'uploads/project/images/';
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

  $pno=$_POST["pno"];
  $name=$_POST["name"];
  $year=$_POST["year"];
  $period=$_POST["period"];
  $amt=$_POST["amt"];
  $fundorg=$_POST["fundorg"];
  $url=$_POST["url"];

if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11) && move_uploaded_file($_FILES['file2']['tmp_name'], $target22)) 
	{

  mysql_query("insert into project values('$pno','$name','$year','$period','$essn','$amt','$fundorg','$url','$Filename1','$Filename2')");
}
else
{
 mysql_query("insert into project values('$pno','$name','$year','$period','$essn','$amt','$fundorg','$url','','')");
}

  echo'<script type="text/javascript">
    alert("Added this Project successfully to your profile");
    window.location="faculty_home.php";
    </script>';
}
?>
