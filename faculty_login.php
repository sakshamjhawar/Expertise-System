<?php

$localhost="localhost";

$con=mysqli_connect("localhost","root", "");

//echo "hai";

if(!$con)
{
	echo("<BR>Connection failed");
	exit();
}
//echo ("<BR>connected to the database");

$db=mysqli_select_db($con,"FES");

if(!$db)
{
	echo("<BR>Database not selected");
	exit();
}

session_start();
echo "<script type='text/javascript'>
function onSubmitCheck()
{
	if(document.forms['form1']['role'].value =='')
	{
		alert('Selection of role is mandatory');
		document.forms['form1']['role'].focus();	
		return false;
	}	
	return true;
}
 </script>";
	date_default_timezone_set('Asia/Calcutta');
	$date1=date("F j, Y, g:i a");   

	$uname=$_POST["uname"];
	$pword=$_POST["pword"];
	//echo "<br>----------- row=$row  ---$uname ---  $pword";
	$_SESSION['uname']=$uname;
	$_SESSION['pword']=$pword;
	echo $uname;
	$row=0;
	$sql = "select * from faculty_login where myusername='$uname' and mypassword='$pword'";
	$query=mysqli_query($con,$sql);
	//echo "<br>query=$query ---$uname ---  $pword";
	// extract role using while statement
	while(list($r)=mysqli_fetch_row($query))
	{
		$role=$r;
	}
	$row = mysqli_num_rows($query) ;
	
	//echo "<br> row=$row  ---$uname ---  $pword";
	if($row ==0) 
	{
		echo $uname.$pword;
        header('Location: noadmin.html');
	}

	if($row !=0) 
	{	$_SESSION['role']=$role;

		echo "<center><Br><h1>Logged in successfully  as ".$uname."</h1></center>".$role;
		header('Location: faculty_home.php');
		$_SESSION["essn"]=$uname;
	
	}
	
//echo ("<BR>Database SELECTED");



?>
