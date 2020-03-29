<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Projects Done</b></p>

        <span class= "div_book_field_text">Project Title</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="project_title" id="project_title" size=100 maxlength=100>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Principal Investigator</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="principal_investigator" id="principal_investigator" size=100 maxlength=100>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Citation Index</span>
        <input class="book_form_input" type=name name="citation_index" id="citation_index" size=100 maxlength=100>
        <br/>
        <br/>
        
        <span class= "div_award_field_text">Status of the Project</span>
        <span id="star">*</span>
		<select class="book_form_select" name="project_status" id="project_status">
		<option value="-1" >Status</option>
		<option value="In-progress" >In-progress</option>
		<option value="completed" >Completed</option>
		<option value="Others" >Others</option>
		</select>
		<br><br>
        
        <span class= "div_book_field_text">Start Date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="start_date" id="start_date" >
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Close Date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="close_date" id="close_date">
        <br/>
        <br/>
        
        
        <div id="project_associated_departments">
        </div>
        
        <input type="button" class="form_button_register_page_submit" value="Add Departments" style="margin-left:75%; width:auto; outline:none" onClick="add_departments()">
        <br />
        <br />
        
        <div id="project_co_investigators">
        </div>
		
        <input type="button" class="form_button_register_page_submit" value="Add Co-Investigators" style="width:auto; margin-left:75%; outline:none" onClick="add_co_investigators()">
        <br />
        <br />
        
        <span class= "div_book_field_text">Project Cost</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="project_cost" id="project_cost" size=50>
        <br/>
        <br/>
        
        <span class= "div_conference_field_text">Abstract</span>
		<span id="star">*</span>
		<input class="book_form_input" type=name name="abstract" id="abstract" size=100 maxlength=100>
		<br><br>

		<span class= "div_conference_field_text">Funding Agency</span>
		<span id="star">*</span>
		<input class="book_form_input" type=name name="funding_agency" id="funding_agency" size=25 maxlength=25>
		<br><br>
        
        <span class= "div_conference_field_text">URL</span>
		<span id="star">*</span>
		<input class="book_form_input" type=name name="url" id="url" size=25 maxlength=25>
		<br><br>

		


		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>

<script type="text/javascript">
	no_of_departments = 0;
	no_of_co_investigators = 0;
	function add_departments()
	{
		no_of_departments++;
		$("#project_associated_departments").append('<span class= "div_book_field_text">Department ' + no_of_departments+ '</span>\
        <span id="star">*</span>\
        <input class="book_form_input" type=name name="author" id="department'+no_of_departments+'" size=25 maxlength=25>\
		<br \>\
		<br \>');
		
		return false;
	}
	
	function add_co_investigators()
	{
		no_of_co_investigators++;
		$("#project_co_investigators").append('<span class= "div_book_field_text">Co-Investigator ' + no_of_co_investigators+ '</span>\
        <span id="star">*</span>\
        <input class="book_form_input" type=name name="project_co_investigators" id="co_investigator'+no_of_co_investigators+'" size=25 maxlength=25>\
		<br \>\
		<br \>');
		
		return false;
	}


	function formsubmit()	
	{
		var project_title = document.getElementById('project_title');
		var principal_investigator = document.getElementById('principal_investigator');
		var citation_index = document.getElementById('citation_index');
		var project_status = document.getElementById('project_status');
		var start_date = document.getElementById('start_date');
		var close_date= document.getElementById('close_date');
		var project_cost = document.getElementById('project_cost');
		var url = document.getElementById('url');
		var abstract = document.getElementById('abstract');
		var funding_agency = document.getElementById('funding_agency');
		var flag = 1;
		var project_associated_departments = new Array();
		var project_co_investigators = new Array();
		var alphaExp = /^[a-zA-Z ]*$/;
		
		if(project_title.value == "-1" )
		{
			alert('Please enter Project Title');
			project_title.focus();
			project_title.select();
			flag = 0;
			return false;
		}
			
		if (principal_investigator.value == "" )
		{
			alert('Please enter Principal Investigator');
			principal_investigator.focus();
			principal_investigator.select();
			flag = 0;
			return false;
		}
		
		
		if(project_status.value == "-1" )
		{
			alert('Please enter project status');
			flag = 0;
			return false;
		}
		
		
		if (start_date.value == "" )
		{
			alert('Please enter Start Date');
			start_date.focus();
			start_date.select();
			flag = 0;
			return false;
		}
		if (close_date.value == "" )
		{
			alert('Please enter Close Date');
			close_date.focus();
			close_date.select();
			flag = 0;
			return false;
		}
		
		if (project_cost.value == "" )
		{
			alert('Please enter the Project Cost');
			project_cost.focus();
			project_cost.select();
			flag = 0;
			return false;
		}
		
		if (abstract.value == "" )
		{
			alert('Please enter the Project Abstract');
			abstract.focus();
			abstract.select();
			flag = 0;
			return false;
		}
		
		if (funding_agency.value == "" )
		{
			alert('Please enter the Project Cost');
			funding_agency.focus();
			funding_agency.select();
			flag = 0;
			return false;
		}
		
		
		project_associated_departments[0] = no_of_departments;
		for(i = 1; i <= no_of_departments; i++)
		{
				project_associated_departments[i] = document.getElementById('department'+i).value;
		}
		
		project_co_investigators[0] = no_of_co_investigators;
		for(i = 1; i <= no_of_co_investigators; i++)
		{
				project_co_investigators[i] = document.getElementById('co_investigator'+i).value;
		}
		
		var project_associated_departments_jsonstring = JSON.stringify(project_associated_departments);
		var project_co_investigators_jsonstring = JSON.stringify(project_co_investigators);
		//alert(project_title.value)
		
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Project/project_insert_back.php',
				data: {project_title : project_title.value, principal_investigator : principal_investigator.value, citation_index : citation_index.value,  project_status:project_status.value, start_date : start_date.value, close_date : close_date.value, project_cost : project_cost.value, project_associated_departments : project_associated_departments_jsonstring, project_co_investigators : project_co_investigators_jsonstring, abstract: abstract.value, funding_agency: funding_agency.value, url: url.value},
			}).done(function(data){
				if(data == ''){
						alert("Project Information added");
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




