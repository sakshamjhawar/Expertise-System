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
Faculty Details
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
<h3 class="w3-padding-32"><b><font color="white" >Welcome Faculty <img src="images/'.$essn.'.jpg" alt=" " style="width:130px;height:130px;"><br>'.$essn.'<br></b> '.$r[0].'	</h3>
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
</head>';
$query=mysql_query("select * from faculty where ESSN='$essn'");
$row=mysql_fetch_row($query);
echo'<center>
<font color="black"><h3> YOUR DETAILS</h3>
<table border=5 bgcolor="white">
<tr><td width="300px"><h3>Name</td><td width="300px"><h3>'.$row[0].'</td></tr>
<tr><td><h3>Date Of Birth</td><td><h3>'.$row[1].'</td></tr>
<tr><td><h3>Phone Number</td><td><h3>'.$row[2].'</td></tr>
<tr><td><h3>Email- Address</td><td><h3>'.$row[3].'</td></tr>
<tr><td><h3>Gender</td><td><h3>'.$row[4].'</td></tr>
<tr><td><h3>Address</td><td><h3>'.$row[5].'</td></tr>
<tr><td><h3>ESSN</td><td><h3>'.$row[6].'</td></tr>
<tr><td><h3>Qualification</td><td><h3>'.$row[7].'</td></tr>
<tr><td><h3>Date Of Joining</td><td><h3>'.$row[8].'</td></tr>
<tr><td><h3>Designation</td><td><h3>'.$row[9].'</td></tr>
<tr><td><h3>Department</td><td><h3>'.$row[11].'</td></tr>
</table>
';

?>
