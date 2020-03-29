<script>
	
	var ugpg;
	function ugpg_select(ugpg_value)
	{
		ugpg = ugpg_value;
		
	}

	function formsubmit()	
	{
		var institution = document.getElementById('institution');
		var subject = document.getElementById('subject');
		var start_date = document.getElementById('start_date');
		var end_date = document.getElementById('end_date');
		var collaboration_type = document.getElementById('collaboration_type');
		var details_of_collaboration = document.getElementById('details_of_collaboration');
		var feedback = document.getElementById('feedback');
		var flag = 1;
		
		if(institution.value == "" )
		{
			alert('Please enter a institution');
			flag = 0;
			institution.focus();
			institution.select();
			return false;
		}
			
		if (subject.value == "" )
		{
			alert('Please enter a subject');
			subject.focus();
			subject.select();
			flag = 0;
			return false;
		}
		
		if (collaboration_type.value == "" )
		{
			alert('Please enter collaboration Type');
			collaboration_type.focus();
			collaboration_type.select();
			flag = 0;
			return false;
		}
		if (feedback.value == "" )
		{
			alert('Please enter feedback');
			feedback.focus();
			feedback.select();
			flag = 0;
			return false;
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'FacultyExchangeProgram/fep_insert_back.php',
				data: {institution: institution.value, subject:subject.value, start_date:start_date.value, end_date:end_date.value, ug_pg:ugpg, collaboration_type:collaboration_type.value, details_of_collaboration:details_of_collaboration.value, feedback:feedback.value},
			}).done(function(data){
				if(data == ''){
						alert("Faculty Exchange Program Information added");
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
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Faculty Exchange</b></p>

		<span class= "div_book_field_text">Name of Institution</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="institution" id="institution" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Subject</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="subject" id="subject" size=20 maxlength=20>
        <br/>
        <br/>
        
        
     
        
        <span class= "div_book_field_text">Start date of Exchange</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="start_date" id="start_date">
        <script>
		document.getElementById('start_date').value = new Date().toISOString().substring(0, 10);
	</script>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End date of Exchange</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="end_date" id="end_date">
        <script>
		document.getElementById('end_date').value = new Date().toISOString().substring(0, 10);
	</script>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">UG/PG</span>
        <select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='ugpg_select(this.value)'>
        	<option value="UG">UG</option>
            <option value="PG">PG</option>
            <script type="text/javascript">
				ugpg_select("UG");
            </script>
        </select>
        <br/>
        <br />
        
        <span class= "div_book_field_text">Collaboration Type</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="collaboration_type" id="collaboration_type" size=20 maxlength=20>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Details Of Collaboration</span>
        <input class="book_form_input" type=name name="details_of_collaboration" id="details_of_collaboration" size=20 maxlength=20>
        <br/>
        <br/>

        <span class= "div_book_field_text">Feedback</span>
        <span id="star">*</span>
        <textarea class="community_form_textarea" rows="3" cols="31" id="feedback"></textarea>
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





