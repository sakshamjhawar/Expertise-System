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
  table-layout:;
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
<body>
<br><br><h2 align="center" style=" height:500%; position:relative; left:8%; overflow:hidden; "><strong>COURSE DETAILS</strong></h2>
<br>
<div id="main_container" align="center">
		
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
$user=$_SESSION['myusername'];

$query = "SELECT * FROM courses";

mysql_select_db("FES", $con);


  
   $retval = mysql_query( $query, $con );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   ?>

<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
<table border="1" style="position:absolute; top:45%; left:20%">


  <tr>
 <td ><b>BRANCH</td>
    <td ><b>COURSE <br>CODE</td>
    <td ><b>COURSE NAME</td>
    <td ><b>YEAR</td>
	<td ><b>SEMESTER</td>
<td ><b>SECTION</td>
<td ><b>ESSN</td>
	
	</tr>
 <?php
 
 while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	echo "<tr>";
 echo "<td>".$row['branch']."</td>";
  echo "<td>".$row['course_code']."</td>";
  echo "<td>".$row['course_name']."</td>";
  echo "<td>".$row['year']."</td>";
	echo "<td>".$row['semester']."</td>";
 echo "<td>".$row['section']."</td>";
 echo "<td>".$row['ESSN']."</td>";

	
	
  echo "</tr>";
   }
?>
</table>
  <?php 

   
   mysql_close($con);


?>
