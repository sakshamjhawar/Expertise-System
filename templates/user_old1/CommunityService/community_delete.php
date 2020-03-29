<form>
<p class="div_book_field_text"></p>
		<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the Event details to filter search results</b></p>

		<span class= "div_book_field_text">Event ID</span>
        <input class="book_form_input" type=name name="event_id" id="event_id">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Name of Event</span>  
        <input class="book_form_input" type=name name="name_of_event" id="name_of_event" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Role</span> 
        <input class="book_form_input" type=name name="role" id="role" size=40 maxlength=40>
        <br/>
        <br/>
        
        
        <span class= "div_book_field_text">Location</span>
        <input class="book_form_input" type=name name="location" id="location" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">From Date</span>
        <input class="book_form_input" type="date" name="from_date" id="from_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">To Date</span>
        <input class="book_form_input" type="date" name="to_date" id="to_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">URL</span>
        <input class="book_form_input" type="text" name="url" id="url">
        <br/>
        <br/>

        <span class= "div_book_field_text">Additional Information</span>
        <textarea class="community_form_textarea" rows="3" cols="31" id="additional_information"></textarea>
        <br/>
        <br/>
        <br />
        <br />
		<br />
    
        <input type="button" class='form_button_register_page_submit' value='Search' style='margin-left:75%; margin-top: 8%; outline:none' onClick="fetch_data()">

		<br \>
        <br \>
        <br \>
        <br \>

</form>
<div id="community_delete">  
</div>


<script type='text/javascript' >
	var id_array = new Array();
	var del_array = new Array();
	function fetch_data()
	{
		
		id_array = [];
		del_array = [];
		var id = $("#event_id").val();
		var name_of_event = $("#name_of_event").val();
		var role = $("#role").val();
		var location = $("#location").val();
		var from_date = $("#from_date").val();
		var to_date = $("#to_date").val();
		var url = $("#url").val();
		var additional_information = $("#additional_information").val();
		
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "CommunityService/community_search.php",
		  data: { id:id, name_of_event:name_of_event, role:role, location:location, from_date:from_date, to_date:to_date,additional_information:additional_information, url:url }
		}).done(function( d ) {
				data = d.split(",");
				if(data.length > 1){
				document.getElementById("community_delete").innerHTML = '<table class = "div_table_award_overview">\
					<tr>\
						<td class = "div_table_award_overview_th">Event ID</td>\
						<td class = "div_table_award_overview_th">Name of Event</td>\
						<td class = "div_table_award_overview_th">Role</td>\
						<td class = "div_table_award_overview_th">Location</td>\
						<td class = "div_table_award_overview_th">Date of Event</td>\
						<td class = "div_table_award_overview_th">URL</td>\
						<td class = "div_table_award_overview_th">Additional Information</td>\
						<td class = "div_table_award_overview_th">Check</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Delete"  onClick="delete_data()"  style="margin-left:75%; margin-top: 8%; outline:none">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=7) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+7; j++) {
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
	if(confirm("Are you sure you want to delete?")){
	$.ajax({
		  type: "POST",
		  url: "CommunityService/community_delete_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			
		});
	}
        
	}
	
</script>
