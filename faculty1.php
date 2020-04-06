<html>
<head>
	<title>Faculty Info</title>
</head>
<body>
<a href="admin.html">Back</a>
<br>
<div id="main_container" align="center">
		<h1 align="center">Faculty Database System</h1>
		<img src="RVCE_New_Logo.jpg" height="100" width = "100" alt="Suni" class="center" />
		<br>
<br>
<br>
</div>
 <?php
$con = mysql_connect("localhost","root","root");
if (!$con)

  {

  die('Could not connect: '.mysql_error());

  }

mysql_select_db("FES", $con);

$sql = "SELECT * FROM faculty ";

  
   $retval = mysql_query( $sql, $con );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   ?>
<table border="1" align="center">
  <tr>
    <td >NAME </td>
    <td >DATE OF BIRTH</td>
    <td >PHONE NUMBER</td>
    
	<td >EMAIL ID</td>
	<td >GENDER</td>
	<td >ADDRESS</td>
	 <td >ESSN </td>
<td >QUALIFICATION</td>
<td >DOJ</td>
    <td >DESIGNATION</td>
    
<td >PASSWORD</td>
    
	
	</tr>
 <?php
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	echo "<tr>";
echo "<td>".$row['name']."</td>";
  echo "<td>".$row['dob']."</td>";
  echo "<td>".$row['mobile_no']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['gender']."</td>";
	echo "<td>".$row['address']."</td>";
echo "<td>".$row['ESSN']."</td>";
 echo "<td>".$row['qualification']."</td>";
echo "<td>".$row['doj']."</td>";
  echo "<td>".$row['designation']."</td>";
  
echo "<td>".$row['password']."</td>";
 
	
	
  echo "</tr>";
   }
?>
</table>
  <?php 

   
   mysql_close($con);


?>

