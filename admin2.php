<?php
echo'
<!DOCTYPE html>
<html>
<title>FACULTY HOME</title>

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
<body background = "images.jpeg">

<div style="position:absolute; left:30%; top:1%;">

<h2 align="center" style="color:red; height:500%; position:relative; left:18.5%; overflow:hidden; "><strong>R V COLLEGE OF ENGINEERING</strong></h2>
<h4 align="center" style="color:black; height:150%;  position:absolute; top:70%; width:100%; left:18%; overflow:hidden; "><strong>Dept. of Information Science and Engineering</strong></h4>
</div><br><br><br><br><br>
<h2 align="center"  style="color:blue;font-family:calibri; position:relative; top:3%; left:5%"><strong>FACULTY EXPERTISE SYSTEM</strong></h2></span></div>

<nav class="w3-sidebar w3-black w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:250px;font-weight:bold;" id="mySidebar"><br>
<div class="w3-container">
<h3 class="w3-padding-32"> <img src="rv.png" alt="" height="150" width="150" style="margin-left:5%; margin-top:-30%; "><b><center>REPORT GENERATION</b></h3>
</div>
<div class="w3-bar-block">
<a href="admin2.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
<a href="courses1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Course</a> 
<a href="award1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Awards</a> 
<a href="doctor1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Doctorate</a> 
<a href="consultancy1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Consultancy</a>
<a href="patent1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Patent</a>
<a href="invited_talk1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Invited Talk</a>
<a href="project1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Project</a>
<a href="workshop1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Workshop</a>
<a href="paper1.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Paper</a>
<a href="report.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white"> Generate Report</a>
<br>
<br>
<span class="Logout_span">    		
<center><a href="main.html" style="colour:#fff;">LOGOUT</a> </center>
</span>
</div>
</nav>

<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
</header>

<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

</body>
</html>
';
?>
