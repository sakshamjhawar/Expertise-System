<form>
<!--<p class="div_book_field_text" style="color:red; display: block;"><b>Enter your Educational details</b></p>
--><p class='div_award_field_text'><b>Enter the Educational Qualification details to filter search results</b></p>
		<span class= "div_book_field_text">Qualification</span>
        <input class="book_form_input" type=name name="qualification" id="qualification" size=50 maxlength=50>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Institution</span>  
        <input class="book_form_input" type=name name="institution" id="institution" size=40 maxlength=40>
        <br/>
        <br/>
        

        <span class= "div_book_field_text">Location</span>
        <input class="book_form_input" type=name name="location" id="location" size=40 maxlength=40>
        <br/>
        <br/>
		<span class= "div_book_field_text">University</span> 
        <input class="book_form_input" type=name name="university" id="university" size=40 maxlength=40>
        <br/>
        <br/>
        
		 
        <span class= "div_book_field_text">Join_Year</span>
        <input class="book_form_input" type="month" name="join_year" id="join_year">
        <br/>
        <br/>
		 
        <span class= "div_book_field_text">Pass_Year</span>
        <input class="book_form_input" type="month" name="pass_year" id="pass_year">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Percentage</span>
        <input class="book_form_input" type="number" name="percentage" id="percentage">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Class</span>
        <input class="book_form_input" type="text" name="class1" id="class1">
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
		var qualification = $("#qualification").val();
		var institution = $("#institution").val();
		var university= $("#university").val();
		var location = $("#location").val();
		var join_year= $("#join_year").val();
		var pass_year= $("#pass_year").val();
		var percentage= $("#percentage").val();
		var class1= $("#class1").val();
		//var additional_information = $("#additional_information").val();
		
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "Profile/profile_search.php",
		  data: { qualification:qualification, institution:institution,location:location,university:university,join_year:join_year,pass_year:pass_year,percentage:percentage, class1:class1}
		}).done(function( d ) {
				data = d.split(",");
				if(data.length > 1){
				document.getElementById("community_delete").innerHTML = '<p><b><center> Select the Qualifications to delete</center></b></p><br><table class = "div_table_award_overview" cellpadding = "15">	\
					<tr>\
						<td class = "div_table_award_overview_th">Qualification</td>\
						<td class = "div_table_award_overview_th">Institution</td>\
						<td class = "div_table_award_overview_th">Location</td>\
						<td class = "div_table_award_overview_th">University</td>\
						<td class = "div_table_award_overview_th">Join_Year</td>\
						<td class = "div_table_award_overview_th">Pass_Year</td>\
						<td class = "div_table_award_overview_th">Percentage</td>\
						<td class = "div_table_award_overview_th">Class</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Print"  onClick="delete_data()" style="margin-left:75%; margin-top: 8%; outline:none">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=8) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+8; j++) {
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
	//alert(del_array);
	var jsonString = JSON.stringify(del_array);

	$.ajax({
		  type: "POST",
		  url: "profile/profile_generate_report_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			var restore = $("body").html();
			$("body").html(data);
			window.print();
			$("body").html(restore);	
		});
	}
</script>
