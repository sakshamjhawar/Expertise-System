<?php
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
    <h3 class="w3-padding-32"><font color="white"><b>New User-<br> Enter<br>Details</b></h3>
  </div>
  <div class="w3-bar-block">
   <a href="" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="faculty1.html" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Faculty Details</a> 
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
		font-family: 'Bree Serif', serif;
	    font-size: 26px;	
		position:relative
padding: 12px 20px;
}
</style>
</head>
<body>
<h3 align = "center">FACULTY DETAILS</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<fieldset>
<legend align="center"><b>FACULTY DETAILS</legend>
<form action="faculty.php" method="POST">
<div align="center">
<table width="450px">
<div class="name">
<tr>
 <td valign="top">
  <b><label for="name">Name*</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="name" maxlength="50" size="30">
 <br><br><br>
 </td>
</tr>
</div>

<div name="dob">
<tr>
 <td valign="top">
  <b><label for="dob">Date of Birth* </label>
 </td>
 <td valign="top">
  <input  type="date" name="dob">  
 <br><br><br>
 </td>
</tr>
</div>
<div name="mobile_no">
<tr>
 <td valign="top">
  <b><label for="mobile_no">Phone Number* </label>
 </td>
 <td valign="top">
  <input  type="integers" placeholder="" name="mobile_no" maxlength="30" size="30">
 <br><br><br>
 </td>
</tr>
</div>

<div name="email">
<tr>
 <td valign="top">
  <b><label for="email">Email Address* </label>
 </td>
 <td valign="top">
  <input  type="text" placeholder= "" name="email" maxlength="80" size="30">
 <br><br><br>
 </tr>
</div>

<div name="gender">
<tr>	
 <td valign="top">
  <b><label for="gender">Gender* </label>
 </td>
<td valign="top">
 <input type="radio" name="gender" value="male" > Male
 <input type="radio" name="gender" value="female" > Female<br>
<br><br><br>
 </td> 
</tr> 
</div>

<div name="address">
<tr>
 <td valign="top"">
  <b><label for="address">Address*</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="address" maxlength="100" size="30">
 <br><br><br>
 </td>
</tr>
<div>

<div name="ESSN">
<tr>
 <td valign="top"">
  <b><label for="ESSN">ESSN*</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="address" maxlength="30" size="30">
 <br><br><br>
 </td>
</tr>
<div>



<div name="qualification">
<tr>
 <td valign="top">
  <b><label for="qualification">qualification* </label>
 </td>
 <td valign="top">
 <select name="qualification">
<option value="B.tech">B.tech</option>
<option value="M.tech">M.tech</option>

</select>
 <br><br><br>
 </td>
</tr>
</div>


<div name="doj">
<tr>	
 <td valign="top">
  <b><label for="doj">Date of Join* </label>
 </td>
 <td valign="top">
  <input  type="date" name="doj">
 <br><br><br>
 </td>
</tr>
</div>


<div name="designation">
<tr>
 <td valign="top">
  <b><label for="designation">Designation* </label>	
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="designation" maxlength="30" size="30">
 <br><br><br>
 </td>
</tr>
</div>



<div name="mypassword">
 <tr>
 <td valign="top">
  <b><label for="mypassword">Password*</label>
 </td>
 <td valign="top">
  <input  type="password" placeholder="" name="password" maxlength="50" size="30">
 <br><br><br>
 </td>
</tr>
</div>

<div name="dept">
<tr>
 <td valign="top"">
  <b><label for="dept">Department</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder="" name="Department" maxlength="100" size="30">
 <br><br><br>
 </td>
</tr>
<div>

<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <input  type="Submit" name="Submit Details" class="btn register">
  <br><br><br>
 </td>
</tr>
</div>
</table>
</div>
</form>
</fieldset>