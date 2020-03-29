<?php
error_reporting(E_ALL ^ E_DEPRECATED);
		session_start();
		include("../../../db/db.php");

function getMonth($val)
{
	if($val == '1')
		return "Jan";
	else if($val == '2')
		return "Feb";
	else if($val == '3')
		return "Mar";
	else if($val == '4')
		return "Apr";
	else if($val == '5')
		return "May";
	else if($val == '6')
		return "Jun";
	else if($val == '7')
		return "Jul";
	else if($val == '8')
		return "Aug";
	else if($val == '9')
		return "Sep";
	else if($val == '10')
		return "Oct";
	else if($val == '11')
		return "Nov";
	else if($val == '12')
		return "Dec";
	else
		return $val;
}
function getDiv($num)
{
	if($num%10 == 1)
	{
		if(($num/10)%10 == 1)
			return "th";
		else
			return "st";
	}
	else if ($num%10 == 2)
	{
		if(($num/10)%10 == 1)
			return "th";
		else
			return "nd";
	}
	else if($num%10 == 3)
	{
		/*echo "<script>alert('hi2')</script><br>";*/
		if(($num/10)%10 == 1)
		{	
			/*echo "<script>alert('hi23')</script><br>";*/
			return "th";
		}
		else
			return "rd";
	}
	else
		return "th";
}


if(!mysql_select_db('college site'))
{
	die(mysql_error());
	return false;
}
$id = $_SESSION['faculty_id'];
	//$id = 'I4iA41flS';
	
  
if(!($result = mysql_query("select * from faculty_member where fid='$id'")))
{
	echo "<script>alert('Some problem occured')</script>";
	return;
}
echo "<div id = 'resume_data'>";
echo "<div id = 'content' style='margin-left:0.75em; margin-right:0.75em;'>";
$result= mysql_fetch_array($result);
echo "<h1 style = 'text-align:center'>Resume</h1>";
echo "<table width = '100%' cellpadding='15'>";
echo "<tr>";
echo "<td>Name: <b>".$result['name']."</b></td><td style='text-align:right'>Contact No.: <b>".$result['phone_number']."</b></td></tr><br/>";
echo "<tr><td>Department: <b>".$result['department']."</b></td><td style='text-align:right'>Email: <b>".$result['email']."</b></td></tr>";
echo "</table>";


/************************************************
*					Education					*
************************************************/
$query = "SELECT * FROM profile where id = '$id' order by pass_year desc";
    $result = mysql_query($query);
	if(!$result)
		{
			echo "<script>alert('Some problem occured.')</script>";
			return;
		}
$num = mysql_num_rows($result);
if($num >0)
{
	echo "<h3>Education</h3>";	
	echo "<ul>";
	echo "<table width='100%' cellpadding='10'>";	
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $qualification = $row['qualification'];
        $institution = $row['institution'];
        $location = $row['location'];
        $join_month = $row['join_month'];
		$join_year = $row['join_year'];
		$pass_month = $row['pass_month'];
		$pass_year = $row['pass_year'];
		$percentage = $row['percentage'];
		$class1 = $row['class1'];
		//$file = $row['file'];
        echo "<p><tr>";
        echo "<td width='1%' cellpadding='none'><li></td>";
        echo "<td style='float:left'><b>".$qualification.", </b>";
        echo $institution.", ".$location. ".</td>";
        echo "<td width = '30%' style='text-align:right'><b>(".getMonth($join_month)." ".$join_year." - ".getMonth($pass_month)." ".$pass_year.")</b></td></li>";
		echo "</li></tr></p>";
		echo "<tr><p>";
		echo "<td></td>";
		echo "<td >Aggregate ".$percentage."%      ";
		echo $class1.getDiv($class1)." Division</td>";
		echo "</tr></p>";
	}
echo "</table></ul>";
}


/************************************************
*					Awards						*
************************************************/
$query = "SELECT * FROM award where id = '$id'";
    $result = mysql_query($query);
	if(!$result)
		{
			echo 'Some problem occured.';
			return;
		}
$num = mysql_num_rows($result);
if($num >0)
{
	echo "<h3>Awards and Achievements</h3>";
	echo "<ul>";
	echo "<table width='100%' cellpadding='10'>";	
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $aid = $row['award_id'];
        $aname = $row['award_name'];
        $agency = $row['award_agency'];
        $date = $row['award_date'];
		$temp = explode('-', $date);
		$year = $temp[0];
		$month = $temp[1];
		$date = $temp[2];
		$url = $row['url'];
		$rmk = $row['remark'];
		//$file = $row['file'];
        echo "<p><tr>";
        echo "<td width='1%' cellpadding='none'><li></td><td> ";
        echo "<b>".$aname."</b>";
		echo " awarded by ";
        echo "<b>".$agency."</b>.</td>";
        echo "<td style='text-align:right'><b>(".$date.getDiv($date)." ".getMonth($month)." ".$year.")</b></td>";
		echo "</tr></p>";
	}
echo "</table></ul>";
}



/************************************************
*					Book						*
************************************************/
$query = "SELECT * FROM book where id = '$id' order by book_date desc";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);
if($num)
{ 
	echo "<h3>Books</h3>";
	echo "<ul>";
	echo "<table width = '100%' cellpadding='10'>";
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $book_id = $row['book_id'];
        $role = $row['role'];
        $book_or_chapter = $row['book_or_chapter'];
        $book_title = $row['book_title'];
		$book_edition = $row['book_edition'];
		$publisher_name = $row['publisher_name'];
		$isbn = $row['isbn'];
		$book_date = $row['book_date'];
		$temp = explode('-', $book_date);
		$year = $temp[0];
		$month = $temp[1];
		$date = $temp[2];		
		
			echo "<tr>";
			 echo "<td width='1%' cellpadding='none'><li></td>";
            echo "<td>".$role." of ";
			if($book_or_chapter == 'Chapter')
			{
				$query = "SELECT chapter_name FROM book_chapters where id = '$id' and book_id = '$book_id'";
				$res = mysql_query($query);
				$n = mysql_num_rows($res);
				if($n > 0)
				{
					echo $n;	
					if($n == 1)
						echo " chapter namely ";
					else
						echo " chapters namely ";
					for($j = 0; $j < $n; $j++)
					{
						$r = mysql_fetch_array($res);
						$au = $r['chapter_name'];
						if($j == $n - 1)
							echo "<b>".$au. "</b> ";
						else
							echo "<b>".$au.",</b> ";
					}
					echo "in book titled ";
				}
			}
            echo "<b>".$book_title."</b>, ";
			echo $book_edition.getDiv($book_edition)." edition bearing ISBN no. ";
			echo $isbn." ";
			$query = "SELECT * FROM book_authors where id = '$id' and book_id = '$book_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			if($n > 0)
			{
				if($book_or_chapter == 'Chapter')
					echo "authored by ";
				else
					echo "co-authored by ";
				for($j = 0; $j < $n; $j++)
				{
					$r = mysql_fetch_array($res);
					$au = $r['author_name'];
					if($j == $n - 1)
						echo $au.' ';
					else
						echo $au.", ";
				}
			}
			if($book_or_chapter == 'Book')
			{
				$query = "SELECT chapter_name FROM book_chapters where id = '$id' and book_id = '$book_id'";
				$res = mysql_query($query);
				$n = mysql_num_rows($res);
				if($n > 0)
				{
					echo "and wrote ". $n;
					if($res['count(chapter_name)'] == 1)
						echo " chapter namely ";
					else
						echo " chapters namely ";
					for($j = 0; $j < $n; $j++)
					{
						$r = mysql_fetch_array($res);
						$au = $r['chapter_name'];
						if($j == $n - 1)
							echo "<b>".$au. "</b> ";
						else
							echo "<b>".$au.", </b>";
					}
				}
			}
			echo "and published by ";
			echo $publisher_name.".";
			echo "</td>";	
			echo "<td style='text-align:right' width='25%'><b>(".$date.getDiv($date)." ".getMonth($month)." ".$year.")</b></td>";
        echo "</tr>";
	}
    echo '</table>';
	echo '</ul>';
}


/************************************************
*		Courses Taught							*
************************************************/
$query = "SELECT * FROM courses_taught where id='$id' order by academic_year desc";
$result = mysql_query($query);
$num = mysql_num_rows($result);
if($num > 0)
{
		echo "<h3>Courses Taught</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";	
   		for ($i = 0; $i < $num; $i++)
		{
			$row = mysql_fetch_array($result);
			$course_id = $row['course_id'];
			
			$que = "select * from courses_list where course_id = '$course_id'";
			$res = mysql_query($que);
			$n = mysql_num_rows($res);
			
			$res = mysql_fetch_array($res);
			$course_name = $res['course_name'];
			$semester = $res['semester'];
			$ug_pg = $res['ug_pg'];
			
			$academic_year = $row['academic_year'];
			$number_of_students = $row['number_of_students'];
			$pass_percent = $row['pass_percent'];
			echo "<tr>";
				echo "<td width='1%'  cellpadding='none'><li></td>";
				echo "<td>Taught <b>$course_name</b> to $semester".getDiv($semester)." semester <b>".$ug_pg."</b> students. ".$pass_percent."% students passed the course.</td>";
				echo "<td style='text-align:right'> <b>(".$academic_year.")</b></td>";
			echo "</tr>";
    	}
    echo '</table></ul>';
}


/************************************************
*		Journal									*
************************************************/
$query = "SELECT * FROM journal where id = '$id' order by journal_year, journal_month desc";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
	if($num > 0)
	{
		echo "<h3>Journals Published</h3>";
		echo "<ul>";
		echo "<table width = '100%' cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++)
		{
        $row = mysql_fetch_array($result);
        $journal_id = $row['journal_id'];
		$journal_type=$row['journal_type'];
        $research_area = $row['research_area'];
        $paper_associated_project = $row['paper_associated_project'];
        $project_name = $row['project_name'];
		$paper_title = $row['paper_title'];
		$abstract = $row['abstract'];
		$keywords = $row['keywords'];
		$journal_name = $row['journal_name'];
		$volume = $row['volume'];
		$issue = $row['issue'];
		$journal_month = $row['journal_month'];
		$journal_year = $row['journal_year'];
		
		echo "<tr>";
			echo "<td width='1%' cellpadding='none'><li></td>";
            echo "<td>Published ".$journal_type." level journal titled <b>".$journal_name."</b>";
			echo " in the field of <b>".$research_area."</b>";
			
			$queryfac = "SELECT author_name FROM journal_authors WHERE journal_id=".$journal_id." and id = '$id'";
			$resultfac = mysql_query($queryfac);
			$numfac= mysql_num_rows($resultfac);
			if($numfac>0)
			{
				echo "co-authored by ";
				for($j=0;$j<$numfac;$j++)
				{
					$rowfac = mysql_fetch_array($resultfac);
					if($j == $numfac - 1)
						echo $rowfac['author_name']." ";
					else
						echo $rowfac['author_name'].", ";
				}
			}
			echo " Vol. ".$volume." Issue ".$issue.". ";
			if($project_name)
				echo "The paper is associated with project titled <b>".$project_name."</b>.";
			echo "</td>";
			echo "<td style='text-align:right' width='25%'><b>(".$journal_month." ".$journal_year.")</b></td>";
       		echo "</tr>";
    }

  echo '</table></ul>';
	}


/************************************************
*		     	Conference						*
************************************************/
$query = "SELECT * FROM conference where id = '$id' order by to_date desc";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);
	if($num > 0)
	{
		echo "<h3>Conferences Attended</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++)
		{
			$row = mysql_fetch_array($result);
			$conference_id = $row['conference_id'];
			$conference_type = $row['conference_type'];
			$research_area = $row['research_area'];
			$project_name = $row['project_name'];
			$paper_title = $row['paper_title'];
			$conference_name = $row['conference_name'];
			$organizer = $row['organizer'];
			$from_date = $row['from_date'];
			$temp = explode('-',$from_date);
			$year_f = $temp[0];
			$month_f = $temp[1];
			$date_f = $temp[2];
			$to_date = $row['to_date'];
			$temp = explode('-', $to_date);
			$year_t = $temp[0];
			$month_t = $temp[1];
			$date_t = $temp[2];
			$from_page = $row['from_page'];
			$to_page = $row['to_page'];
			$location = $row['venue'];
			
		
			echo "<tr>";
			echo "<td width='1%' cellpadding='none'><li></td>";
            echo "<td>Presented paper titled <b>".$paper_title."</b> in the field of <b>".$research_area."</b> in <b>". $conference_type."</b> level conference <b>".$conference_name."</b>";
			if($organizer)
				echo " organized by ".$organizer." in ".$location.". ";
			else
				echo " organized in ".$location.". ";
			if($project_name)
				echo "The paper is associated with project titled <b>".$project_name."</b>.";
			echo "</td>";
			echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
       		echo "</tr>";
    }

    echo "</table></ul>";
}




/************************************************
*		Community Service						*
************************************************/
$query = "SELECT * FROM communityuser where id = '$id' order by date_of_event desc";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);
	if($num > 0)
	{
		echo "<h3>Community Services</h3>";
		echo "<ul>";
		echo "<table width = '100%' cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++)
		{
			$row = mysql_fetch_array($result);
			$community_user_id = $row['community_user_id'];
			$name_of_event = $row['name_of_event'];
			$role = $row['role'];
			$location = $row['location'];
			$date_of_event = $row['date_of_event'];
			
			$temp = explode('-', $date_of_event);
			$year = $temp[0];
			$month = $temp[1];
			$date = $temp[2];
			$url = $row['url'];
			$additional_information = $row['additional_information'];
			
			echo "<tr>";
			echo "<td width='1%' cellpadding='none'><li></td>";
			echo "<td><b>$role</b>";
			echo " of <b>".$name_of_event."</b> held at ".$location.". "; 
			if($additional_information)
				echo "$additional_information";
			echo "</td>";
			echo "<td style='text-align:right' width='25%'><b>(".$date.getDiv($date)." ".getMonth($month)." ".$year.")</b></td>";
			echo "</tr>";
			
    	}
		echo '</table></ul>';
    
}



/************************************************
*		faculty exchange program				*
************************************************/
$query = "SELECT * FROM faculty_exchange_program where id='$id' order by end_date desc";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
	if($num>0)
	{
		echo "<h3>Faculty Exchange Programs</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
		$faculty_exchange_program_id=$row['faculty_exchange_program_id'];
		$institution=$row['institution'];
        $subject = $row['subject'];
        $start_date = $row['start_date'];
		$temp = explode('-',$start_date);
		$year_f = $temp[0];
		$month_f = $temp[1];
		$date_f = $temp[2];
		$end_date = $row['end_date'];
		$temp = explode('-', $end_date);
		$year_t = $temp[0];
		$month_t = $temp[1];
		$date_t = $temp[2];
		
		$ug_pg = $row['ug_pg'];
		$collaboration_type = $row['collaboration_type'];
		$details_of_collaboration = $row['details_of_collaboration'];
		$feedback=$row['feedback'];

        echo "<tr>";
			echo "<td width='1%' cellpadding='none'><li></td>";
            echo "<td>Taught <b>". $subject. "</b> in <b>".$institution."</b> as a part of ". $ug_pg. " course in ".$collaboration_type." collaboration. </td>";
           	echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
        echo "</tr>";

    }

    echo '</table></ul>';
}


/********************************************************
*					Consultancy							*			
*********************************************************/

$query = "SELECT * FROM consultancy where id = '$id' order by end_date desc";
    $result = mysql_query($query);
	$num = mysql_num_rows($result);
if( $num >0)
{
	echo "<h3>Professional Memberships</h3>";
	echo "<ul>";
	echo "<table width = '100%'  cellpadding='10'>";
		
    for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $consultancy_id = $row['consultancy_id'];
        $client = $row['client'];
        $work_title = $row['work_title'];		
		$start_date = $row['start_date'];
		$temp = explode('-',$start_date);
		$year_f = $temp[0];
		$month_f = $temp[1];
		$date_f = $temp[2];
		$end_date = $row['end_date'];
		$temp = explode('-', $end_date);
		$year_t = $temp[0];
		$month_t = $temp[1];
		$date_t = $temp[2];
		
		$revenue_generated = $row['revenue_generated'];

        echo "<tr>";
			echo "<td width='1%'  cellpadding='none'><li></td>";
            echo "<td>Consultant in <b>".$client."</b> as <b>".$work_title."</b>";
			
			$query_collaboration = "SELECT collaborator_name FROM consultancy_collaboration WHERE consultancy_id='$consultancy_id'";
 			$result_collaboration = mysql_query($query_collaboration);
			$num_collaboration= mysql_num_rows($result_collaboration);
			if($num_collaboration > 0)
			{
				echo ", working in collaboration with ";
				for($j=0;$j<$num_collaboration;$j++)
				{
					$row_collaboration = mysql_fetch_array($result_collaboration);
					if($j == $num_collaboration-1)
						echo "<b>".$row_collaboration['collaborator_name']."</b>";
					else
						echo "<b>".$row_collaboration['collaborator_name'].",</b> ";
				}
				
			}
			echo ". ";
			$query_faculty = "SELECT faculty_name FROM consultancy_faculty_involved WHERE consultancy_id='$consultancy_id'";
			$result_faculty = mysql_query($query_faculty);
			$num_faculty= mysql_num_rows($result_faculty);
			if($num_faculty > 0)
			{
				if($num_faculty == 1)
					echo "The faculty involved was ";
				else
					echo "The faculties involved were ";
				for($j=0;$j<$num_faculty;$j++)
				{
					$row_faculty = mysql_fetch_array($result_faculty);
					if($j == $num_faculty - 1)
						echo "<b>".$row_faculty['faculty_name']."</b>";
					else
						echo "<b>".$row_faculty['faculty_name'].", </b>";
				}
				echo ". ";
			}
			echo "The revenue generated was Rs.". $revenue_generated.". </td>";
           	 echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
			
        echo "</tr>";

    }
	echo "</table></ul>";

}


/********************************************************
*						Governance						*
*********************************************************/
$query = "SELECT * FROM governance where id = '$id' order by served_to desc";
    $result = mysql_query($query);
	if(!$result)
		{
			echo 'Some problem occured.';
			return;
		}

    $num = mysql_num_rows($result);
	if($num > 0)
	{
		echo "<h3>Governance Positions</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";
		
   		for ($i = 0; $i < $num; $i++)
		{
			$row = mysql_fetch_array($result);
			$governance_id=$row['governance_id'];
			$name_of_committee = $row['name_of_committee'];
			$served_from = $row['served_from'];
			$temp = explode('-',$served_from);
			$year_f = $temp[0];
			$month_f = $temp[1];
			$date_f = $temp[2];
			$served_to = $row['served_to'];
			$temp = explode('-', $served_to);
			$year_t = $temp[0];
			$month_t = $temp[1];
			$date_t = $temp[2];
			
			$role = $row['role'];
			$responsibility = $row['responsibility'];

       		echo "<tr>";
			echo "<td width='1%'  cellpadding='none'><li></td>";
            echo "<td>Served as <b>".$role."</b> in <b>".$name_of_committee.". </b>";
			if($responsibility)
				echo "Responsibility: <b>".$responsibility."</b>. </td>";
           echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
			echo "</tr>";

    }

    echo "</table></ul>";
}


/********************************************************
*					Professional Membership				*			
*********************************************************/
	$query = "SELECT * FROM professional_membership where id = '$id' order by to_date desc";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);
	if($num>0)
	{
		echo "<h3>Professional Memberships</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $membership_number = $row['membership_number'];
        $name = $row['name'];
        $membership_type = $row['membership_type'];
        $from_date = $row['from_date'];
		$temp = explode('-',$from_date);
		$year_f = $temp[0];
		$month_f = $temp[1];
		$date_f = $temp[2];
		$to_date = $row['to_date'];
		$temp = explode('-', $to_date);
		$year_t = $temp[0];
		$month_t = $temp[1];
		$date_t = $temp[2];
	
       echo "<tr>";
			echo "<td width='1%'  cellpadding='none'><li></td>";
            echo "<td>".$membership_type." member of ".$name.". </td>";
             echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
		echo "</tr>";
    }
    echo '</table></ul>';
}

/********************************************************
*					Seminar								*			
*********************************************************/
$query = "SELECT * FROM seminar where id = '$id' order by end_date desc";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);
	if($num>0)
	{
		echo "<h3>Seminars</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $seminar_title = $row['seminar_title'];
		$seminar_organizing_authority = $row['seminar_organizing_authority'];
        $start_date = $row['start_date'];
		$temp = explode('-',$start_date);
		$year_f = $temp[0];
		$month_f = $temp[1];
		$date_f = $temp[2];
		$end_date = $row['end_date'];
		$temp = explode('-', $end_date);
		$year_t = $temp[0];
		$month_t = $temp[1];
		$date_t = $temp[2];
		$role = $row['role'];
		$location = $row['location'];
		$seminar_level = $row['seminar_level'];
		$seminar_area = $row['seminar_area'];
	
       echo "<tr>";
			echo "<td width='1%'  cellpadding='none'><li></td>";
            echo "<td><b>".$role."</b> of ".$seminar_level.". level seminar titled <b>".$seminar_title."</b> in the field of <b>".$seminar_area."</b> organized by ".$seminar_organizing_authority." in ".$location.".</td>";
             echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
		echo "</tr>";
    }
    echo '</table></ul>';
}

/********************************************************
*					workshop							*			
*********************************************************/
$query = "SELECT * FROM workshop where id = '$id' order by end_date desc";
    $result = mysql_query($query);

    $num = mysql_num_rows($result);
	if($num>0)
	{
		echo "<h3>Workshops</h3>";
		echo "<ul>";
		echo "<table width = '100%'  cellpadding='10'>";
    	for ($i = 0; $i < $num; $i++){
        $row = mysql_fetch_array($result);
        $workshop_title = $row['workshop_title'];
		$workshop_organizing_authority = $row['workshop_organizing_authority'];
        $start_date = $row['start_date'];
		$temp = explode('-',$start_date);
		$year_f = $temp[0];
		$month_f = $temp[1];
		$date_f = $temp[2];
		$end_date = $row['end_date'];
		$temp = explode('-', $end_date);
		$year_t = $temp[0];
		$month_t = $temp[1];
		$date_t = $temp[2];
		$role = $row['role'];
		$location = $row['location'];
		$workshop_level = $row['workshop_level'];
		$workshop_area = $row['workshop_area'];
	
       echo "<tr>";
			echo "<td width='1%'  cellpadding='none'><li></td>";
            echo "<td><b>".$role."</b> of ".$workshop_level.". level workshop titled <b>".$workshop_title."</b> in the field of <b>".$workshop_area."</b> organized by ".$workshop_organizing_authority." in ".$location.".</td>";
             echo "<td style='text-align:right' width='25%'><b>(".$date_f.getDiv($date_f)." ".getMonth($month_f)." ".$year_f." - ".$date_t.getDiv($date_t)." ".getMonth($month_t)." ".$year_t.")</b></td>";
		echo "</tr>";
    }
    echo '</table></ul>';
}

echo "<p style = 'float:right'><strong>Created by Faculty Management System on ";
$t = time();
echo date('Y-m-d H:i:s', $t).".</p>";
echo "</div>";
echo "</div>";

echo "<script>
	var restore = $('body').html();
	document.body.innerHTML = document.getElementById('resume_data').innerHTML;
	window.print();
	window.location = 'Main.php';
</script>";
?>




