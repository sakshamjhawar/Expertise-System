<?php
session_start();
include("include.php");

$name=$_SESSION["name"];
$essn=$_SESSION["essn"];

$result=mysqli_query("select * from faculty where ESSN='$essn'");
	$r=mysqli_fetch_row($result);


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
  var id=document.getElementById("form1").id.value;
  var topic=document.getElementById("form1").topic.value;
  var year=document.getElementById("form1").year.value;
  var mode=document.getElementById("form1").mode.value;
  var type=document.getElementById("form1").type.value;
  if( id === "" || topic === "" || year === "" || mode === ""|| type === "")
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
<h3 align = "center"> Workshop DETAILS</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>

<br>
<br>

<form id="form1" action="" method="POST" onsubmit="return validate()">
  <fieldset>
  <legend align="center"><b>Workshop Details</legend>
  <div align="center">
  <table width="450px">
<div class="Workshop_ID">
<tr>
 <td valign="top">
  <b><label for="Workshop_ID">Workshop_ID</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="id" maxlength="5" size="5">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Topic">
<tr>
 <td valign="top">
 <b><label for="Topic">Topic</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="topic" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="year">
<tr>
 <td valign="top">
 <b><label for="workshop_mode">year</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="year" maxlength="4" size="5">
 <br><br><br>
 </td>
</tr>
</div>

<div class="workshop_mode">
<tr>
 <td valign="top">
 <b><label for="workshop_mode">Workshop_Mode</label></b>
 </td>
 <td valign="top">
 <select name="mode">
 <option value="Attended"> Attended</option>
<option value="Conducted"> Conducted</option>


</select>
<br><br><br>
 </td>
</tr>
</div>


<div class="workshop_type">
<tr>
 <td valign="top">
 <b><label for="workshop_type">Workshop_Type</label></b>
 </td>
 <td valign="top">
 <select name="type">
 <option value="International"> International</option>
<option value="National"> National</option>
<option value="Other"> Other</option>
<br>
<div>
<tr>
 <td valign="top"><b>
<br>SELECT FILE TO UPLOAD:</td><td>
<br><input type="file" name="file1" id="file" >
</td>
</tr>
</div>

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
  <br><input  type="Submit" name="Submit8" class="btn register">
  <br><br><br>
 </td>
</tr>
 </table>
 </div>
 </table>
 </div>
 </form>
 </fieldset>

<hr>';

if(isset($_POST["Submit8"]))
{
$target1 = 'uploads/workshop/';
if (!file_exists($target1))
  	{
    	mkdir($target1, 0777, true);
  	}
$target11 = $target1.basename( $_FILES['file1']['name']);
	$Filename1=basename( $_FILES['file1']['name']);


  $id=$_POST["id"];
  $topic=$_POST["topic"];
  $year=$_POST["year"];
  $mode=$_POST["mode"];
  $type=$_POST["type"];
if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11)) 
	{
  mysql_query("insert into workshop values('$id','$topic','$year','$essn','$mode','$type','$Filename1')");
}
else{
  mysql_query("insert into workshop values('$id','$topic','$year','$essn','$mode','$type','')");
}
  echo'<script type="text/javascript">
    alert("Added this Workshop successfully to your profile");
    window.location="faculty_home.php";
    </script>';
}
?>
