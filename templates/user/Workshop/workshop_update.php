<script type='text/javascript' >
	var workshop_id;
	function workshop_select(workshop_value)
	{
		workshop_id = workshop_value
		$.ajax({
		  type: "POST",
		  url: "Workshop/workshop_fetch.php",
		  data: { workshop_value:workshop_value }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(",");
			//$("#community_update_select").val(tmp[0]);
			//$("#workshop_id").val(tmp[0]);
			$("#workshop_title").val(tmp[0]);
			$("#workshop_organizing_authority").val(tmp[1]);
			$("#start_date").val(tmp[2]);
			$("#end_date").val(tmp[3]);
			$("#role").val(tmp[4]);
			$("#location").val(tmp[5]);
			$('#workshop_level').val(tmp[6]);
			$("#workshop_area").val(tmp[7]);
			$("#url").val(tmp[8]);
			$("#target_audience").val(tmp[9]);
		  });
	}
	

	function formsubmit()	
	{
		
		
		var workshop_organizing_authority = document.getElementById('workshop_organizing_authority');
		var start_date = document.getElementById('start_date');
		var end_date = document.getElementById('end_date');
		var role = document.getElementById('role');
		var location= document.getElementById('location');
		var workshop_level = document.getElementById('workshop_level');
		var workshop_area = document.getElementById('workshop_area');
		var url = document.getElementById('url');
		var target_audience= document.getElementById('target_audience');
		var flag = 1;
		

		
		if (workshop_organizing_authority.value == "" )
		{
			alert('Please enter authority');
			workshop_organizing_authority.focus();
			workshop_organizing_authority.select();
			flag = 0;
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
		if (workshop_level.value == "" )
		{
			alert('Please enter level');
			workshop_level.focus();
			workshop_level.select();
			flag = 0;
			return false;
		}
		if (workshop_area.value == "" )
		{
			alert('Please enter area');
			workshop_area.focus();
			workshop_area.select();
			flag = 0;
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
				url : 'Workshop/workshop_update_back.php',
				data: {workshop_id:workshop_id, workshop_organizing_authority:workshop_organizing_authority.value, start_date:start_date.value,end_date:end_date.value,role:role.value, location:location.value, workshop_level:workshop_level.value,workshop_area:workshop_area.value, url:url.value, target_audience:target_audience.value},
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
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of workshops you are part of</b></p>

		<span class= "div_book_field_text">Workshop Title</span>
        <span id="star">*</span>
        
        <?php
			//session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='workshop_select(this.value)'>";
			session_start();
		error_reporting(E_ALL ^ E_DEPRECATED);
		
		$id = $_SESSION['faculty_id'];
		include("../../../db/db.php");
	
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			
			$query = "SELECT * FROM workshop where id = '$id'";
	    	$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['workshop_id'].">".$row['workshop_title']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
   
   <span class= "div_book_field_text">Organizing authority</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="workshop_organizing_authority" id="workshop_organizing_authority" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Start Date</span>
       <span id="star">*</span>
        <input class="book_form_input" type=date name="start_date" id="start_date" >
        <br/>
        <br/>
		
		 <span class= "div_book_field_text">End Date</span>
         <span id="star">*</span>
        <input class="book_form_input" type=date name="end_date" id="end_date" >
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
        
        <span class= "div_book_field_text">Workshop Level</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="workshop_level" id="workshop_level" size=40 maxlength=40>
        <br/>
        <br/>
        
		<span class= "div_book_field_text">Workshop Area</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="workshop_area" id="workshop_area" size=40 maxlength=40>
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