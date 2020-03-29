<script type='text/javascript' >
	var faculty_exchange_program_id;
	var ugpg;
	function ugpg_select(ugpg_value)
	{
		ugpg = ugpg_value;
		
	}
	function fep_select(fep_value)
	{
		faculty_exchange_program_id = fep_value
		$.ajax({
		  type: "POST",
		  url: "FacultyExchangeProgram/fep_fetch.php",
		  data: { faculty_exchange_program_id:faculty_exchange_program_id }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(",");
			//$("#community_update_select").val(tmp[0]);
			$("#subject").val(tmp[1]);
			$('#start_date').val(tmp[2]);
			$("#end_date").val(tmp[3]);
			$("#ug_pg").val(tmp[4]);
			ugpg_select(tmp[4]);
			$("#collaboration_type").val(tmp[5]);
			$("#details_of_collaboration").val(tmp[6]);
			$("#feedback").val(tmp[7]);
			
		  });
	}
	

	function formsubmit()	
	{
		
		var subject = document.getElementById('subject');
		var start_date = document.getElementById('start_date');
		var end_date = document.getElementById('end_date');
		var collaboration_type = document.getElementById('collaboration_type');
		var details_of_collaboration = document.getElementById('details_of_collaboration');
		var feedback = document.getElementById('feedback');
		var flag = 1;
		
		
			
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
				url : 'FacultyExchangeProgram/fep_update_back.php',
				data: {faculty_exchange_program_id:faculty_exchange_program_id, subject:subject.value, start_date:start_date.value, end_date:end_date.value, ug_pg:ugpg, collaboration_type:collaboration_type.value, details_of_collaboration:details_of_collaboration.value, feedback:feedback.value},
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
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of faculty exchange program you are part of</b></p>

		<span class= "div_book_field_text">Name of Institution</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'fep_update_select' onChange='fep_select(this.value)'>";
			include("../../../db/db.php");
	
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			//$id = 'I4iA41flS';
			$id = $_SESSION['faculty_id'];
			$query = "SELECT * FROM faculty_exchange_program where id = '$id'";
	    	$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			echo "<option value =".$row['faculty_exchange_program_id'].">".$row['institution']."</option>";
			echo "<script> 
					fep_select(".$row['faculty_exchange_program_id'].");
			</script>";

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['faculty_exchange_program_id'].">".$row['institution']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
   
   <span class= "div_book_field_text">subject</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="subject" id="subject" size=20 maxlength=20>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Start date of Exchange</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="start_date" id="start_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End date of Exchange</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="end_date" id="end_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">UG/PG</span>
        <select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='ugpg_select(this.value)'>
        	<option value="UG">UG</option>
            <option value="PG">PG</option>
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