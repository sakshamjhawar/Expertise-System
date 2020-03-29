
<script>
	
	var course_id;
	function course_select(course_value)
	{
		course_id = course_value;
		$.ajax({
		  type: "POST",
		  url: "Courses/courses_fetch.php",
		  data: { course_id:course_id }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(",");
			//$("#community_update_select").val(tmp[0]);
			$("#academic_year").val(tmp[0]);
			$('#number_of_students').val(tmp[1]);
			$("#pass_percent").val(tmp[2]);
			
			
		  });
		
	}

	function formsubmit()	
	{
		var academic_year = document.getElementById('academic_year');
		var pass_percent = document.getElementById('pass_percent');
		var number_of_students = document.getElementById('number_of_students');
		var flag = 1;
		
			
		
		if (pass_percent.value == "" )
		{
			alert('Please enter pass percent');
			pass_percent.focus();
			pass_percent.select();
			flag = 0;
			return false;
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Courses/courses_update_back.php',
				data: {academic_year: academic_year.value,course_id:course_id,  pass_percent:pass_percent.value, number_of_students:number_of_students.value, },
			}).done(function(data){
				if(data == ''){
						alert("Courses Information added");
				}
				else
				{
					alert("data = "+data);
					alert("Some problem occurred");
				}
				
			});
		}
		
		
	}
</script>
<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Courses taught</b></p>

		<span class= "div_book_field_text">Course Id</span>
        <span id="star">*</span>
        <?php
			//session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'course_update_select' onChange='course_select(this.value)'>";
			error_reporting(E_ALL ^ E_DEPRECATED);
		include("../../../db/db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
			$query = "SELECT * FROM courses_list";
	    	$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			echo "<option value =".$row['course_id'].">".$row['course_id']."</option>";
			echo "<script> 
					course_select('".$row['course_id']."');
			</script>";

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['course_id'].">".$row['course_id']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Academic year</span>
        <input class="book_form_input" type=name name="academic_year" id="academic_year" size=4 maxlength=4>
        <br/>
        <br/>
        
     
        <span class= "div_book_field_text">Number of students</span>
        <input class="book_form_input" type=name name="number_of_students" id="number_of_students" size=20 maxlength=20>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Pass percentage</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="pass_percent" id="pass_percent" size=20 maxlength=20 required="required">
        <br/>
        <br/>

        
        <br />
        <br />
		<br />
		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>





