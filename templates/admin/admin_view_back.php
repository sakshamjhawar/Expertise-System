<?php
	$data = json_decode(stripslashes($_POST['data']));
	include("../../db/db.php");
	if(!mysql_select_db('college site'))
		echo mysql_error();
	
	if($data[0] == 1)
	{
		$var1 = $data[1];
		$var2 = $data[2];
		if($data[1] == '')
			$var1 = '1965-01-01';
		if($data[2] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("select * from award where award_date >= '$var1' and award_date <= '$var2' order by award_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Awards</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Award</td>
					<td class = "div_table_award_overview_th">Agency</td>
					<td class = "div_table_award_overview_th">Date</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$award = $row['award_name'];
					$agency = $row['award_agency'];
					$award_date = $row['award_date'];					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$award</td>";
            			echo "<td>$agency</td>";
						echo "<td>$award_date</td>";
        			echo "</tr>";
					 	
				}
			
		}
	
	}
	
	if($data[3] == 1)
	{
		$var1 = $data[4];
		$var2 = $data[5];
		if($data[4] == '')
			$var1 = '1965-01-01';
		if($data[5] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("select * from book where book_date >= '$var1' and book_date <= '$var2' order by book_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Books</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Book</td>
					<td class = "div_table_award_overview_th">Role</td>
					<td class = "div_table_award_overview_th">Publisher</td>
					<td class = "div_table_award_overview_th">Book Edition</td>
					<td class = "div_table_award_overview_th">Date</td> 
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$book_title = $row['book_title'];
					$role = $row['role'];
					$publisher_name = $row['publisher_name'];
					$book_edition = $row['book_edition'];
					$book_date = $row['book_date'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$book_title</td>";
            			echo "<td>$role</td>";
		    			echo "<td>$publisher_name</td>";
						echo "<td>$book_edition</td>";
						echo "<td>$book_date</td>";
        			echo "</tr>";
					 	
				}			
			
		}
	
	}

	if($data[6] == 1)
	{
		$var1 = $data[7];
		$var2 = $data[8];
		if($data[7] == '')
			$var1 = '1965-01-01';
		if($data[8] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("select * from communityuser where date_of_event >= '$var1' and date_of_event <= '$var2' order by date_of_event desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Community Service</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Event Name</td>
					<td class = "div_table_award_overview_th">Role</td>
					<td class = "div_table_award_overview_th">Location</td>
					<td class = "div_table_award_overview_th">Date of Event</td> 
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$name_of_event = $row['name_of_event'];
					$role = $row['role'];
					$location = $row['location'];
					$date_of_event = $row['date_of_event'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$name_of_event</td>";
            			echo "<td>$role</td>";
		    			echo "<td>$location</td>";
						echo "<td>$date_of_event</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}
	
	if($data[9] == 1)
	{
		$var1 = $data[10];
		$var2 = $data[11];
		if($data[10] == '')
			$var1 = '1965-01-01';
		if($data[11] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("select * from conference where from_date >= '$var1' and to_date <= '$var2' order by from_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Conference</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Conference Name</td>
					<td class = "div_table_award_overview_th">Paper Title</td>
					<td class = "div_table_award_overview_th">Organizer</td>
					<td class = "div_table_award_overview_th">From Date</td>
					<td class = "div_table_award_overview_th">To Date</td>
					 
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$conference_name = $row['conference_name'];
					$paper_title = $row['paper_title'];
					$organizer = $row['organizer'];
					$from_date = $row['from_date'];
					$to_date = $row['to_date'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$conference_name</td>";
            			echo "<td>$paper_title</td>";
		    			echo "<td>$organizer</td>";
						echo "<td>$from_date</td>";
						echo "<td>$to_date</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}
	
	if($data[12] == 1)
	{
		$var1 = $data[13];
		$var2 = $data[14];
		if($data[13] == '')
			$var1 = '1965-01-01';
		if($data[14] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("select * from consultancy where start_date >= '$var1' and end_date <= '$var2' order by start_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Consultancy</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Work Title</td>
					<td class = "div_table_award_overview_th">Client</td>
					<td class = "div_table_award_overview_th">Start Date</td>
					<td class = "div_table_award_overview_th">To Date</td>
					<td class = "div_table_award_overview_th">Revenue</td>
					 
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$work_title = $row['work_title'];
					$client = $row['client'];
					$start_date = $row['start_date'];
					$end_date = $row['end_date'];
					$revenue = $row['revenue_generated'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$work_title</td>";
            			echo "<td>$client</td>";
		    			echo "<td>$start_date</td>";
						echo "<td>$end_date</td>";
						echo "<td>$revenue</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
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
		
		$result = mysql_query("select * from courses_taught where academic_year >= '$year1' and academic_year <= '$year2' order by academic_year desc");
		//echo mysql_error();
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Courses</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Course ID</td>
					<td class = "div_table_award_overview_th">Academic Year</td>
					<td class = "div_table_award_overview_th">No. of Students</td>
					<td class = "div_table_award_overview_th">Pass Percent</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$course_id = $row['course_id'];
					$academic_year = $row['academic_year'];
					$no_of_students = $row['no_of_students'];
					$pass_percent = $row['pass_percent'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$course_id</td>";
            			echo "<td>$academic_year</td>";
		    			echo "<td>$no_of_students</td>";
						echo "<td>$pass_percent</td>";
        			echo "</tr>";
					 	
				}				
			
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
		
		$result = mysql_query("select * from faculty_exchange_program where start_date >= '$var1' and end_date <= '$var2' order by start_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Faculty Exchange Program</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Institution</td>
					<td class = "div_table_award_overview_th">Subject</td>
					<td class = "div_table_award_overview_th">Start Date</td>
					<td class = "div_table_award_overview_th">End Date</td>
					<td class = "div_table_award_overview_th">UG/PG</td>
					<td class = "div_table_award_overview_th">Collaboration Type</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$institution = $row['institution'];
					$subject = $row['subject'];
					$start_date = $row['start_date'];
					$end_date = $row['end_date'];
					$ug_pg = $row['ug_pg'];
					$collaboration_type = $row['collaboration_type'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$institution</td>";
            			echo "<td>$subject</td>";
		    			echo "<td>$start_date</td>";
						echo "<td>$end_date</td>";
						echo "<td>$ug_pg</td>";
						echo "<td>$collaboration_type</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}
	
	if($data[21] == 1)
	{
		$var1 = $data[22];
		$var2 = $data[23];
	
		if($data[22] == '')
			$var1 = '1965-01-01';
		if($data[23] == '')
			$var2 = '2999-01-01';
		
		$result = mysql_query("select * from governance where served_from >= '$var1' and served_to <= '$var2' order by served_from desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Faculty Exchange Program</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Committee Name</td>
					<td class = "div_table_award_overview_th">Committee Status</td>
					<td class = "div_table_award_overview_th">Role</td>
					<td class = "div_table_award_overview_th">Served From</td>
					<td class = "div_table_award_overview_th">Served To</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$name_of_committee = $row['name_of_committee'];
					$status_of_committee = $row['status_of_committee'];
					$role = $row['role'];
					$served_from = $row['served_from'];
					$served_to = $row['served_to'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$name_of_committee</td>";
            			echo "<td>$status_of_committee</td>";
		    			echo "<td>$role</td>";
						echo "<td>$served_from</td>";
						echo "<td>$served_to</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
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
		
		
		$result = mysql_query("select * from journal where journal_year >= '$year1' and journal_year <= '$year2' order by journal_year desc");
		//echo mysql_error();
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Journals</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Paper Title</td>
					<td class = "div_table_award_overview_th">Journal Name</td>
					<td class = "div_table_award_overview_th">Journal Type</td>
					<td class = "div_table_award_overview_th">Research Area</td>
					<td class = "div_table_award_overview_th">Volume</td>
					<td class = "div_table_award_overview_th">Issue</td>
					<td class = "div_table_award_overview_th">Month</td>
					<td class = "div_table_award_overview_th">Year</td>
					
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$paper_title = $row['paper_title'];
					$journal_name = $row['journal_name'];
					$journal_type = $row['journal_type'];
					$research_area = $row['research_area'];
					$volume = $row['volume'];
					$issue = $row['issue'];
					$journal_month = $row['journal_month'];
					$journal_year = $row['journal_year'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$paper_title</td>";
            			echo "<td>$journal_name</td>";
		    			echo "<td>$journal_type</td>";
						echo "<td>$research_area</td>";
						echo "<td>$volume</td>";
						echo "<td>$issue</td>";
						echo "<td>$journal_month</td>";
						echo "<td>$journal_year</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}


	if($data[27] == 1)
	{
		$var1 = $data[28];
		$var2 = $data[29];
	
		if($data[28] == '')
			$var1 = '1965-01-01';
		if($data[29] == '')
			$var2 = '2999-01-01';
			

		
		$result = mysql_query("select * from professional_membership where from_date >= '$var1' and to_date <= '$var2' order by from_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Professional Memebership</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Name</td>
					<td class = "div_table_award_overview_th">Membership Type</td>
					<td class = "div_table_award_overview_th">From Date</td>
					<td class = "div_table_award_overview_th">To Date</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$name = $row['name'];
					$membership_type = $row['membership_type'];
					$from_date = $row['from_date'];
					$to_date = $row['to_date'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$name</td>";
            			echo "<td>$membership_type</td>";
		    			echo "<td>$from_date</td>";
						echo "<td>$to_date</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}


	if($data[30] == 1)
	{
		$var1 = $data[31];
		$var2 = $data[32];
	
		if($data[31] == '')
			$var1 = '1965-01-01';
		if($data[32] == '')
			$var2 = '2999-01-01';
			

		
		$result = mysql_query("select * from project where start_date >= '$var1' and close_date <= '$var2' order by start_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Project</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Project Title</td>
					<td class = "div_table_award_overview_th">Principal Investigator</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Start Date</td>
					<td class = "div_table_award_overview_th">End Date</td>
					<td class = "div_table_award_overview_th">Project Cost</td>
					<td class = "div_table_award_overview_th">Funding Agency</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$project_title = $row['project_title'];
					$principal_investigator = $row['principal_investigator'];
					$dept = $row['department'];
					$start_date = $row['start_date'];
					$end_date = $row['close_date'];
					$project_cost = $row['project_cost'];
					$funding_agency = $row['funding_agency'];
					
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$project_title</td>";
            			echo "<td>$principal_investigator</td>";
		    			echo "<td>$dept</td>";
						echo "<td>$start_date</td>";
						echo "<td>$end_date</td>";
						echo "<td>$project_cost</td>";
						echo "<td>$funding_agency</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}

	if($data[33] == 1)
	{
		$var1 = $data[34];
		$var2 = $data[35];
	
		if($data[34] == '')
			$var1 = '1965-01-01';
		if($data[35] == '')
			$var2 = '2999-01-01';
			

		
		$result = mysql_query("select * from seminar where start_date >= '$var1' and end_date <= '$var2' order by start_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Seminar</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Title</td>
					<td class = "div_table_award_overview_th">Organizer</td>
					<td class = "div_table_award_overview_th">Role</td>
					<td class = "div_table_award_overview_th">Level</td>
					<td class = "div_table_award_overview_th">Area</td>
					<td class = "div_table_award_overview_th">Target Audience</td>
					<td class = "div_table_award_overview_th">Start Date</td>
					<td class = "div_table_award_overview_th">End Date</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$seminar_title = $row['seminar_title'];
					$organizer = $row['seminar_organizing_authority'];
					$role = $row['role'];
					$seminar_level = $row['seminar_level'];
					$seminar_area = $row['seminar_area'];
					$target_audience = $row['target_audience'];
					$start_date = $row['start_date'];
					$end_date = $row['end_date'];
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$seminar_title</td>";
            			echo "<td>$organizer</td>";
		    			echo "<td>$role</td>";
						echo "<td>$seminar_level</td>";
						echo "<td>$seminar_area</td>";
						echo "<td>$target_audience</td>";
						echo "<td>$start_date</td>";
						echo "<td>$end_date</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}
	
	
	if($data[36] == 1)
	{
		$var1 = $data[37];
		$var2 = $data[38];
	
		if($data[37] == '')
			$var1 = '1965-01-01';
		if($data[38] == '')
			$var2 = '2999-01-01';
			

		
		$result = mysql_query("select * from workshop where start_date >= '$var1' and end_date <= '$var2' order by start_date desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview" border="1">';
				echo "<h3>Workshop</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Title</td>
					<td class = "div_table_award_overview_th">Organizer</td>
					<td class = "div_table_award_overview_th">Role</td>
					<td class = "div_table_award_overview_th">Level</td>
					<td class = "div_table_award_overview_th">Area</td>
					<td class = "div_table_award_overview_th">Target Audience</td>
					<td class = "div_table_award_overview_th">Start Date</td>
					<td class = "div_table_award_overview_th">End Date</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$workshop_title = $row['workshop_title'];
					$organizer = $row['workshop_organizing_authority'];
					$role = $row['role'];
					$workshop_level = $row['workshop_level'];
					$workshop_area = $row['workshop_area'];
					$target_audience = $row['target_audience'];
					$start_date = $row['start_date'];
					$end_date = $row['end_date'];
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$workshop_title</td>";
            			echo "<td>$organizer</td>";
		    			echo "<td>$role</td>";
						echo "<td>$workshop_level</td>";
						echo "<td>$workshop_area</td>";
						echo "<td>$target_audience</td>";
						echo "<td>$start_date</td>";
						echo "<td>$end_date</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}
	/*
	if($data[39] == 1)
	{
		$var1 = $data[40];
		$var2 = $data[41];
	
		if($data[40] == '')
			$var1 = '1965-01-01';
		if($data[41] == '')
			$var2 = '2999-01-01';
	
		$year1 = date('Y', strtotime($var1));
		$year2 = date('Y', strtotime($var2));		

		
		$result = mysql_query("select * from profile where join_year >= '$year1' and join_year <= '$year2' order by join_year desc");
		if(mysql_num_rows($result) > 0)
		{
				echo '<table class = "div_table_award_overview">';
				echo "<h3>workshop</h3>";
				echo '<tr>
					<td class = "div_table_award_overview_th">Teacher</td>
					<td class = "div_table_award_overview_th">Department</td>
					<td class = "div_table_award_overview_th">Qualification</td>
					<td class = "div_table_award_overview_th">Institution</td>
					<td class = "div_table_award_overview_th">University</td>
					<td class = "div_table_award_overview_th">Pass Year</td>
					<td class = "div_table_award_overview_th">Percentage</td>
				</tr>';
				
				for($i = 0; $i < mysql_num_rows($result); $i++)
				{
					$row = mysql_fetch_array($result);
					$id = $row['id'];
					
					$res = mysql_query("select * from faculty_member where fid = '$id'");
					$r = mysql_fetch_array($res);
					$teacher_name = $r['name'];
					$department = $r['department'];
					$qualification = $row['qualification'];
					$institution = $row['institution'];
					$university = $row['university'];
					$pass_year = $row['pass_year'];
					$percentage = $row['percentage'];
					echo "<tr>";
            			echo "<td>$teacher_name</td>";
            			echo "<td>$department</td>";
            			echo "<td>$qualification</td>";
            			echo "<td>$institution</td>";
		    			echo "<td>$university</td>";
						echo "<td>$pass_year</td>";
						echo "<td>$percentage</td>";
        			echo "</tr>";
					 	
				}				
			
		}
	
	}
	*/
?>
