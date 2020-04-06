<?php

include("include.php");
session_start();
	date_default_timezone_set('Asia/Calcutta');
	$date1=date("F j, Y, g:i a");   

	$uname=$_POST["uname"];
	$pword=$_POST["pword"];
	//echo "<br>----------- row=$row  ---$uname ---  $pword";
	$_SESSION['uname']=$uname;
	$_SESSION['pword']=$pword;
	echo $uname;
	$row=0;
	$sql = "select * from admin where myusername='$uname' and mypassword='$pword'";
	
$query=mysqli_query($sql);
$n=mysqli_num_rows($query);
if($n==0)
{
	echo'<script type="text/javascript">
	alert("Invalid Credentials! Please retry again!");
	window.location="main.html";
	</script>';
}
else
{
	$_SESSION["dept"]=$row[2];
	$_SESSION["name"]=$row[0];
	$_SESSION["essn"]=$essn;
	echo'<script type="text/javascript">
	alert("Logging In Successfully");
	window.location="admin2.php";
	</script>';
	
}
?>
