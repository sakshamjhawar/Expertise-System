<?php include("admin2.php");?>
<html>
<?php
	session_start();
	session_regenerate_id();
	$_SESSION['myusername'];
	
	?>
<head>
	<title>Faculty Project Details Info</title>
</head>
<body>
<a href="admin.html">Back</a>
<br>
<div id="main_container" align="center">
		
</div>
 <?php
$con = mysql_connect("localhost","root","root");
if (!$con)

  {

  die('Could not connect: '.mysql_error());

  }
$user=$_SESSION['myusername'];

$query = "SELECT * FROM project";

mysql_select_db("FES", $con);


  
   $retval = mysql_query( $query, $con );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   ?>
<table border="1" style="position:absolute; top:40%; left:30%">
  <tr>
    <td >Project Number</td>
    <td >Project Name</td>
    <td >Year Of sanction/td>
    <td >Period </td>
	<td >ESSN</td>
	
    <td >Amount Sanctioned</td>
	 <td >Funding Organization</td>
	</tr>
 <?php
 
 while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	echo "<tr>";
echo "<td>".$row['pno']."</td>";
  echo "<td>".$row['project_name']."</td>";
  echo "<td>".$row['year_of_sanction']."</td>";
  echo "<td>".$row['period']."</td>";
	echo "<td>".$row['ESSN']."</td>";
	echo "<td>".$row['amt_sanctioned']."</td>";
echo "<td>".$row['funding_org']."</td>";
    echo "</tr>";
   }
?>
</table>
  <?php 

   
   mysql_close($con);


?>
