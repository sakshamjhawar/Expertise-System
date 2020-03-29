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
    

    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="fetch_data()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>
<div id="book_delete">  
</div>


<script type='text/javascript' >
	var aid_array = new Array();
	var del_array = new Array();
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
	function fetch_data()
	{
		document.getElementById("book_delete").innerHTML = "";
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
		project_associated_departments[0] = no_of_departments;
		for(var i = 1; i <= no_of_departments; i++ )
			project_associated_departments[i] = $("#department"+i).val();
		
		project_co_investigators[0] = no_of_co_investigators;
		for(var i = 1; i <= no_of_co_investigators; i++ )
			project_co_investigators[i] = $("#co_investigator"+i).val();
		var project_associated_departments_jsonstring = JSON.stringify(project_associated_departments);
		var project_co_investigators_jsonstring = JSON.stringify(project_co_investigators);
		//alert(authors);
		$.ajax({
				type: 'POST',
				url : 'Project/project_search.php',
				data: {project_title : project_title.value, principal_investigator : principal_investigator.value, citation_index : citation_index.value,  project_status:project_status.value, start_date : start_date.value, close_date : close_date.value, project_cost : project_cost.value, project_associated_departments : project_associated_departments_jsonstring, project_co_investigators : project_co_investigators_jsonstring, abstract: abstract.value, funding_agency: funding_agency.value, url: url.value},
			}).done(function(d){
			//alert(d);
				data = d.split(";");
				if(data.length > 1){
				document.getElementById("book_delete").innerHTML = '<table cellpadding = "15" class = "div_table_award_overview"  >\
				<tr> \
					<td class = "div_table_award_overview_th">Project ID</td> \
					<td class = "div_table_award_overview_th">Project Title</td> \
					<td class = "div_table_award_overview_th">Principal Investigator</td>\
					<td class = "div_table_award_overview_th">Citation Index</td>\
					<td class = "div_table_award_overview_th">Start Date</td>\
					<td class = "div_table_award_overview_th">Close Date</td>\
					<td class = "div_table_award_overview_th">Project Status</td>\
					<td class = "div_table_award_overview_th">Associated Department</td>\
					<td class = "div_table_award_overview_th">Co Investigators</td>\
					<td class = "div_table_award_overview_th">Project Cost</td>\
					<td class = "div_table_award_overview_th">abstract</td>\
					<td class = "div_table_award_overview_th">Funding Agency</td>\
					<td class = "div_table_award_overview_th">url</td>\
				</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Delete"  style="margin-left:75%; margin-top: 8%; outline:none" onClick="delete_data()">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=13) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+13; j++) {
        				var td = document.createElement('TD');
        				td.appendChild(document.createTextNode(data[j]));
						if(j == i)
						{	aid_array.push(data[j]);
						}
						tr.appendChild(td);
    				 }
					 var chk = document.createElement("input");
						chk.type = "checkbox";
						chk.id = i;
						chk.name = "to_delete";
					 	//chk.value = i/7;
					 tr.appendChild(chk);	
    				 tableBody.appendChild(tr);
				}
				}
				else
				{
					alert("No matching records found");
				}
		  });
		  
			
	}
	
	function delete_data()
	{
		
	 del_array = [];	
	 var i = 0;
     $('#table_body').find('tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked')) {
            del_array.push(aid_array[i]);
        }
		i++;

	});
	//alert(del_array);
	var jsonString = JSON.stringify(del_array);
	if(confirm("Are you sure you want to delete?")){
	$.ajax({
		  type: "POST",
		  url: "Project/project_delete_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			
		});
	}
       
	}
	
</script>
