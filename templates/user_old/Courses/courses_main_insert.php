
<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Course</b></p>

		<span class= "div_book_field_text">Course Code</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="course_code" id="course_code" size=20maxlength=20 required>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Course Name</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="course_name" id="course_name" size=80 maxlength=80 required>
        <br/>
        <br/>
       
        
        <span class= "div_book_field_text">UG/PG</span>
        <span id="star">*</span>
        <select name="ug_pg" id="ug_pg" class="conference_form_select" onchange="hide_unhide()">
        <option value="UG">UG</option>
        <option value="PG">PG</option>
        </select>
		<br/><br/>
        
     
        
        <span class= "div_book_field_text">Semester</span>
        <span id="star">*</span>
        <select name="semester" id="semester" class="conference_form_select">
        <option value="-1">&nbsp;</option>
        </select>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Department</span>
        <span id="star">*</span>
        <select name="department" id="department" class="conference_form_select">
        <option value="Aeronautical Engineering">Aeronautical Engineering</option>
        <option value="Biotechnology">Biotechnology</option>
        <option value="Chemical Engineering">Chemical Engineering</option>
         <option value="Civil Engineering">Civil Engineering</option>
         <option value="Computer Science and Engineering">Computer Science and Engineering</option>
        <option value="Electrical Engineering">Electrical Engineering</option>
        <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
         <option value="Information Science and Engineering">Information Science and Engineering</option>
         <option value="Instrumentation Engineering">Instrumentation Engineering</option>
         <option value="Mechanical Engineering">Mechanical Engineering</option>
        </select>
		<br/><br/>
        
        <span class= "div_book_field_text">Syllabus Year</span>
         <span id="star">*</span>
        <select name="year" id="year" class="conference_form_select">
        <option value="-1">&nbsp;</option>
        <script>	
				var d = new Date();
				var n = d.getFullYear();
				var selectBox = document.getElementById("year");
				// loop through years
				for (var i = n; i >= 1970; i--) 
				{
					// create option element
					var option = document.createElement('option');
					// add value and text name
					option.value = i;
					option.innerHTML = i;
					// add the option element to the selectbox
					selectBox.appendChild(option);
				}
		</script>
  	</select>
        
		<p style="color:red; margin-left:2em;">Fields with * are Mandatory</p>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br />
        <br />
        <br />
        <br />

</form>
<script>
function hide_unhide()
	{
		//alert("hi")
			if(document.getElementById("ug_pg").value == "UG")
			{
				var selectBox = document.getElementById("semester");
				// loop through years
				for (var i = 1; i <= 8; i++) 
				{
					// create option element
					var option = document.createElement('option');
					// add value and text name
					option.value = i;
					option.innerHTML = i;
					// add the option element to the selectbox
					selectBox.appendChild(option);
				}
			}
			else
			{
				var selectBox = document.getElementById("semester");
				// loop through years
				for (var i = 1; i <= 4; i++) 
				{
					// create option element
					var option = document.createElement('option');
					// add value and text name
					option.value = i;
					option.innerHTML = i;
					// add the option element to the selectbox
					selectBox.appendChild(option);
				}
			}
				
		}
		
	function formsubmit()	
	{
		var course_code = document.getElementById('course_code');
		var course_name = document.getElementById('course_name');
		var ug_pg = document.getElementById('ug_pg');
		var semester = document.getElementById('semester');
		var year = document.getElementById('year');
		var department = document.getElementById('department');
		var flag = 1;
		
		if(course_code.value == "" )
		{
			alert('Please enter Course Code');
			flag = 0;
			course_code.focus();
			course_code.select();
			return false;
		}
			
		if (course_name.value == "" )
		{
			alert('Please enter the Name of Course');
			course_name.focus();
			course_name.select();
			flag = 0;
			return false;
		}
		
		if (ug_pg.value == "" )
		{
			alert('Please select UG/PG');
			ug_pg.focus();
			ug_pg.select();
			flag = 0;
			return false;
		}
		
		if (semester.value == "" )
		{
			alert('Please select Semester');
			semester.focus();
			semester.select();
			flag = 0;
			return false;
		}
		
		if (department.value == "" )
		{
			alert('Please select Department');
			department.focus();
			department.select();
			flag = 0;
			return false;
		}
		
		if (year.value == "" )
		{
			alert('Please select Syllabus Year');
			year.focus();
			year.select();
			flag = 0;
			return false;
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Courses/courses_main_insert_back.php',
				data: {course_code: course_code.value, course_name:course_name.value, ug_pg:ug_pg.value, semester:semester.value,department:department.value, year:year.value},
			}).done(function(data){
				if(data == ''){
						alert("Course Information added");
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




