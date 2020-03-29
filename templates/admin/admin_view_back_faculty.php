<?php
	$data = json_decode(stripslashes($_POST['data']));
	$chosendept = $_POST['depselect'];
	include("../../db/db.php");
	if(!mysql_select_db('college site'))
		echo mysql_error();
	echo "<h3>Consolidated report for '$chosendept'</h3>";
	if($data[0] == 1)
	{
		$var1 = $data[1];
		$var2 = $data[2];
		if($data[1] == '')
			$var1 = '1965-01-01';
		if($data[2] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.award_id) as no_of_awards from award A, faculty_member F where A.award_date >= '$var1' and A.award_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Awards</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Awards</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}
	
	if($data[3] == 1)
	{
		$var1 = $data[4];
		$var2 = $data[5];
		if($data[4] == '')
			$var1 = '1965-01-01';
		if($data[5] == '')
			$var2 = '2999-01-01';
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.book_id) as no_of_awards from book A, faculty_member F where A.book_date >= '$var1' and A.book_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Books</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Books</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}

	if($data[6] == 1)
	{
		$var1 = $data[7];
		$var2 = $data[8];
		if($data[7] == '')
			$var1 = '1965-01-01';
		if($data[8] == '')
			$var2 = '2999-01-01';
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.community_user_id) as no_of_awards from communityuser A, faculty_member F where A.date_of_event >= '$var1' and A.date_of_event <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Community Service</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Communities</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}
	
	if($data[9] == 1)
	{
		$var1 = $data[10];
		$var2 = $data[11];
		if($data[10] == '')
			$var1 = '1965-01-01';
		if($data[11] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.conference_id) as no_of_awards from conference A, faculty_member F where A.from_date >= '$var1' and A.to_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Conference</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Conferences</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}
	
	if($data[12] == 1)
	{
		$var1 = $data[13];
		$var2 = $data[14];
		if($data[13] == '')
			$var1 = '1965-01-01';
		if($data[14] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.consultancy_id) as no_of_awards from consultancy A, faculty_member F where A.start_date >= '$var1' and A.end_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Consultancy</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Consultancies</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}
	
	if($data[15] == 1)
	{
		$var1 = $data[16];
		$var2 = $data[17];
	
		if($data[16] == '')
			$var1 = '1965-01-01';
		if($data[17] == '')
			$var2 = '2099-1-1';
		
		$year1 = date('Y', strtotime($var1));
		$year2 = date('Y', strtotime($var2));
//		echo 'hello'.$year1;
	//	echo 'hellog'.$year2;
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.course_id) as no_of_awards from courses_taught A, faculty_member F where A.academic_year >= '$var1' and A.academic_year <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Courses Taught</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Courses Taught</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
		
	}
	
	
	if($data[18] == 1)
	{
		$var1 = $data[19];
		$var2 = $data[20];
	
		if($data[19] == '')
			$var1 = '1965-01-01';
		if($data[20] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.ug_pg) as no_of_awards from faculty_exchange_program A, faculty_member F where A.start_date >= '$var1' and A.end_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Faculty Exchange Program</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Faculty Exchanges</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}
	
	if($data[21] == 1)
	{
		$var1 = $data[22];
		$var2 = $data[23];
	
		if($data[22] == '')
			$var1 = '1965-01-01';
		if($data[23] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.governance_id) as no_of_awards from governance A, faculty_member F where A.served_from >= '$var1' and A.served_to <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Governance</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Governance</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	}


	if($data[24] == 1)
	{
		$var1 = $data[25];
		$var2 = $data[26];
	
		if($data[25] == '')
			$var1 = '1965-01-01';
		if($data[26] == '')
			$var2 = '2999-01-01';
			
			
		$year1 = date('Y', strtotime($var1));
		$year2 = date('Y', strtotime($var2));
		
		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.journal_id) as no_of_awards from journal A, faculty_member F where A.journal_year >= '$var1' and A.journal_year <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Journal</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Journals</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}


	if($data[27] == 1)
	{
		$var1 = $data[28];
		$var2 = $data[29];
	
		if($data[28] == '')
			$var1 = '1965-01-01';
		if($data[29] == '')
			$var2 = '2999-01-01';
			

		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.membership_number) as no_of_awards from professional_membership A, faculty_member F where A.from_date >= '$var1' and A.to_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Professional Membership</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">Professional Membership</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}


	if($data[30] == 1)
	{
		$var1 = $data[31];
		$var2 = $data[32];
	
		if($data[31] == '')
			$var1 = '1965-01-01';
		if($data[32] == '')
			$var2 = '2999-01-01';
			

		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.project_id) as no_of_awards from project A, faculty_member F where A.start_date >= '$var1' and A.close_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Project</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Projects</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}

	if($data[33] == 1)
	{
		$var1 = $data[34];
		$var2 = $data[35];
	
		if($data[34] == '')
			$var1 = '1965-01-01';
		if($data[35] == '')
			$var2 = '2999-01-01';
			

		
		$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.seminar_id) as no_of_awards from seminar A, faculty_member F where A.start_date >= '$var1' and A.end_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Seminars</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Seminars</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	}
	
	
	if($data[36] == 1)
	{
		$var1 = $data[37];
		$var2 = $data[38];
	
		if($data[37] == '')
			$var1 = '1965-01-01';
		if($data[38] == '')
			$var2 = '2999-01-01';
			

		
				$result = mysql_query("create table tmp as (select A.id as id, F.name as name, count(A.workshop_id) as no_of_awards from workshop A, faculty_member F where A.start_date >= '$var1' and A.end_date <= '$var2' and A.id = F.fid and F.department = '$chosendept' group by A.id)");
		echo mysql_error();
		$result = mysql_query("select* from tmp order by no_of_awards desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Seminars</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Faculty ID</td>
					<td class = "div_table_award_overview_th">Faculty Name</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Workshops</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$fid = $row['id'];
					$name = $row['name'];
					$noa = $row['no_of_awards'];					
					echo "<tr>";
            			echo "<td>$fid</td>";
            			echo "<td>$name</td>";
						echo "<td>$noa</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
			
		}
		mysql_query("drop table tmp");
	
	
	}
	
	
?>
