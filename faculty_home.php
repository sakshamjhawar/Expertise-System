<?php
session_start();
include("include.php");
$essn=$_SESSION["essn"];

$result=mysqli_query("","select * from faculty where ESSN='$essn'");
	$r=mysqli_fetch_row($result);

echo'<!DOCTYPE html>
<html>
<title>FACULTY HOME</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 
{
    font-family: "Poppins", sans-serif
}
body 
{
    font-size:16px;
}

.w3-half img{margin-bottom:-6px;margin-top:10px;opacity:0.8;cursor:pointer}
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
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
</header>
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
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
</body>
</html>';


?>
