<?php
include("../../../db/db.php");
session_start();
$session_id=$_SESSION['faculty_id']; //$session id
?>
<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter your Educational details</b></p>

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
        
        <span class= "div_book_field_text">Join Year</span>
		 <span id="star">*</span>
        <input class="book_form_input" type="month" name="join_year" id="join_year" maxlength=10>
        
        <br/>
        <br/>
		 <span class= "div_book_field_text">Pass Year</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="month" name="pass_year" id="pass_year" maxlength=4>
        
        <br/>
        <br/>
		 <span class= "div_book_field_text">Percentage</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="number" name="percentage" id="percentage" maxlength=4>
        <br/>
        <br/>
         <span class= "div_book_field_text">Class</span>
		  <span id="star">*</span>
        <input class="book_form_input" type="text" name="class1" id="class1" maxlength=4>
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
<script>

	function formsubmit()	
	{
		var qualification = document.getElementById("qualification");
		var institution = document.getElementById("institution");
		var location = document.getElementById("location");
		var university = document.getElementById("university");
		var join_month = document.getElementById("join_month");
		var join_year = document.getElementById("join_year");
			var pass_year = document.getElementById("pass_year");
				var percentage= document.getElementById("percentage");
					var class1= document.getElementById("class1");
		var flag = 1;
		
		if(qualification.value == "" )
		{
			alert('Please enter qualification');
			flag = 0;
			qualification.focus();
			qualification.select();
			return false;
		}
			
		if (institution.value == "" )
		{
			alert('Please enter name of the institution you passed from');
			institution.focus();
			institution.select();
			flag = 0;
			return false;
		}
		
		if (university.value == "" )
		{
			alert('Please enter name of the university');
			university.focus();
			university.select();
			flag = 0;
			return false;
		}
		
		
		
		if (join_year.value == "" )
		{
			alert('Please enter year of joining');
			join_year.focus();
			join_year.select();
			flag = 0;
			return false;
		}
		if (pass_year.value == "" )
		{
			alert('Please enter year of passing');
			pass_year.focus();
			pass_year.select();
			flag = 0;
			return false;
		}
		if (percentage.value == "" )
		{
			alert('Please enter percentage');
			percentage.focus();
			percentage.select();
			flag = 0;
			return false;
		}
		if (class1.value == "" )
		{
			alert('Please enter your division you passed with');
			class1.focus();
			class1.select();
			flag = 0;
			return false;
		}
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Profile/profile_insert_back.php',
				data: {qualification: qualification.value, institution:institution.value, location:location.value, university:university.value, join_year:join_year.value,pass_year:pass_year.value,percentage:percentage.value,class1:class1.value},
			}).done(function(data){
				if(data == ''){
						alert("Your academic details have been added");
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




