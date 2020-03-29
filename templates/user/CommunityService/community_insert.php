<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Community Services</b></p>

		<span class= "div_book_field_text">Name of Event</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="name_of_event" id="name_of_event" size=40 maxlength=40>
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
        
        <span class= "div_book_field_text">Date of Event</span>
        <input class="book_form_input" type="date" name="date_of_event" id="date_of_event">
        <script>
		document.getElementById('date_of_event').value = new Date().toISOString().substring(0, 10);
		</script>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">URL</span>
        <input class="book_form_input" type="text" name="url" id="url">
        <br/>
        <br/>

        <span class= "div_book_field_text">Additional Information</span>
        <textarea class="community_form_textarea" rows="3" cols="31" id="additional_information"></textarea>
        <br>
        <br>
        <br>
        <br>
		<br>
		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class="form_button_register_page_submit" value="Submit" style="margin-left:75%; margin-top: 8%; outline:none" onClick="formsubmit()">


		<br >
        <br >
        <br >
        <br >

</form>

<script>

	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}

	function formsubmit()	
	{
		var name_of_event = document.getElementById('name_of_event');
		var role = document.getElementById('role');
		var location = document.getElementById('location');
		var date_of_event = document.getElementById('date_of_event');
		var url = document.getElementById('url');
		var additional_information = document.getElementById('additional_information');
		var flag = 1;
		
		if(name_of_event.value == "" )
		{
			alert('Please enter name of event');
			flag = 0;
			name_of_event.focus();
			name_of_event.select();
			return false;
		}
			
		if (role.value == "" )
		{
			alert('Please enter your role in the event');
			role.focus();
			role.select();
			flag = 0;
			return false;
		}
		
		if (location.value == "" )
		{
			alert('Please enter location of event');
			location.focus();
			location.select();
			flag = 0;
			return false;
		}
		
		if (url.value != '' )
		{
        	//alert('hi');
            //alert(url.value);
			if(!isUrl(url.value))
					{
							alert('Please enter valid URL');
							url.focus();
							url.select();	
                            flag = 0;
							return false;
					}
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'CommunityService/community_insert_back.php',
				data: {name_of_event: name_of_event.value, role:role.value, location:location.value, date_of_event:date_of_event.value, url:url.value, additional_information:additional_information.value},
			}).done(function(data){
				if(data == ''){
						alert("Community Service Information added");
				}
				else
				{
					//alert("data = "+data);
					alert("Some problem occurred");
				}
				
			});
		}
		
		
	}
</script>




