
<script type='text/javascript' >
	var aid_array = new Array();
	var del_array = new Array();
	no_of_authors = 1;
	function add_authors()
	{
		no_of_authors++;
		$("#journal_authors").append('<span class= "div_award_field_text"> Author ' + no_of_authors+ '</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="collab" id="author'+no_of_authors+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	function hide_unhide()
	{
		//alert("hi");
		if(document.getElementById("paper_associated_project").value == 'Yes')
		{
			document.getElementById('project_name').hidden=false;
			document.getElementById('project_text1').hidden=false;
			
		}
		else
		{
			document.getElementById('project_name').hidden=true;
			document.getElementById('project_text1').hidden=true;
			document.getElementById('project_name').innerHTML = '';
		}
	}
	
	function add_authors()
	{
		no_of_authors++;
		$("#journal_authors").append('<span class= "div_book_field_text">Author ' + no_of_authors+ '</span>\
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
		
		var journal_id = document.getElementById('journal_id');
		var journal_type = document.getElementById('journal_type');
		var research_area = document.getElementById('research_area');
		var paper_associated_project = document.getElementById('paper_associated_project');
		var project_name = document.getElementById('project_name');
		var paper_title = document.getElementById('paper_title');
		 
		var journal_name = document.getElementById('journal_name');
		var volume = document.getElementById('volume');
		var issue = document.getElementById('issue');
		
		var from_page = document.getElementById('from_page');
		var to_page = document.getElementById('to_page');
		var abstract = document.getElementById('abstract');
		var keywords = document.getElementById('keywords');
		var url = document.getElementById('url');
		var impact_factor = document.getElementById('impact_factor');
		var citation_index = document.getElementById('citation_index');
		var journal_month = document.getElementById('journal_month');
		var journal_year = document.getElementById('journal_year');
		
		
		
		var authors = new Array();
		authors[0] = no_of_authors;
		for(var i = 1; i <= no_of_authors; i++ )
			authors[i] = $("#author"+i).val();
	
		var authors_jsonString = JSON.stringify(authors);
		//alert(authors);
		$.ajax({
		  type: "POST",
		  url: "Journals/journal_search.php",
		  data: {journal_id: journal_id.value, journal_type: journal_type.value, research_area: research_area.value, paper_associated_project: paper_associated_project.value, project_name: project_name.value, journal_name: journal_name.value, volume: volume.value, issue: issue.value, abstract: abstract.value, keywords: keywords.value, url: url.value, from_page: from_page.value, to_page: to_page.value, paper_title: paper_title.value, authors: authors_jsonString , impact_factor: impact_factor.value, citation_index: citation_index.value, journal_month: journal_month.value, journal_year: journal_year.value}
		}).done(function( d ) {
			//alert(d);
				data = d.split(";");
				if(data.length > 1){
				document.getElementById("conference_delete").innerHTML = '<table class = "div_table_award_overview">\
				<tr> \
					<td class = "div_table_award_overview_th">Journal ID</td> \
					<td class = "div_table_award_overview_th">Journal Type</td> \
					<td class = "div_table_award_overview_th">Research Area</td>\
					<td class = "div_table_award_overview_th">Project name</td>\
					<td class = "div_table_award_overview_th">Is paper associated with project</td>\
					<td class = "div_table_award_overview_th">Paper Title</td>\
					<td class = "div_table_award_overview_th">Authors</td>\
					<td class = "div_table_award_overview_th">Journal Name</td>\
					<td class = "div_table_award_overview_th">Volume</td>\
					<td class = "div_table_award_overview_th">Issue</td>\
					<td class = "div_table_award_overview_th">Keywords</td>\
					<td class = "div_table_award_overview_th">Abstract</td>\
					<td class = "div_table_award_overview_th">From Page</td>\
					<td class = "div_table_award_overview_th">To Page</td>\
					<td class = "div_table_award_overview_th">URL</td>\
					<td class = "div_table_award_overview_th">Impact Factor</td>\
					<td class = "div_table_award_overview_th">Citation Index</td>\
					<td class = "div_table_award_overview_th">Journal Month</td>\
					<td class = "div_table_award_overview_th">Journal Year</td>\
					<td class = "div_table_award_overview_th">Check</td>\
				</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Delete"  style="margin-left:75%; margin-top: 8%; outline:none" onClick="delete_data()">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=19) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+19; j++) {
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
		  url: "Journals/journal_delete_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			
		});
	}
       
	}
	
</script>
<form>
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of the journal</b></p>

		<span class= 'div_award_field_text'>Journal ID</span>
         
        <input class='award_form_input' type=name name='journal_id' id='journal_id' maxlength=80 required="required">
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Name of the Journal</span>
         
        <input class='award_form_input' type=name name='journal_name' id='journal_name' maxlength=80 required="required">
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Journal Type</span>
         
        <input class='award_form_input' type=name name='journal_type' id='journal_type' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Research area</span>
        <input class='award_form_input' type=name name='research_area' id='research_area' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
       <span class= "div_conference_field_text">Is Paper Associated with Project?</span>
    <span id="star">*</span>
    <select name="paper_associated_project" id="paper_associated_project" class="conference_form_select" onchange="hide_unhide()">
    <option value=""></option>
	<option value="Yes">Yes</option>
	<option value="No">No</option>
	</select>
	<br>
    <br>
    <script>
		hide_unhide();
	</script>
         <span class= 'div_award_field_text' id = "project_text1">Project name</span>
        <input class='award_form_input' type=name name='project_name' id='project_name' size=100 maxlength=100 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text' >Paper Title</span>
           
        <input class='award_form_input' type=name name='paper_title' id='paper_title' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Abstract</span>
         
        <input class='award_form_input' type=name name='abstract' id='abstract' size=100 maxlength=100 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Keywords</span>
         
        <input class='award_form_input' type=name name='keywords' id='keywords' size=30 maxlength=30 required="required">
        <br/>
        <br/>
        
        
        <span class= 'div_award_field_text'>Author 1</span>
         
        <input class='award_form_input' type=name name='author1' id='author1' size=40 maxlength=40>
        <br/>
        <br/>
        <div id="journal_authors">
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add author" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="add_authors()">
        <br/>
        <br/>
    
    
		<span class= 'div_award_field_text'>Volume</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='volume' id='volume' size=11 maxlength=11>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Issue</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='issue' id='issue' size=11 maxlength=11>
        <br/>
        <br/>
        
		<span class= 'div_award_field_text'>Impact factor</span>
        <input class='award_form_input' type=name name='impact_factor' id='impact_factor' size=100 maxlength=100>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>Citation Index</span>
        <input class='award_form_input' type=name name='citation_index' id='citation_index' size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>From page</span>
        <input class='award_form_input' type=name name='from_page' id='from_page' size=11 maxlength=11>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>To page</span>
        <input class='award_form_input' type=name name='to_page' id='to_page' size=11 maxlength=11>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>Journal month</span>
       <select name="paper_associated_project" id="journal_month" class="conference_form_select" >
       <option value=""></option>
	<option value="January">January</option>
	<option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
    
	</select>
	<br>
    <br>
        <span class= 'div_award_field_text'>Journal year</span>
        <?php
			//session_start();
			echo "<select class = 'book_form_select' name = 'journal_name_name' id = 'journal_year' >";
				echo '<option value=""></option>';
			for($i=1960;$i<2050;$i++)
			
				echo '<option value='.$i.'>'.$i.'</option>';
			echo '</select>'
		?>
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Url</span>
        <input class='award_form_input' type=name name='url' id='url' size=100 maxlength=100>
        <br/>
        <br/>
        
        
        
        <span style='color:red; margin-left:2em;'>Fields with * are Mandatory</span>
           
       <input type="button" class="form_button_register_page_submit_conference" name='sub' value="Submit" style="margin-left:75%; 	margin-top: 8%; outline:none" onclick="fetch_data()">

</form>
<div id="conference_delete">  
</div>

