<form>
<p class='div_award_field_text'><b>Enter the Professional Membership details to filter search results</b></p>
		<span class= "div_book_field_text">Membership Number</span>
        <input class="book_form_input" type=name name="membership_number" id="membership_number">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Name of Body</span>  
        <input class="book_form_input" type=name name="name" id="name" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Type</span> 
        <input class="book_form_input" type=name name="membership_type" id="membership_type" size=40 maxlength=40>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Starting Date</span>
        <input class="book_form_input" type="date" name="from_date" id="from_date">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End Date</span>
        <input class="book_form_input" type="date" name="to_date" id="to_date">
        <br/>
        <br/>
        
        
		<br />
    
        <input type="button" class='form_button_register_page_submit' value='Search' style='margin-left:80%; margin-top: 8%; outline:none' onClick="fetch_data()">

		<br \>
        <br \>
        <br \>
        <br \>

</form>
<div id="prof_delete">  
</div>

</div>


<script type='text/javascript' >
	var id_array = new Array();
	var del_array = new Array();
	function fetch_data()
	{
		
		id_array = [];
		del_array = [];
		var membership_number= $("#membership_number").val();
		var name = $("#name").val();
		var membership_type = $("#membership_type").val();
		//var location = $("#location").val();
		var from_date = $("#from_date").val();
		var to_date = $("#to_date").val();
		//var url = $("#url").val();
		//var additional_information = $("#additional_information").val();
		
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "Professional_membership/prof_search.php",
		  data: { membership_number:membership_number, name:name, membership_type:membership_type,from_date:from_date, to_date:to_date}
		}).done(function( d ) {
				//alert(d);
				data = d.split("|");
				if(data.length > 1){
document.getElementById("prof_delete").innerHTML = '<table class = "div_table_award_overview"><tr><td class = "div_table_award_overview_th">Membership number</td><td class = "div_table_award_overview_th">Name</td><td class = "div_table_award_overview_th">Type</td><td class = "div_table_award_overview_th">Starting date</td><td class = "div_table_award_overview_th">End date</td>						</tr><tbody id="table_body"></tbody>				</table>    			<br>  			<br><input type="button" class="form_button_register_page_submit" value="Print"  onClick="delete_data()"  style="margin-left:80%; margin-top: 8%; outline:none">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=5) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+5; j++) {
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
	del_array = [];
	 var i = 0;
     $('#table_body').find('tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked')) {
            del_array.push(id_array[i]);
        }
		i++;

	});
	alert(del_array);
	var jsonString = JSON.stringify(del_array);

	$.ajax({
		  type: "POST",
		  url: "Professional_membership/prof_generate_report_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			var restore = $("body").html();
			$("body").html(data);
			window.print();
			$("body").html(restore);
		});
	}
</script>
