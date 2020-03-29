<script>
	
	

	function formsubmit()	
	{
		var name_of_committee = document.getElementById('name_of_committee');
		var status_of_committee = document.getElementById('status_of_committee');
		var served_from = document.getElementById('served_from');
		var served_to = document.getElementById('served_to');
		var role = document.getElementById('role');
		var responsibility = document.getElementById('responsibility');
		var flag = 1;
		
		if(name_of_committee.value == "" )
		{
			alert('Please enter a name of committee');
			flag = 0;
			name_of_committee.focus();
			name_of_committee.select();
			return false;
		}
			
		if (status_of_committee.value == "" )
		{
			alert('Please enter the status of committee');
			status_of_committee.focus();
			status_of_committee.select();
			flag = 0;
			return false;
		}
		
		if (role.value == "" )
		{
			alert('Please enter collaboration Type');
			role.focus();
			role.select();
			flag = 0;
			return false;
		}
	
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Governance/governance_insert_back.php',
				data: {name_of_committee: name_of_committee.value, status_of_committee:status_of_committee.value, served_from:served_from.value, served_to:served_to.value, role:role.value, responsibility:responsibility.value},
			}).done(function(data){
				if(data == ''){
						alert("Governance Information added");
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
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Governance</b></p>

		<span class= "div_book_field_text">Name of Commitee</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="name_of_committee" id="name_of_committee" size=80 maxlength=80 required="required">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Status of committee</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="status_of_committee" id="status_of_committee" size=80 maxlength=80 required="required">
        <br/>
        <br/>
        
        
     
        
        <span class= "div_book_field_text">Served From</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="served_from" id="served_from" required="required">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Served till</span>
        <input class="book_form_input" type="date" name="served_to" id="served_to">
        <br/>
        <br/>
        
        
        
        <span class= "div_book_field_text">Role</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="role" id="role" size=80 maxlength=80 required="required">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Responsibility</span>
        <input class="book_form_input" type=name name="responsibility" id="responsibility" size=80 maxlength=80>
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





