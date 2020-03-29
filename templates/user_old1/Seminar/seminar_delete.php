<form>
<p></p>
		<span class= "div_book_field_text">Seminar Title</span>
        <input class="book_form_input" type=name name="seminar_title" id="seminar_title" size=50 maxlength=50>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Organizing Authority</span>  
        <input class="book_form_input" type=name name="seminar_organizing_authority" id="seminar_organizing_authority" size=40 maxlength=40>
        <br/>
        <br/>
        
		<span class= "div_book_field_text">Start date</span>  
        <input class="book_form_input" type=date name="start_date" id="start_date" >
        <br/>
        <br/>
		<span class= "div_book_field_text">End date</span>  
        <input class="book_form_input" type=date name="end_date" id="end_date">
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
        
		<span class= "div_book_field_text">Seminar level</span> 
        <input class="book_form_input" type=name name="seminar_level" id="seminar_level" size=40 maxlength=40>
        <br/>
        <br/>
        
		
        <span class= "div_book_field_text">Seminar area</span>  
        <input class="book_form_input" type=name name="seminar_area" id="seminar_area" size=40 maxlength=40>
        <br/>
        <br/>
        
		<span class= "div_book_field_text">URL</span>
        <input class="book_form_input" type="url" name="url" id="url" maxlength=30>
        <br/>
        <br/>
		<span class= "div_book_field_text">Target Audience</span>
        <input class="book_form_input" type="name" name="target_audience" id="target_audience" maxlength=30>
        <br/>
        <br/>
        <br />
        <br />
		<br />
    
        <input type="button" class='form_button_register_page_submit' value='Search' style='margin-left:80%; margin-top: 8%; outline:none' onClick="fetch_data()">

		<br \>
        <br \>
        <br \>
        <br \>

</form>
<div id="community_delete">  
</div>

</div>


<script type='text/javascript' >
	var id_array = new Array();
	var del_array = new Array();
	function fetch_data()
	{
		
		id_array = [];
		del_array = [];
		var seminar_title = $("#seminar_title").val();
		var seminar_organizing_authority = $("#seminar_organizing_authority").val();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		var role = $("#role").val();
		var location = $("#location").val();
		var seminar_level= $("#seminar_level").val();
		var seminar_area = $("#seminar_area").val();
		var url= $("#url").val();
		var target_audience = $("#target_audience").val();
		
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "Seminar/seminar_search.php",
		  data: { seminar_title:seminar_title, seminar_organizing_authority:seminar_organizing_authority,start_date:start_date,end_date:end_date,role:role ,location:location,seminar_level:seminar_level,seminar_area:seminar_area, url:url,target_audience:target_audience}
		}).done(function( d ) {
				data = d.split(",");
				//alert(data);
				if(data.length > 1){
				document.getElementById("community_delete").innerHTML = '<table class = "div_table_award_overview">\
					<tr>\
						<td class = "div_table_award_overview_th">ID</td>\
						<td class = "div_table_award_overview_th">Seminar Title</td>\
						<td class = "div_table_award_overview_th">Organizing authority</td>\
						<td class = "div_table_award_overview_th">Start_date</td>\
						<td class = "div_table_award_overview_th">End_date</td>\
						<td class = "div_table_award_overview_th">Role</td>\
						<td class = "div_table_award_overview_th">Location</td>\
						<td class = "div_table_award_overview_th">Seminar_level</td>\
						<td class = "div_table_award_overview_th">seminar_area</td>\
						<td class = "div_table_award_overview_th">URL</td>\
						<td class = "div_table_award_overview_th">Target Audience</td>\
						<td class = "div_table_award_overview_th">Check</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Delete"  onClick="delete_data()"  style="margin-left:80%; margin-top: 8%; outline:none">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=11) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+11; j++) {
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
	del_array = [];	
		
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
		  url: "Seminar/seminar_delete_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
		});
	}
        
	}
	
</script>
