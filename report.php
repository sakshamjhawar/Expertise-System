<?php
		session_start();
		include 'db.php';
		$con=mysqli_connect("localhost", "root", "root","FES");?>


<html>
<head>
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
  width:100%;
  table-layout: fixed;
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
  padding: 100px;
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
</head>
<body background = "images.jpeg">

<section>
  <!--for demo wrap-->
  <h1><b>Faculty Expertise Details</b></h1>
  <center>
  <form method="POST" action="report.php"><br><br>
<font color ="white">Select the Name of Faculty:</font><select type="name" name="fname">
<br><br>
 <td><option value="">Faculty names</option>
		<?php
		$query2 = "SELECT name FROM faculty ORDER BY name";
		//echo $_SESSION['eid'];
	    
	    $result4 = mysqli_query($con, $query2);
		
		while($row4 = mysqli_fetch_array($result4)):;?>

            <option value="<?php echo $row4['name'];?>"><?php echo $row4['name'];?></option>

            <?php endwhile;?><option>all</option></td></select>
<font color ="white">Select your option:</font><select name="option">
<option>Award</option>
<option>Consultancy</option>
<option>Courses</option>
<option>Doctorate</option>
<option>Invited talks</option>
<option>Paper</option>
<option>Patent</option>
<option>Project</option>
<option>Workshop</option>
</select><br>

<br><br>

<input type="submit" name="submit" value="Show Result">
 </form>
 <a href="admin2.php"><font color="white"> Back</font></a>
</center>

<?php

include 'db.php';
$con=mysqli_connect("localhost", "root", "root","FES");

//session_start();
if(isset($_POST['submit']) && !empty($_POST['fname']) && !empty($_POST['option']))
{
	$fname= $_POST['fname'];
	$option = $_POST['option'];
    

	$_SESSION['fname']=$fname;
	$_SESSION['option']=$option;

		?>
	<h1><?php echo $option; echo" DETAILS";?></h1>
	<?php
	
    $query="SELECT ESSN,designation FROM faculty WHERE '$fname'=name";
    $query_run=mysqli_query($con,$query);
	$row = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	if($option=="Award")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM award";	
	  	else
		$query="SELECT * FROM award WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM award";	
	  	else
		$query="SELECT * FROM award WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "<font color='white'><h3>No entry Available</font>";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Name</th>
        <th>Designation</th>
          <th>Award Name</th>
	<th>Agency name</th>
	<th>Award Year</th>
	<th>url</th>
	
	
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['Award_name'];?></td>
		<td><?php echo $query_row['Agency'];?></td>
		<td><?php echo $query_row['A_year'];?></td>
		<td><?php echo '<a href='.$query_row['url'].'>'.$query_row['url'].'</a>';?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
<?php } 



else if($option=="Consultancy")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM consultancy";	
	  	else
		$query="SELECT * FROM consultancy WHERE '$row[0]'=Essn";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM consultancy";	
	  	else
		$query="SELECT * FROM consultancy WHERE '$row[0]'=Essn";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>Consultancy Name</th>
	<th>Client name</th>
	<th>Revenue Generated</th>
	<th>URL</th>
	
	
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['Essn'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=Essn";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=Essn";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['c_name'];?></td>
		<td><?php echo $query_row['Client_name'];?></td>
		<td><?php echo $query_row['revenue_generated'];?></td>
		<td><?php echo '<a href='.$query_row['URL'].'>'.$query_row['URL'].'</a>';?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 



else if($option=="Courses")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM courses";	
	  	else
		$query="SELECT * FROM courses WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM courses";	
	  	else
		$query="SELECT * FROM courses WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>Branch</th>
	<th>Code</th>
	<th>Name</th>
	<th>Year</th>
	<th>Sem</th>
	<th>Section</th>
	
	
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['branch'];?></td>
		<td><?php echo $query_row['course_code'];?></td>
		<td><?php echo $query_row['course_name'];?></td>
		<td><?php echo $query_row['year'];?></td>
		<td><?php echo $query_row['semester'];?></td>
		<td><?php echo $query_row['section'];?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 




else if($option=="Doctorate")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM doctor";	
	  	else
		$query="SELECT * FROM doctor WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM doctor";	
	  	else
		$query="SELECT * FROM doctor WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>University</th>
	<th>Year Of Registration</th>
	<th>Year of Completion</th>
	<th>Guided By</th>
       </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['university'];?></td>
		<td><?php echo $query_row['year_of_reg'];?></td>
		<td><?php echo $query_row['year_of_completion'];?></td>
		<td><?php echo $query_row['guided_by'];?></td>
		
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 




else if($option=="Invited talks")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM invited_talk";	
	  	else
		$query="SELECT * FROM invited_talk WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM invited_talk";	
	  	else
		$query="SELECT * FROM invited_talk WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>Topic</th>
	<th>Date</th>
	<th>Research Area</th>
	<th>Organisation Name</th>
	<th>Participation level</th>
       </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['topic'];?></td>
		<td><?php echo $query_row['date'];?></td>
		<td><?php echo $query_row['research_area'];?></td>
		<td><?php echo $query_row['org_name'];?></td>
		<td><?php echo $query_row['Participation_level'];?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 






else if($option=="Paper")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM paper";	
	  	else
		$query="SELECT * FROM paper WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM paper";	
	  	else
		$query="SELECT * FROM paper WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>ISBN</th>
	<th>Type</th>
	<th>Topic</th>
	<th>Co-Author</th>
	<th>URL</th>
       </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['ISBN'];?></td>
		<td><?php echo $query_row['paper_type'];?></td>
		<td><?php echo $query_row['paper_topic'];?></td>
		<td><?php echo $query_row['co_author'];?></td>
		<td><?php echo '<a href='.$query_row['URL'].'>'.$query_row['URL'].'</a>';?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 









else if($option=="Patent")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM patent";	
	  	else
		$query="SELECT * FROM patent WHERE '$row[0]'=Essn";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM patent";	
	  	else
		$query="SELECT * FROM patent WHERE '$row[0]'=Essn";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>YEAR</th>
	<th>Title</th>
	<th>Type</th>
       </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['Essn'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=Essn";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=Essn";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['year_of_reg'];?></td>
		<td><?php echo $query_row['patent_title'];?></td>
		<td><?php echo $query_row['patent_type'];?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 





else if($option=="Project")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM project";	
	  	else
		$query="SELECT * FROM project WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM project";	
	  	else
		$query="SELECT * FROM project WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>Name</th>
	<th>Year</th>
	<th>Period</th>
	<th>Amount Sanctioned</th>
	<th>Funding Organisation</th>
	<th>URL</th>
       </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['project_name'];?></td>
		<td><?php echo $query_row['year_of_sanction'];?></td>
		<td><?php echo $query_row['period'];?></td>
		<td><?php echo $query_row['amt_sanctioned'];?></td>
		<td><?php echo $query_row['funding_org'];?></td>
		<td><?php echo '<a href='.$query_row['URL'].'>'.$query_row['URL'].'</a>';?></td>
		
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 





else if($option=="Workshop")
	{
	    if($edate && $sdate)
	    {
	 	if($fname=="all")
	 	$query="SELECT * FROM workshop";	
	  	else
		$query="SELECT * FROM workshop WHERE '$row[0]'=ESSN";
            }
            else
        	{
        	if($fname=="all")
	 	$query="SELECT * FROM workshop";	
	  	else
		$query="SELECT * FROM workshop WHERE '$row[0]'=ESSN";
    		}
    	$query_run=mysqli_query($con,$query);
	
	//$row1 = mysqli_fetch_array($query_run, MYSQLI_BOTH);
	//if($row1[0]=='')
		//echo "<br><br><font color=white size='6px'><center>No entry available for </center></font>";
//	echo"<font color=white size='6px'><center>$fname<br><br></center></font>";
	//echo $row1[3];	
	if(mysqli_num_rows($query_run)==0)
	{
		echo "No entry Available";
	}
?>

  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>Faculty Name</th>
        <th>Designation</th>
         <th>ID</th>
	<th>Topic</th>
	<th>Year</th>
	<th>Workshop mode</th>
	<th>Workshop type</th>
	
       </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody><?php
	while($query_row=mysqli_fetch_assoc($query_run))
	{ $e=$query_row['ESSN'];
		?>
		<tr>
		<td><?php if($fname != 'all') echo $fname; 
		else { $queryx="SELECT name from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		}?></td>
		<td><?php if($fname != 'all') echo $row[1]; else { $queryx="SELECT designation from faculty where '$e'=ESSN";
		$query_runx=mysqli_query($con,$queryx);
			$rowx = mysqli_fetch_array($query_runx, MYSQLI_BOTH);
			echo $rowx[0];
		} ?></td>
		<td><?php echo $query_row['workshop_ID'];?></td>
		<td><?php echo $query_row['topic'];?></td>
		<td><?php echo $query_row['year'];?></td>
		<td><?php echo $query_row['workshop_mode'];?></td>
		<td><?php echo $query_row['Workshop_type'];?></td>
		</tr>
	<?php } ?>
      </tbody>
    </table>
  </div>
 
<?php } 







} ?>


</section>
</body>
</html>
<!--
//else if(isset($_POST['submit']))
//{
//	echo "<script type='text/javascript'> alert('No date/time selected. Please enter all the details.');</script>";

-->
