<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../../db/db.php");
		
		$course_id =mysql_real_escape_string( $_POST['course_id']);
		$academic_year =mysql_real_escape_string( $_POST['academic_year']);
		$number_of_students = mysql_real_escape_string($_POST['number_of_students']);
		$pass_percent =mysql_real_escape_string( $_POST['pass_percent']);
		

		if(!mysql_select_db('college site'))
			echo mysql_error();
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		mysql_query("update courses_taught set academic_year = '$academic_year', number_of_students = '$number_of_students', pass_percent = '$pass_percent' where course_id = '$course_id' and id = '$id' ");
			mysql_close($con);
	}
?>