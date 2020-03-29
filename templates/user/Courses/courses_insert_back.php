<?php
	
		session_start();
		include("../../../db/db.php");
				
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		
		

		
		$course_id=mysql_real_escape_string($_POST['course_id']);
		$academic_year = mysql_real_escape_string($_POST['academic_year']);
		$number_of_students =mysql_real_escape_string( $_POST['number_of_students']);
		$pass_percent =mysql_real_escape_string( $_POST['pass_percent']);
		
		$id = $_SESSION['faculty_id'];
		
		$sql="INSERT INTO courses_taught (`course_id`, `academic_year`, `number_of_students`, `pass_percent`, `id`) VALUES('$course_id','$academic_year','$number_of_students','$pass_percent','$id')";
		if(!mysql_query($sql,$con))
		{
			die('error:'.mysql_error());
		}
		mysql_close($con);

?>