<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter details of professional membership</b></p>

		<span class= "div_book_field_text">Name</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="name" id="name" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Type</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="membership_type" id="membership_type" size=40 maxlength=40>
        <br/>
        <br/>
        
        
        <span class= "div_book_field_text">Starting date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="from_date" id="from_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End date</span>
		<span id="star">*</span>
        <input class="book_form_input" type="date" name="to_date" id="to_date">
        <br/>
        <br/>
        
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
		var name= document.getElementById('name');
		var membership_type = document.getElementById('membership_type');
		var from_date= document.getElementById('from_date');
		var to_date = document.getElementById('to_date');
		var flag = 1;
		
		if(name.value == "" )
		{
			alert('Please enter name of the professional body');
			flag = 0;
			name_of_event.focus();
			name_of_event.select();
			return false;
		}
			
		if (membership_type.value == "" )
		{
			alert('Please enter type of membership');
			role.focus();
			role.select();
			flag = 0;
			return false;
		}
		
		if (from_date.value == "" )
		{
			alert('Please enter the starting date');
			location.focus();
			location.select();
			flag = 0;
			return false;
		}
		if (to_date.value == "" )
		{
			alert('Please enter the end date');
			location.focus();
			location.select();
			flag = 0;
			return false;
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'individual/Professional_membership/prof_insert_back.php',
				data: {name: name.value, membership_type:membership_type.value,from_date:from_date.value, to_date:to_date.value},
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




