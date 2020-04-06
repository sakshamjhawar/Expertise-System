<?php

$localhost="localhost";

$con=mysqli_connect("localhost","root","root","FES");

//echo "hai";

if(!$con)
{
	echo("<BR>Connection failed");
	exit();
}
//echo ("<BR>connected to the database");


$db=mysqli_select_db($con,"FES");

if(!db)
{

	echo("<BR>Database not selected");
	exit();

}
?>
