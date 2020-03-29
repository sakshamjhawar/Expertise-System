<form>

	<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the Award details to filter search results</b></p>
	<span class= 'div_award_field_text'>ID</span>
    <input class='award_form_input' type="text" name='search_id' id='search_id' maxlength=50>
    <br/>
    <br/>
	<span class= 'div_award_field_text'>Name</span>
    <input class='award_form_input' type="text" name='search_name' id='search_name' maxlength=50>
    <br/>
    <br/>    
    <span class= 'div_award_field_text'>Agency</span>   
    <input class='award_form_input' type="text" name='search_agency' id='search_agency' size=80 maxlength=80>
    <br/>
    <br/>
	<span class= 'div_award_field_text'>From Date</span>
    <input class = "award_form_input" type="date" id="from_date" >
    <br/>
    <br/>
    <span class= 'div_award_field_text'>To Date</span>
    <input class = "award_form_input" type="date" id="to_Date" >
    <br>
    <br>
    <input type='button' class='form_button_register_page_submit' value='Search'  onClick="fetch_data()" style='margin-left:75%; margin-top: 8%; outline:none'>
</form>
<div id="award_delete">  
</div>

</div>


<script type='text/javascript' >
	var aid_array = new Array();
	var del_array = new Array();
	function fetch_data()
	{
		
		aid_array = [];
		del_array = [];
		var id = $("#search_id").val();
		var name = $("#search_name").val();
		var  agency = $("#search_agency").val();
		var from_date = $("#from_date").val();
		var to_date = $("#to_Date").val();
		$.ajax({
		  type: "POST",
		  url: "Award/award_search.php",
		  data: { id:id, name:name, agency:agency, from_date : from_date, to_date : to_date }
		}).done(function( d ) {
				//alert(d.length);
				data = d.split("|");
				//alert(data.length);
				if(data.length > 1){
				document.getElementById("award_delete").innerHTML = '<p><b><center> Select the awards to delete</center></b></p><br><table class = "div_table_award_overview" cellpadding = "15">\
					<tr>\
						<td class = "div_table_award_overview_th">ID</td>\
						<td class = "div_table_award_overview_th">Name</td>\
						<td class = "div_table_award_overview_th">Agency</td>\
						<td class = "div_table_award_overview_th">Date</td>\
						<td class = "div_table_award_overview_th">URL</td>\
						<td class = "div_table_award_overview_th">Remark</td>\
						<td class = "div_table_award_overview_th">Check</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Delete"  onClick="delete_data()" style="margin-left:75%; margin-top: 8%; outline:none">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=6) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+6; j++) {
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
		  url: "Award/award_delete_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			
		});
	}
        
	}
	
</script>
