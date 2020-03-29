<?php	
		session_start();
		include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		if(!mysql_select_db('college site'))
			echo mysql_error();
			
		$id = $_SESSION['faculty_id'];
//		$id = 'I4iA41flS';
		$consultancy_id = $_POST['consultancy_id'];
		$client = $_POST['client'];
		$work_title = $_POST['work_title'];
		$revenue_generated = $_POST['revenue_generated'];
		$summary = $_POST['summary'];
		$labs_allocated = $_POST['labs_allocated'];
		$url = $_POST['url'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$collaborations = json_decode(stripslashes($_POST['collaborations']));
		$facultys = json_decode(stripslashes($_POST['facultys']));
		$students = json_decode(stripslashes($_POST['students']));
		
		//echo $consultancy_id.','.$work_title;
		
		if($consultancy_id == '')
			$consultancy_id = '%';
		if($client == '')
			$client = '%';
		if($work_title == '')
			$work_title = '%';
		if($revenue_generated == '')
			$revenue_generated = '%';
		if($summary == '')
			$summary = '%';
		if($labs_allocated == '')
			$labs_allocated = '%';
		if($url == '')
			$url = '%';
		if($start_date == '')
			$start_date = '1970-01-01';
		if($end_date == '')
			$end_date = '2999-01-01';
	
		$quer="select consultancy_id FROM consultancy where id = '$id' and consultancy_id like '$consultancy_id' and  revenue_generated like '$revenue_generated' and work_title like '$work_title' and client like '$client' and  labs_allocated like '$labs_allocated' and url like '$url'  and start_date >= '$start_date' and  start_date <= '$end_date' and  end_date >= '$start_date' and  end_date <= '$end_date'";
		$result = mysql_query($quer);		
	
		
		//$consultancy_id_array = array();
		//print_r( mysql_fetch_array($result));
		$num = mysql_num_rows($result);
		//echo $num;
		for($i = 0; $i < $num; $i++){
			$consultancy_id = mysql_fetch_array($result);
			//$consultancy_id = $consultancy_id['consultancy_id'];
			$consultancy_id_array[$i] = $consultancy_id['consultancy_id'];
		}
		
		
		if($collaborations[0] != 0)
		{
			$p = $num;
			for($i = 1; $i <= $collaborations[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($collaborations[$i] == '')	
				{
						$p = $num;
						continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					$query = "select * from consultancy_collaboration where id = '$id' and consultancy_id = '$consultancy_id_array[$j]' and collaborator_name = '$collaborations[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	$consultancy_id_array[$p] = $consultancy_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		
		//echo $num;
		//print_r($consultancy_id_array);
		if($facultys[0] != 0)
		{
			$p = $num;
			for($i = 1; $i <= $facultys[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($facultys[$i] == '')	
				{	
					$p = $num;
					continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					$query = "select * from consultancy_faculty_involved where id = '$id' and consultancy_id = '$consultancy_id_array[$j]' and faculty_name = '$facultys[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	
						$consultancy_id_array[$p] = $consultancy_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		if($students[0] != 0)
		{
			$p = $num;
			for($i = 1; $i <= $students[0]; $i++)	
			{	
				$num = $p;
				$p = 0; 		
				if($students[$i] == '')	
				{	
					$p = $num;
					continue;
				}
				for($j = 0; $j < $num; $j++)
				{	
					$query = "select * from consultancy_student_involved where id = '$id' and consultancy_id = '$consultancy_id_array[$j]' and student_usn = '$students[$i]'";
					$result = mysql_query($query);
					if(mysql_num_rows($result) != 0)
					{	
						$consultancy_id_array[$p] = $consultancy_id_array[$j];
						$p++;
					}
				}
			}
			$num = $p;
			//}
		}
		
		
		for ($i = 0; $i < $num; $i++){
        	$result = mysql_query("select * from consultancy where id = '$id' and consultancy_id = '$consultancy_id_array[$i]'");
			$row = mysql_fetch_array($result);
        	$consultancy_id = $row['consultancy_id'];
        	$client = $row['client'];
        	$work_title = $row['work_title'];
        	$revenue_generated = $row['revenue_generated'];
			$labs_allocated = $row['labs_allocated'];
			$url = $row['url'];
			$summary=$row['summary'];
			$start_date = $row['start_date'];
			$end_date = $row['end_date'];
		
      
			$collaborations = "";
			$facultys = "";
			$students = "";
			$query = "SELECT * FROM consultancy_collaboration where id = '$id' and consultancy_id = '$consultancy_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$collaborations = $collaborations.$r['collaborator_name'];
				else
					$collaborations = $collaborations.$r['collaborator_name'].', ';
			}
		
			$query = "SELECT * FROM consultancy_faculty_involved where id = '$id' and consultancy_id = '$consultancy_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$facultys = $facultys.$r['faculty_name'];
				else
					$facultys = $facultys.$r['faculty_name'].', ';
			}
			$query = "SELECT * FROM consultancy_student_involved where id = '$id' and consultancy_id = '$consultancy_id'";
    		$res = mysql_query($query);
   			$n = mysql_num_rows($res);
			for($j = 0; $j < $n; $j++)
			{
				$r = mysql_fetch_array($res);
				if($j == $n - 1)
					$students = $facultys.$r['student_usn'];
				else
					$students = $facultys.$r['student_usn'].', ';
			}
			
			echo $consultancy_id.';'.$client.';'.$work_title.';'.$collaborations.';'.$start_date.';'.$end_date.';'.$facultys.';'.$students.';'.$revenue_generated.';'.$summary.';'.$labs_allocated.';'.$url.';';		

		}
		mysql_close($con);
?>