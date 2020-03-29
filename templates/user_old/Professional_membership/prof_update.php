<script type='text/javascript' >
	var membership_number;
	function community_select(membership_value)
	{
		membership_number=membership_value
		$.ajax({
		  type: "POST",
		  url: "individual/Professional_membership/prof_fetch.php",
		  data: { membership_value:membership_value }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(",");
			//$("#community_update_select").val(tmp[0]);
			$("#type").val(tmp[0]);
			$("#from_date").val(tmp[1]);
			$('#to_date').val(tmp[2]);
		  });
	}
	

	function formsubmit()	
	{
		
		var role = document.getElementById('type');
		var location = document.getElementById('from_date');
		var date_of_event = document.getElementById('to_date');
		var flag = 1;
		
		
		
			
		if (role.value == "" )
		{
			alert('Please enter type');
			role.focus();
			role.select();
			flag = 0;
			return false;
		}
		
		if (location.value == "" )
		{
			alert('Please enter starting date ');
			location.focus();
			location.select();
			flag = 0;
			return false;
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'individual/Professional_membership/prof_update_back.php',
				data: {membership_number: membership_number.value, type:membership_type.value, from_date:from_date.value, to_date:to_date.value},
			}).done(function(data){
				if(data == ''){
						alert("Information Updated");
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
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of Professional memberships you have</b></p>

		<span class= "div_book_field_text">Name</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='community_select(this.value)'>";
			include("../../db.php");
echo "hi";
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			//$id = 'I4iA41flS';
			$id = $_SESSION['faculty_id'];
			$query = "SELECT * FROM professional_membership where id = '$id'";
	    		$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['membership_number'].">".$row['name']."</option>";
			}
			echo "</select>";
			mysqli_close($con);
		?>
        
        <br/>
        <br/>
   
   <span class= "div_book_field_text">Type</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="membership_type" id="membership_type" size=40 maxlength=40>
        <br/>
        <br/>
        
        
        <span class= "div_book_field_text">Start_date</span>
        <span id="star">*</span>
        <input class="book_form_input" type=date name="from_date" id="from_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End_date</span>
        <input class="book_form_input" type="date" name="to_date" id="to_date">
        <br/>
        <br/>
        

		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:80%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>
