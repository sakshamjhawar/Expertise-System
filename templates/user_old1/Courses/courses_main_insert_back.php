<?php
	
		session_start();
		$id = $_SESSION['faculty_id'];
		
		include("../../../db/db.php");
		

		if(!mysql_select_db('college site'))
		{	echo mysql_error();
			return;
		}		
		$result = mysql_query("select MAX(course_id) from courses_list");	
		if(mysql_num_rows($result) == 0)
			$result = 0;
		else
		{
			$result = mysql_fetch_array($result);
			$result = $result['MAX(course_id)'];
		}
		$course_id=(int)$result+1;
        $course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		$ug_pg = $_POST['ug_pg'];
		$semester = $_POST['semester'];
		$year = $_POST['year'];
		$department = $_POST['department'];
		
		$sql="INSERT INTO courses_list values('$course_id','$course_code','$course_name','$semester', '$ug_pg', '$year', $department')";
		
		if(!mysql_query($sql))
		{
			echo mysql_error();
			return;
		}
		mysql_close($con);

?>