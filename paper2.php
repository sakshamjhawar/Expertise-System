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
  var num=document.getElementById("form1").num.value;
  var published=document.getElementById("form1").published.value;
  var isbn=document.getElementById("form1").isbn.value;
  var type=document.getElementById("form1").type.value;
  var topic=document.getElementById("form1").topic.value;
  var co=document.getElementById("form1").co.value;
  var url=document.getElementById("form1").url.value;
  if( num === "" || published === "" || isbn === "" || type === ""|| topic === ""|| co === ""|| url === "")
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
<h3 align = "center"> Paper Details</h3>
<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<form id="form1" action="" method="POST" onsubmit="return validate()">
<fieldset>
<legend align="center"><b>PAPER DETAILS</legend>
<div align="center">
<table width="350px">
<div class="Number_of_papers">
<tr>
 <td valign="top">
  <b><label for="paper_num">Paper_Number</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="num" maxlength="10" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="Published_by">
<tr>
 <td valign="top">
  <b><label for="Published_by">Published by</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="published" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="ISBN">
<tr>
 <td valign="top">
  <b><label for="ISBN">ISBN</label><b>
 </td>
 <td valign="top">
  <input  type="text" placeholder=" " name="isbn" maxlength="40" size="20">
 <br><br><br>
 </td>
</tr>
</div>


<div name="paper_type">
<tr>
 <td valign="top">
  <b><label for="paper_type">paper_type</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="type" maxlength="30" size="20">
 <br><br><br>
 </td>
</tr>

<div class="paper_topic">
<tr>
 <td valign="top">
  <b><label for="paper_topic">Paper Topic</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="topic" maxlength="50" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="co_author">
<tr>
 <td valign="top">
  <b><label for="co_author">Co authored by</label></b>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="co" maxlength="40" size="20">
 <br><br><br>
 </td>
</tr>
</div>

<div class="URL">
<tr>
 <td valign="top">
  <b><label for="URL">URL</label><b>
 </td>
 <td valign="top">
  <input  type="text" placeholder=" " name="url" maxlength="40" size="20">
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
  <input  type="Submit" name="Submit9" class="btn register">
  <br><br><br>
 </td>
</tr>
 </table>
 </div>
 </form>
  </fieldset>

<hr>
';

if(isset($_POST["Submit9"]))
{
 
$target1 = 'uploads/paper/certificates/';
	$target2 = 'uploads/paper/images/';
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


 $num=$_POST["num"];
  $published=$_POST["published"];
  $isbn=$_POST["isbn"];
  $type=$_POST["type"];
  $topic=$_POST["topic"];
  $co=$_POST["co"];
  $url=$_POST["url"];

if(move_uploaded_file($_FILES['file1']['tmp_name'], $target11) && move_uploaded_file($_FILES['file2']['tmp_name'], $target22)) 
	{

  mysql_query("insert into paper values('$num','$published','$isbn','$type','$essn','$topic','$co','$url','$Filename1','$Filename2')");
}
else{
mysql_query("insert into paper values('$num','$published','$isbn','$type','$essn','$topic','$co','$url','','')");
}
  echo'<script type="text/javascript">
    alert("Added this paper successfully to your profile");
    window.location="faculty_home.php";
    </script>';
}
?>
