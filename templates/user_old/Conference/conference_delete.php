<form>
	<p></p>
    <p class='div_award_field_text' style='color:red; display: block;'><b>Enter the Conference details to filter search results</b></p>
	<span class= "div_conference_field_text">Conference ID</span>
	<input class="book_form_input" type=name name="conference_id" id="conference_id" size=12 maxlength=12>
	<br>
	<br>
	
    <span class= "div_conference_field_text">Type of the Conference</span>
	<select name="conference_type" id="conference_type" class="conference_form_select">
	<option value="National">National</option>
	<option value="International">International</option>
	</select>
	<br>
	<br>


	<span class= "div_conference_field_text">Research area</span>
	<input class="book_form_input" type=name name="research_area" id="research_area" size=12 maxlength=12>
	<br>
	<br>

	<span class= "div_conference_field_text">Is Paper Associated with Project?</span>
    <select name="paper_associated_project" id="paper_associated_project" class="conference_form_select" onchange="hide_unhide()">
	<option value="Yes">Yes</option>
	<option value="No">No</option>
	</select>
	<br>
    <br>

	<span class= "div_conference_field_text" id = "project_text">Project Name</span>
	<input class="book_form_input" type=name name="project_name" id="project_name" size=100 maxlength=100>
	<br><br>

	<span class= "div_conference_field_text">Title of the paper</span>
	<input class="book_form_input" type=name name="paper_title" id="paper_title" size=100 maxlength=100>
	<br><br>
    
    <div id="conference_authors">
    </div>
    
    <input type="button" class="form_button_register_page_submit" value="Add Author" style="margin-left:75%; outline:none" onClick="add_authors()">
        <br />
        <br />

	<span class= "div_conference_field_text">Name of the Conference</span>
	<input class="book_form_input" type=name name="conference_name" id="conference_name" size=100 maxlength=100>
	<br><br>

	<span class= "div_conference_field_text">Organizer</span>
	<input class="book_form_input" type=name name="organizer" id="organizer" size=50 maxlength=50>
	<br><br>

	<span class= "div_conference_field_text">From Date</span>
	<input class="book_form_input" type="date" name="fdate" id="from_date"></span>
	<br><br>

	<span class= "div_conference_field_text">To Date</span>
	<input class="book_form_input" type="date" name="to_date" id="to_date"></span>
	<br><br>

	<span class= "div_conference_field_text">Conference Venue</span>
	<input class="book_form_input" type=name name="venue" id="venue" size=25 maxlength=25>
	<br><br>

	<span class= "div_conference_field_text">From Page</span>
	<input class="book_form_input" type="number" name="from_page" id="from_page" size=10 maxlength=10>
	<br><br>

	<span class= "div_conference_field_text">To Page</span>
	<input class="book_form_input" type="number" name="to_page" id="to_page" size=10 maxlength=10>
	<br><br>

	<span class= "div_conference_field_text">Abstract</span>
	<input class="book_form_input" type=name name="abstract" id="abstract" size=100 maxlength=100>
	<br><br>

	<span class= "div_conference_field_text">Keywords</span>
	<input class="book_form_input" type=name name="keywords" id="keywords" size=25 maxlength=25>
	<br><br>

	<span class= "div_conference_field_text">URL</span>
	<input class="book_form_input" type=name name="url" id="url" size=50 maxlength=50>
	<br><br>

	

	<span style="color:red; margin-left:2em; margin-top: 8%;">Fields with * are Mandatory</span>

	<input type="button" class="form_button_register_page_submit_conference" name='sub' value="Submit" style="margin-left:75%; 	margin-top: 8%; outline:none" onclick="fetch_data()">

</form>
<div id="conference_delete">  
</div>


<script type='text/javascript' >
	var aid_array = new Array();
	var del_array = new Array();
	no_of_authors = 0;
	
	function add_authors()
	{
		no_of_authors++;
		$("#conference_authors").append('<span class= "div_book_field_text">Author ' + no_of_authors+ '</span>\
        <input class="book_form_input" type=name name="author" id="author'+no_of_authors+'" size=25 maxlength=25>\
		<br \>\
		<br \>');
		
		return false;
	}
	
	function fetch_data()
	{
		document.getElementById("conference_delete").innerHTML = "";
		aid_array = [];
		del_array = [];
		
		var conference_id = document.getElementById('conference_id');
		var conference_type = document.getElementById('conference_type');
		var research_area = document.getElementById('research_area');
		var paper_associated_project = document.getElementById('paper_associated_project');
		var project_name = document.getElementById('project_name');
		var paper_title = document.getElementById('paper_title');
		 
		var conference_ame = document.getElementById('conference_name');
		var organizer = document.getElementById('organizer');
		var from_date= document.getElementById('from_date');
		var to_date = document.getElementById('to_date');
		var venue = document.getElementById('venue');
		
		var from_page = document.getElementById('from_page');
		var to_page = document.getElementById('to_page');
		var abstract = document.getElementById('abstract');
		var keywords = document.getElementById('keywords');
		var url = document.getElementById('url');
		var file = document.getElementById('file');
		
		
		var authors = new Array();
		authors[0] = no_of_authors;
		for(var i = 1; i <= no_of_authors; i++ )
			authors[i] = $("#author"+i).val();
	
		var authors_jsonString = JSON.stringify(authors);
		//alert(authors);
		$.ajax({
		  type: "POST",
		  url: "Conference/conference_search.php",
		  data: {conference_id: conference_id.value, conference_type: conference_type.value, research_area: research_area.value, paper_associated_project: paper_associated_project.value, project_name: project_name.value, conference_name: conference_name.value, organizer: organizer.value, from_date: from_date.value, to_date: to_date.value, venue: venue.value, abstract: abstract.value, keywords: keywords.value, url: url.value, from_page: from_page.value, to_page: to_page.value, paper_title: paper_title.value, authors: authors_jsonString}
		}).done(function( d ) {
			//alert(d);
				data = d.split(";");
				if(data.length > 1){
				document.getElementById("conference_delete").innerHTML = '<table class = "div_table_award_overview">\
				<tr> \
					<td class = "div_table_award_overview_th">Conference ID</td> \
					<td class = "div_table_award_overview_th">Conference Type</td> \
					<td class = "div_table_award_overview_th">Research Area</td>\
					<td class = "div_table_award_overview_th">Project</td>\
					<td class = "div_table_award_overview_th">Paper Title</td>\
					<td class = "div_table_award_overview_th">Authors</td>\
					<td class = "div_table_award_overview_th">Conference Name</td>\
					<td class = "div_table_award_overview_th">Organizer</td>\
					<td class = "div_table_award_overview_th">From Date</td>\
					<td class = "div_table_award_overview_th">To Date</td>\
					<td class = "div_table_award_overview_th">Pages</td>\
					<td class = "div_table_award_overview_th">URL</td>\
					<td class = "div_table_award_overview_th">Check</td>\
				</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Delete"  style="margin-left:75%; margin-top: 8%; outline:none" onClick="delete_data()">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=12) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+12; j++) {
        				var td = document.createElement('TD');
        				td.appendChild(document.createTextNode(data[j]));
						if(j == i)
						{	aid_array.push(data[j]);
						}
						tr.appendChild(td);
    				 }
					 var td = document.createElement('TD');
					 var chk = document.createElement("input");
						chk.type = "checkbox";
						chk.id = i;
						chk.name = "to_delete";
					 	//chk.value = i/7;
					 td.appendChild(chk);
					 tr.appendChild(td);	
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
		  url: "Conference/conference_delete_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			
		});
	}
       
	}
	
</script>