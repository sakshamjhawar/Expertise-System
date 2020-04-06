<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="FES"; // Database name 
$tbl_name="technical_faculty";

// Connect to server and select databse.	
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


$sql="INSERT INTO technical_faculty (name,dob,mobile_no,email,gender,address,ESSN,qualification,doj,designation,password)

VALUES

('$_POST[name]','$_POST[dob]','$_POST[mobile_no]','$_POST[email]','$_POST[gender]','$_POST[address]','$_POST[ESSN]','$_POST[qualification]','$_POST[doj]','$_POST[designation]','$_POST[password]');";

$sql1="INSERT INTO faculty_login (myusername,mypassword)

VALUES

('$_POST[ESSN]','$_POST[mypassword]')";



if (!mysql_query($sql))

  {

  die('Error: ' . mysql_error());

  }
 
if (!mysql_query($sql1))

  {

  die('Error: ' . mysql_error());

  }

  header("location:end1.html");
?>
