<?php	
		session_start();
		include("../../../db/db.php");		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		

		$course_id = $_POST['course_id'];
		$from_academic_year = $_POST['from_academic_year'];
		$to_academic_year = $_POST['to_academic_year'];
		$number_of_students = $_POST['number_of_students'];
		$pass_percent = $_POST['pass_percent'];
		
		//echo $aid;
		//echo $aname;
		//echo $agency;
		//echo $from_date;
		//echo $to_date;
		
		
		if($course_id == '')
			$course_id = '%';
		if($from_academic_year == '')
			$from_academic_year = '1950';
		if($to_academic_year == '')
			$to_academic_year = '2150';
		if($number_of_students == '')
			$number_of_students = '%';
		if($pass_percent == '')
			$pass_percent = '%';
	

		$id = $_SESSION['faculty_id'];;
		$result = mysql_query("select * FROM courses_taught where id = '$id' and course_id	 like '$course_id' and academic_year >= '$from_academic_year' and academic_year <= '$to_academic_year' and number_of_students like '$number_of_students' and pass_percent like '$pass_percent' ");	
		
		
		//$row=mysql_fetch_array($result);
		$num = mysql_num_rows($result);
		//echo $num;
		for ($i = 0; $i < $num; $i++){
        $details = mysql_fetch_array($result);
        $community_details = array($details['course_id'], $details['academic_year'], $details['number_of_students'],  $details['pass_percent']);
		foreach($community_details as $a)
    		echo $a.",";
		}

    
		mysql_close($con);
			
	// }
//}
?>