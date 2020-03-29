<?php
	$data = json_decode(stripslashes($_POST['data']));
	include("../../db/db.php");
	if(!mysql_select_db('college site'))
		echo mysql_error();
	echo "<h3>Consolidated report</h3>";
	if($data[0] == 1)
	{
		$var1 = $data[1];
		$var2 = $data[2];
		if($data[1] == '')
			$var1 = '1965-01-01';
		if($data[2] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id, count(A.award_id), F.department from award A, faculty_member F where A.award_date >= '$var1' and A.award_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(`count(A.award_id)`) as cnt, `department` from tmp group by `department` order by cnt desc");
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Awards</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Awards</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		$result = mysql_query("create table tmp as (select A.id, count(A.book_id), F.department from book A, faculty_member F where A.book_date >= '$var1' and A.book_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(`count(A.book_id)`) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Books</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Books</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		$result = mysql_query("create table tmp as (select A.id, count(A.community_user_id), F.department from communityuser A, faculty_member F where A.date_of_event >= '$var1' and A.date_of_event <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(`count(A.community_user_id)`) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Community Events</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		
		$result = mysql_query("create table tmp as (select A.id, count(A.conference_id) as count1, F.department from conference A, faculty_member F where A.from_date >= '$var1' and A.to_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Conference</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		
		$result = mysql_query("create table tmp as (select A.id, count(A.consultancy_id) as count1, F.department from consultancy A, faculty_member F where A.start_date >= '$var1' and A.end_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Consultancy</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		
		$result = mysql_query("create table tmp as (select A.id, count(A.course_id) as count1, F.department from courses_taught A, faculty_member F where A.academic_year >= '$var1' and A.academic_year <= '$var2' and A.id = F.fid group by A.id)");
		
		$result = mysql_query("select count(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Consultancy</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">No. of Courses taught</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
		}
		
	}
	
	
	if($data[18] == 1)
	{
		$var1 = $data[19];
		$var2 = $data[20];
	
		if($data[19] == '')
			$var1 = '1965-01-01';
		if($data[20] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("create table tmp as (select A.id, count(A.faculty_exchange_program_id) as count1, F.department from faculty_exchange_program A, faculty_member F where A.start_date >= '$var1' and A.end_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Faculty Exchange Program</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		
		$result = mysql_query("create table tmp as (select A.id, count(A.governance_id) as count1, F.department from governance A, faculty_member F where A.served_from >= '$var1' and A.served_to <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Governance</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
		
		
		$result = mysql_query("create table tmp as (select A.id, count(A.journal_id) as count1, F.department from journal A, faculty_member F where A.journal_year>= '$year1' and A.journal_year <= '$year2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Journal</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Faculties having published Journals</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
			

		$result = mysql_query("create table tmp as (select A.id, count(A.membership_number) as count1, F.department from professional_membership A, faculty_member F where A.from_date>= '$var1' and A.to_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Professional Memberships</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Faculties having Professional Memberships</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
			

		
		$result = mysql_query("create table tmp as (select A.id, count(A.project_id) as count1, F.department from project A, faculty_member F where A.start_date>= '$var1' and A.close_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Projects</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Projects Undertaken</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
			

		
		$result = mysql_query("create table tmp as (select A.id, count(A.seminar_id) as count1, F.department from seminar A, faculty_member F where A.start_date>= '$var1' and A.end_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Seminars</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
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
			

		
		$result = mysql_query("create table tmp as (select A.id, count(A.workshop_id) as count1, F.department from workshop A, faculty_member F where A.start_date>= '$var1' and A.end_date <= '$var2' and A.id = F.fid group by A.id)");
		$result = mysql_query("select sum(count1) as cnt, `department` from tmp group by `department` order by cnt desc");
		
		if(mysql_num_rows($result) > 0)
		{
				echo "<h3>Workshops</h3>";
				echo '<table class = "div_table_award_overview"  border = "1" padding = "10">';
				echo '<tr>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th" width = "35%">Participation Count</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$cnt = $row['cnt'];
					$department = $row['department'];					
					echo "<tr>";
            			echo "<td>$department</td>";
            			echo "<td>$cnt</td>";
                	echo "</tr>";
					 	
				}
				echo '</table>';
		}
		mysql_query("drop table tmp");
	
	
	}
	
	
?>