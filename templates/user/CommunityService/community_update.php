<script type='text/javascript' >
	var community_id;
	function community_select(community_value)
	{
		community_id = community_value
		$.ajax({
		  type: "POST",
		  url: "CommunityService/community_fetch.php",
		  data: { community_value:community_value }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(",");
			//$("#community_update_select").val(tmp[0]);
			$("#role").val(tmp[0]);
			$("#location").val(tmp[1]);
			$('#date_of_event').val(tmp[2]);
			$("#url").val(tmp[3]);
			$("#additional_information").val(tmp[4]);
		  });
	}
	

	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}

	function formsubmit()	
	{
		
		var role = document.getElementById('role');
		var location = document.getElementById('location');
		var date_of_event = document.getElementById('date_of_event');
		var url = document.getElementById('url');
		var additional_information = document.getElementById('additional_information');
		var flag = 1;
		
		
		
			
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
				url : 'CommunityService/community_update_back.php',
				data: {community_id: community_id, role:role.value, location:location.value, date_of_event:date_of_event.value, url:url.value, additional_information:additional_information.value},
			}).done(function(data){
				if(data == ''){
					 
						alert("Information Updated");
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
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of Community Services you are part of</b></p>

		<span class= "div_book_field_text">Name of Event</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='community_select(this.value)'>";
			//session_start();
		
		//$id = 'I4iA41flS';
		include("../../../db/db.php");
	
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			//$id = 'I4iA41flS';
			$id = $_SESSION['faculty_id'];
			$query = "SELECT * FROM communityuser where id = '$id'";
	    	$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['community_user_id'].">".$row['name_of_event']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
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
        <br/>
        <br/>
        
        <span class= "div_book_field_text">URL</span>
        <input class="book_form_input" type="text" name="url" id="url">
        <br/>
        <br/>

        <span class= "div_book_field_text">Additional Information</span>
        <textarea class="community_form_textarea" rows="3" cols="31" id="additional_information"></textarea>
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