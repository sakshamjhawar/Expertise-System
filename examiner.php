<?php
session_start();
include("include.php");
$coe=$_SESSION["COE"];
$year=$_SESSION["year"];
$aca=$_SESSION["academic_year"];
$S=$_SESSION["S"];
$y=substr($aca,0,4);
$i=$y[0]*1000+$y[1]*100+$y[2]*10+$y[3]*1;
$a=substr($S,4,4);
$d=date('d');
$d1=date('m');
$d2=date('Y');
echo '
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<center>
<table>
<tr><th></th><th></th><th></th></tr>
<tr><td style="width:250"><h4 style="font-family:Times New Roman;">
    Date:'.$d.'-'.$d1.'-'.$d2.'<br>
    Examination : <u>'.$_SESSION["title"].'</u><br>
    Academic- Year: <u>'.$_SESSION["academic_year"].'</u></b>
    </td><td><center><img src="header.png" ></td><td><table width="275" border="2" bordercolor="black" bgcolor=""><h4 style="font-family:Times New Roman;"><tr><td><b><center>CURRENT PAGE :</b><br><u><center> COE: Select Board to Send Requests</u></td></tr></table><table width="275" border="2" bordercolor="black" bgcolor=""><h4 style="font-family:Times New Roman;"><b><tr><td><b><center>NAVIGATE TO :</b><center>';
if($_SESSION["TYPE"]==0)
    echo'<a href="coe-new.php" style="width:27%"><h4 style="font-family:Times New Roman;">Back To Home Page</h4></a>';
else
    echo'<a href="coe1n-new.php" style="width:27%"><h4 style="font-family:Times New Roman;">Back To Home Page</h4></a>'; 
echo'</u></td></tr></table> <br><u>';
echo'</td></tr></table>
<caption align="center" nowrap><b><h3 style="font-family:Times New Roman;">Welcome '.$_SESSION["COE"].'- Question Paper Request System- Select Examiner to view statistics</b></caption>';
echo'<script type="text/javascript"> 

function Validate()
{
	var examiner   = document.getElementById("form1").examiner.value;
    if(examiner === "*")
    {
        alert("Please fill the fields!");
        return false;
    }
}
</script>';


echo'<center>';
echo'<form id="form1" action="" method="post" onsubmit="return Validate()" >';
echo'<tr><td><h4 style="font-family:Times New Roman;"><b>EXAMINER ID</b></td><td><select id="examiner" name="examiner" size=1 style="width:300px"><option>*</option>*';
$res1=mysql_query("select distinct ec.id, e.college from examiner_course as ec inner join examiner as e on ec.id=e.id where ec.request='R' ");
while($row=mysql_fetch_row($res1))
{
	echo'<option >'.$row[0].'</option>';
}
echo'</select></td></tr><br>';
echo'<input align="center" type="submit" name="Submit" >';
echo'</form>';

if(isset($_POST["Submit"]))
{
	$examiner=$_POST["examiner"];
	$_SESSION["examiner"]=$examiner;
	echo'<script type="text/javascript">window.location="examiner2.php";</script>';
}

?>