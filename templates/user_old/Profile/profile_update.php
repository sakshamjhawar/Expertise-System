<script type='text/javascript' >
	var id;
	function community_select(profile_value)
	{
		id = profile_value
		$.ajax({
		  type: "POST",
		  url: "individual/Profile/profile_fetch.php",
		  data: { profile_value:profile_value }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(",");
			//$("#community_update_select").val(tmp[0]);
			$("#qualification").val(tmp[0]);
			$("#institution").val(tmp[1]);
			$('#location').val(tmp[2]);
			$("#university").val(tmp[3]);
			$("#join_month").val(tmp[4]);
			$("#join_year").val(tmp[5]);
			$("#pass_year").val(tmp[6]);
			$("#percentage").val(tmp[7]);
			$("#class1").val(tmp[8]);
		  });
	}
	

	function formsubmit()	
	{
		
		var qualification = document.getElementById('qualification');
		var institution = document.getElementById('institution');
		var location = document.getElementById('location');
		var university = document.getElementById('university');
		var join_month = document.getElementById('join_month');
		var join_year = document.getElementById('join_year');
		var pass_year= document.getElementById('pass_year');
		var percentage = document.getElementById('percentage');
		var class1=document.getElementById('class1');
		var flag = 1;
		
		
		
			
		if (qualification.value == "" )
		{
			alert('Please enter qualification');
			qualification.focus();
			qualification.select();
			flag = 0;
			return false;
		}
		if (institution.value == "" )
		{
			alert('Please enter institution name');
			institution.focus();
			institution.select();
			flag = 0;
			return false;
		}
		
		if (university.value == "" )
		{
			alert('Please enter university name');
			university.focus();
			university.select();
			flag = 0;
			return false;
		}
		if (join_month.value == "" )
		{
			alert('Please enter join_month');
			join_month.focus();
			join_month.select();
			flag = 0;
			return false;
		}
		if (join_year.value == "" )
		{
			alert('Please enter join_year');
			join_year.focus();
			join_year.select();
			flag = 0;
			return false;
		}
		if (pass_year.value == "" )
		{
			alert('Please enter pass_year');
			pass_year.focus();
			pass_year.select();
			flag = 0;
			return false;
		}
		if (percentage.value == "" )
		{
			alert('Please enter aggregate percentage');
			percentage.focus();
			percentage.select();
			flag = 0;
			return false;
		}
		if (class1.value == "" )
		{
			alert('Please enter your passing division');
			class1.focus();
			class1.select();
			flag = 0;
			return false;
		}
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'individual/Profile/profile_update_back.php',
				data: {qualification:qualification.value,institution:institution.value,university:university.value,location:location.value, join_month:join_month.value,join_year:join_year.value,pass_year:pass_year.value, percentage:percentage.value, class1:class1.value},
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
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter your Educational Qualification</b></p>

		<span class= "div_book_field_text">Qualification</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='community_select(this.value)'>";
			include("../../db.php");
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			//$id = 'I4iA41flS';
			$id = $_SESSION['faculty_id'];
			$query = "SELECT * FROM profile where id = '$id'";
	    	$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['id'].">".$row['qualification']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
   
   <span class= "div_book_field_text">Qualification</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="qualification" id="qualification" size=40 maxlength=40>
        <br/>
        <br/>
        <span class= "div_book_field_text">Institution</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="institution" id="institution" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Location</span>
       
        <input class="book_form_input" type=name name="location" id="location" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">University</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="name" name="university" id="university" maxlength=60>
        <br/>
        <br/>
        
        
        <span class= "div_book_field_text">Join_Month</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="name" name="join_month" id="join_month"  placeholder="mm" maxlength=4>
        <br/>
        <br/>

        <
        <span class= "div_book_field_text">Join_Year</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="name" name="join_year" id="join_year" placeholder="yyyy" maxlength=4>
        <br/>
        <br/>
		
        <span class= "div_book_field_text">Passing_year</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="name" name="pass_year" id="pass_year" maxlength=4 placeholder="yyyy">
        <br/>
        <br/>
		
        <span class= "div_book_field_text">Percentage</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="name" name="percentage" id="percentage" maxlength=2 placeholder="xx">
        <br/>
        <br/>
		
        <span class= "div_book_field_text">Class</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="name" name="class1" id="class1" maxlength=40>
        <br/>
        <br/>
       
        <br />
		<br />
		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:80%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>