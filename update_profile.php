<?php
session_start();
include("include.php");
$essn=$_SESSION["essn"];
$name=$_SESSION["name"];


	$result=mysql_query("select * from faculty where ESSN='$essn'");
	$r=mysql_fetch_row($result);



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
<h3 class="w3-padding-32"><b><font color="white" >Welcome Faculty <img src="images/'.$essn.'.jpg" alt=" " style="width:150px; height:130px;"><br> '.$essn.' <br></b>  '.$r[0].' </h3>
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

</body>
</html>';


echo'<style>
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





<h3 align ="center">FACULTY DETAILS</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>
</header>
<br>
<br>
<fieldset>
<script type="text/javascript">
function validate()
{
  var name=document.getElementById("form1").name.value;
  var dob=document.getElementById("form1").dob.value;
  var m=document.getElementById("form1").mobile_no.value;
  var email=document.getElementById("form1").email.value;
  var gender=document.getElementById("form1").gender.value;
  var address=document.getElementById("form1").address.value;
  var essn=document.getElementById("form1").essn.value;
  var qua=document.getElementById("form1").qualification.value;
  var doj=document.getElementById("form1").doj.value;
  var designation=document.getElementById("form1").designation.value;
  var password=document.getElementById("form1").password.value;
  var dept=document.getElementById("form1").Department.value;
  if( name === "" || dob === "" || m === "" || email === "" || gender === "" || address === "" || essn === "" || qua === "" || doj === "" || designation === "" || password === "" || dept === "*")
  {
    alert("please enter all the parameters");
    return false;
  }

}
</script>
<legend align="center"><font color="black" ><b>FACULTY DETAILS</legend>
<form id="form1" action="" method="POST" onsubmit="return validate()">
<div align="center">
<table width="450px">
<div class="name">
<tr>
 <td valign="top">
  <b><label for="name">Name*</label>
 </td>
 <td valign="top">
  <textarea  type="text" placeholder=""  name="name" maxlength="50" size="30">'.$r[0].'</textarea>
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
  <input id="datepicker" name="dob" placeholder="" value='.$r[1].' maxlength="20" size="10"/>
<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
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
  <input type="integers" placeholder="" value='.$r[2].' name="mobile_no" maxlength="30" size="30">
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
  <input  type="text" placeholder= "" value='.$r[3].' name="email" maxlength="80" size="30">
 <br><br><br>
 </tr>
</div>


<div name="gender">
<tr>
 <td valign="top"">
  <b><label for="gender">Gender</label>
 </td>
 <td valign="top">';
 $result=mysql_query("select distinct gender from faculty");
  echo'<select  name="gender" id="gender" size=1 ><option>*</option>*';
$i=1;
  while($row=mysql_fetch_row($result))
  {
    echo'<option>'.$row[0].'</option>'.$row[0];
	if($row[0]==$r[4])
		$index=$i;
	$i++;
  }

echo'<script type="text/javascript">
var d=document.getElementById("gender");
d.selectedIndex='.$index.';
</script>';

 echo'<br><br><br>
 </td>
</tr>
<div>


<div name="address">
<tr>
 <td valign="top"">
  <b><label for="address">Address*</label>
 </td>
 <td valign="top">
  <textarea  type="text" placeholder=""  name="address" maxlength="50" size="30">'.$r[5].'</textarea>
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
  '.$r[6].' 
 <br><br><br>
 </td>
</tr>
<div>



<div name="qualification">
<tr>
 <td valign="top"">
  <b><label for="qualification">Qualification</label>
 </td>
 <td valign="top">
  <input  type="text" placeholder=""  value='.$r[7].' name="qualification" maxlength="30" size="30">
 <br><br><br>
 </td>
</tr>
<div>


<div name="doj">
<tr>	
 <td valign="top">
  <b><label for="doj">Date of Join* </label>
 </td>
 <td valign="top">
  <input  type="date"  value='.$r[8].'   name="doj">
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
 <textarea  type="text" placeholder=""  name="designation" maxlength="50" size="30">'.$r[9].'</textarea>
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
  <input  type="password" placeholder=""  value='.$r[10].'   name="password" maxlength="50" size="30">
 <br><br><br>
 </td>
</tr>
</div>

<div name="dept">
<tr>
 <td valign="top"">
  <b><label for="dept">Department*</label>
 </td>
 <td valign="top">';
 $result=mysql_query("select id from department");
  echo'<select  name="Department" id="Department" size=1 ><option>DEPT</option>*';
$i=1;
  while($row=mysql_fetch_row($result))
  {
    echo'<option>'.$row[0].'</option>'.$row[0];
	if($row[0]==$r[11])
		$index=$i;
	$i++;
  }

echo'<script type="text/javascript">
var d=document.getElementById("Department");
d.selectedIndex='.$index.';
</script>';

 echo'<br><br><br>
 </td>
</tr>
<div>

<div name="Submit" align="center">
<tr>
 <td valign="top">
 </td>
 <td valign="top">
  <input  type="Submit" name="Submit_Details" class="btn register">
  <br><br><br>
 </td>
</tr>
</div>
</table>
</div>
</form>
</fieldset>';
if(isset($_POST["Submit_Details"]))
{
  $name=$_POST["name"];
  $dob=$_POST["dob"];
  $m=$_POST["mobile_no"];
  $email=$_POST["email"];
  $gender=$_POST["gender"];
  $address=$_POST["address"];
  $qua=$_POST["qualification"];
  $doj=$_POST["doj"];
  $designation=$_POST["designation"];
  $password=$_POST["password"];
  $dept=$_POST["Department"];
  


  $v=mysql_query("update faculty set name='$name',dob='$dob' ,mobile_no='$m',email='$email',gender='$gender',
				address='$address',qualification='$qua',doj='$doj',designation='$designation',
				password='$password',dept='$dept' where ESSN='$essn'");
 
 mysql_query("update faculty_login set mypassword='$password' where myusername='$essn'");
  

  if(!$v)
    echo mysql_error($v);
  echo'<script type="text/javascript">
  alert("Updated Successfully");
  window.location="faculty_home.php";
  </script>';
}
?>

