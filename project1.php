<?php include("admin2.php");?>
<html>
<?php
	session_start();
	session_regenerate_id();
	$_SESSION['myusername'];
	
	?>
<style type="text/css">


h2
{
	color:white;
	text-align:center;
}

h1{
  font-size: 40px;
  color: white;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:78%;
  table-layout: ;
  border-spacing: 10px;
  border-collapse:collapse;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 5px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: center;
  font-weight: 100;
  font-size: 15px;
  color: #fff;
  text-transform: uppercase;
}

$(document).ready(function()
{
  $("tr:odd").css({
    "background-color":"#000",
    "color":"#fff"});
});
tbody td{
  padding: 20px;
}
tbody tr:nth-child(even){
  background-color: #AED6F1  ;
  color: #34495E  ;
  padding:50px;
  text-align: center;
}

tbody tr:nth-child(odd){
  background-color: #BDC3C7  ;
  color: #34495E  ;
  padding:50px;
  text-align: center;
}


/* demo styles */

@import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: white;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}

</style>
<head>
	<title>Faculty Project Details Info</title>
</head>
<body>
<br><br><h2 align="center" style=" height:500%; position:relative; left:8%; overflow:hidden; "><strong>PROJECT DETAILS</strong></h2>
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
<table border="1" style="position:absolute; top:45%; left:20%">
  <tr>
    
    <td ><B>PROJECT NAME</td>
    <td ><B>YEAR OF SANCTION</td>
    <td ><B>PERIOD</td>
	<td ><B>ESSN</td>
	<td ><B>AMOUNT SANCTIONED</td>
	 <td ><B>FUNDING ORGANISATION</td>
<td ><B>URL</td>
	</tr>
 <?php
 
 while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	echo "<tr>";

  echo "<td>".$row['project_name']."</td>";
  echo "<td>".$row['year_of_sanction']."</td>";
  echo "<td>".$row['period']."</td>";
	echo "<td>".$row['ESSN']."</td>";
	echo "<td>".$row['amt_sanctioned']."</td>";
echo "<td>".$row['funding_org']."</td>";
?>
<td><?php echo '<a href='.$row['URL'].'>'.$row['URL'].'</a>';?></td>
<?php
    echo "</tr>";
   }
?>
</table>
  <?php 

   
   mysql_close($con);


?>
