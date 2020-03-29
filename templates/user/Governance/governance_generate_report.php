<script type='text/javascript' >
	var id_array = new Array();
	var del_array = new Array();

	function fetch_data()
	{
		
		id_array = [];
		del_array = [];
		var governance_id = $("#governance_id").val();
		var name_of_committee = $("#name_of_committee").val();
		var status_of_committee = $("#status_of_committee").val();
		var served_from = $("#served_from").val();
		var served_to = $("#served_to").val();
		var role = $("#role").val();
		var responsibility = $("#responsibility").val();
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "Governance/governance_search.php",
		  data: { governance_id:governance_id, name_of_committee:name_of_committee, status_of_committee:status_of_committee, served_from:served_from, served_to:served_to,role:role, responsibility:responsibility }
		}).done(function( d ) {
				data = d.split("|");
				if(data.length > 1){
				document.getElementById("community_delete").innerHTML = '<table class = "div_table_award_overview">\
					<tr>\
						<td class = "div_table_award_overview_th">Governance ID</td>\
			<td class = "div_table_award_overview_th">Name of committee </td>\
			<td class = "div_table_award_overview_th">Status of committee</td>\
			<td class = "div_table_award_overview_th">Served from</td>\
			<td class = "div_table_award_overview_th">Served till</td>\
			<td class = "div_table_award_overview_th">Role</td>\
			<td class = "div_table_award_overview_th">Responsibility</td>\
			<td class = "div_table_award_overview_th">Check</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Print PDF"  onClick="delete_data()"  style="margin-left:80%; margin-top: 8%; outline:none">';
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
	$.ajax({
		  type: "POST",
		  url: "Governance/governance_generate_report_back.php",
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
<p class='div_award_field_text'><b>Enter the Governance details to filter search results</b></p>
		<span class= "div_book_field_text">Governance Id</span>
        <input class="book_form_input" type=name name="governance_id" id="governance_id">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Name of committee</span>
       
        <input class="book_form_input" type=name name="name_of_committee" id="name_of_committee" size=80 maxlength=80>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Status of commitee</span>
       
        <input class="book_form_input" type=name name="status_of_committee" id="status_of_committee" size=80 maxlength=80>
        <br/>
        <br/>
        
        
     
        
        <span class= "div_book_field_text">Start date of Exchange</span>
       
        <input class="book_form_input" type="date" name="served_from" id="served_from">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End date of Exchange</span>
       
        <input class="book_form_input" type="date" name="served_to" id="served_to">
        <br/>
        <br/>
        
      	
        
        <span class= "div_book_field_text">Role</span>
       
        <input class="book_form_input" type=name name="role" id="role" size=80 maxlength=80>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Resposibility</span>
        <input class="book_form_input" type=name name="responsibility" id="responsibility" size=80 maxlength=80>
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


