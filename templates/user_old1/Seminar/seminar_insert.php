<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Seminars</b></p>

		<span class= "div_book_field_text">Seminar Title</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="seminar_title" id="seminar_title" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Organizing Authority</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="seminar_organizing_authority" id="seminar_organizing_authority" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Start Date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="start_date" id="start_date">
        <script>
		document.getElementById('start_date').value = new Date().toISOString().substring(0, 10);
	</script>
        <br/>
        <br/>
		
		<span class= "div_book_field_text">End Date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="end_date" id="end_date">
        <script>
		document.getElementById('end_date').value = new Date().toISOString().substring(0, 10);
	</script>
        <br/>
        <br/>
		 
		<span class= "div_book_field_text">Role</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="role" id="role" size=40 maxlength=40>
        <br/>
        <br/>
		
		<span class= "div_book_field_text">Location</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="location" id="location" size=40 maxlength=40>
        <br/>
        <br/>
		
       <span class= "div_book_field_text">Seminar Level</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="seminar_level" id="seminar_level" size=40 maxlength=40>
        <br/>
        <br/>
		<span class= "div_book_field_text">Seminar Area</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="seminar_area" id="seminar_area" size=40 maxlength=40>
        <br/>
        <br/>
		
        
        <span class= "div_book_field_text">URL</span>
        <input class="book_form_input" type="text" name="url" id="url">
        <br/>
        <br/>

        <span class= "div_book_field_text">Target Audience</span>
       <input class="book_form_input" type=name name="target_audience" id="target_audience" size=40 maxlength=40>
        <br/>
        <br/>
        <br />
        <br />
		<br />
		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:80%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>
<script>

	function formsubmit()	
	{
		var seminar_title = document.getElementById('seminar_title');
		var seminar_organizing_authority = document.getElementById('seminar_organizing_authority');
		var start_date = document.getElementById('start_date');
		var end_date = document.getElementById('end_date');
		var role = document.getElementById('role');
		var location = document.getElementById('location');
		var seminar_level = document.getElementById('seminar_level');
		var seminar_area = document.getElementById('seminar_area');
		var url = document.getElementById('url');
		var target_audience = document.getElementById('target_audience');
		var flag = 1;
		
		
		
		if(seminar_title.value == "" )
		{
			alert('Please enter title');
			flag = 0;
			seminar_title.focus();
			seminar_title.select();
			return false;
		}
		
		if(seminar_organizing_authority.value == "" )
		{
			alert('Please enter name of organizing authority');
			flag = 0;
			seminar_organizing_authority.focus();
			seminar_organizing_authority.select();
			return false;
		}
		
			
		if (role.value == "" )
		{
			alert('Please enter role');
			role.focus();
			role.select();
			flag = 0;
			return false;
		}
		
		if (location.value == "" )
		{
			alert('Please enter location');
			location.focus();
			location.select();
			flag = 0;
			return false;
		}
		
		if(seminar_level.value == "" )
		{
			alert('Please enter level');
			flag = 0;
			seminar_level.focus();
			seminar_level.select();
			return false;
		}
		if(seminar_area.value == "" )
		{
			alert('Please enter area');
			flag = 0;
			seminar_area.focus();
			seminar_area.select();
			return false;
		}
		
		var url1 = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
		if (url.value != '' )
		{
			if(!url.value.match(url1))
					{
							alert('Please enter valid URL');
							url.focus();
							url.select();	
							return false;
					}
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Seminar/seminar_insert_back.php',
				data: {seminar_title:seminar_title.value,seminar_organizing_authority:seminar_organizing_authority.value,start_date:start_date.value,end_date:end_date.value, role:role.value, location:location.value,seminar_level:seminar_level.value,seminar_area:seminar_area.value ,url:url.value, target_audience:target_audience.value},
			}).done(function(data){
				if(data == ''){
						alert("Information added");
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




