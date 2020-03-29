<script type='text/javascript' >
	var id_array = new Array();
	var del_array = new Array();
	var ugpg;
	function ugpg_select(ugpg_value)
	{
		ugpg = ugpg_value;
		
	}

	function fetch_data()
	{
		
		id_array = [];
		del_array = [];
		var faculty_exchange_program_id = $("#faculty_exchange_program_id").val();
		var institution = $("#institution").val();
		var subject = $("#subject").val();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		var collaboration_type = $("#collaboration_type").val();
		var details_of_collaboration = $("#details_of_collaboration").val();
		var feedback = $("#feedback").val();
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "FacultyExchangeProgram/fep_search.php",
		  data: { faculty_exchange_program_id:faculty_exchange_program_id, institution:institution, subject:subject, start_date:start_date, end_date:end_date, ug_pg:ugpg,collaboration_type:collaboration_type, details_of_collaboration:details_of_collaboration, feedback:feedback }
		}).done(function( d ) {
				data = d.split(",");
				if(data.length > 1){
				document.getElementById("community_delete").innerHTML = '<table class = "div_table_award_overview">\
					<tr>\
						<td class = "div_table_award_overview_th">Faculty Exchange Program ID</td>\
			<td class = "div_table_award_overview_th">Institution </td>\
			<td class = "div_table_award_overview_th">Subject</td>\
			<td class = "div_table_award_overview_th">Start date</td>\
			<td class = "div_table_award_overview_th">End date</td>\
			<td class = "div_table_award_overview_th">UG/PG</td>\
			<td class = "div_table_award_overview_th">Collaboration Type</td>\
			<td class = "div_table_award_overview_th">Details of collaboration</td>\
			<td class = "div_table_award_overview_th">Feedback</td>\
			<td class = "div_table_award_overview_th">Check</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Print PDF"  onClick="delete_data()"  style="margin-left:80%; margin-top: 8%; outline:none">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=9) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+9; j++) {
        				var td = document.createElement('TD');
        				td.appendChild(document.createTextNode(data[j]));
						if(j == i)
						{	id_array.push(data[j]);
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
		  //alert(id_array);
		  
			
	}
	
	function delete_data()
	{
		
	//alert(id_array);
	 var i = 0;
     $('#table_body').find('tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked')) {
            del_array.push(id_array[i]);
        }
		i++;

	});
	//alert(del_array);
	var jsonString = JSON.stringify(del_array);
	
	$.ajax({
		  type: "POST",
		  url: "FacultyExchangeProgram/fep_generate_report_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			var restore = document.body.innerHTML;
			document.body.innerHTML = data;
			window.print();
			document.body.innerHTML = restore;	
		});
	
        
	}
	
</script>

<form>
<p class='div_award_field_text'><b>Enter the Faculty Exchange Program details to filter search results</b></p>
		<span class= "div_book_field_text">Faculty Exchange Program Id</span>
        <input class="book_form_input" type=name name="faculty_exchange_program_id" id="faculty_exchange_program_id">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Name of Institution</span>
       
        <input class="book_form_input" type=name name="institution" id="institution" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Subject</span>
       
        <input class="book_form_input" type=name name="subject" id="subject" size=20 maxlength=20>
        <br/>
        <br/>
        
        
     
        
        <span class= "div_book_field_text">Start date of Exchange</span>
       
        <input class="book_form_input" type="date" name="start_date" id="start_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End date of Exchange</span>
       
        <input class="book_form_input" type="date" name="end_date" id="end_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">UG/PG</span>
        <select class = 'award_form_select' name = 'text' id = 'community_update_select' onChange='ugpg_select(this.value)'>			<option value="">Both</option>
        	<option value="UG">UG</option>
            <option value="PG">PG</option>
            
            <script type="text/javascript">
				ugpg_select("");
            </script>
        </select>
        <br/>
        <br />
        
        <span class= "div_book_field_text">Collaboration Type</span>
       
        <input class="book_form_input" type=name name="collaboration_type" id="collaboration_type" size=20 maxlength=20>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Details Of Collaboration</span>
        <input class="book_form_input" type=name name="details_of_collaboration" id="details_of_collaboration" size=20 maxlength=20>
        <br/>
        <br/>

        <span class= "div_book_field_text">Feedback</span>
       
        <textarea class="community_form_textarea" rows="3" cols="31" id="feedback"></textarea>
        <br/>
        <br/>
     
		    
        <input type="button" class='form_button_register_page_submit' value='Search' style='margin-left:80%; margin-top: 8%; outline:none' onClick="fetch_data()">

		<br \>
        <br \>
        <br \>
        <br \>

</form>
<div id="community_delete">  
</div>

</div>


