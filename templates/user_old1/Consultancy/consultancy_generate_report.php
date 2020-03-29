

<form>
<p class='div_award_field_text'><b>Enter the Consultancy details to filter search results</b></p>

		<span class= 'div_award_field_text'>Consultancy ID</span>
         
        <input class='award_form_input' type=name name='consultancy_id' id='consultancy_id' maxlength=80 required="required">
        <br/>
        <br/>

		<span class= 'div_award_field_text'>Name of the client</span>
         
        <input class='award_form_input' type=name name='client' id='client' maxlength=80 required="required">
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Work Title</span>
         
        <input class='award_form_input' type=name name='work_title' id='work_title' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
		
		<div class="div_collaboration">
        <span class= 'div_award_field_text'>Collaboration 1</span>
        <span id="star">*</span>
        
        <input class='award_form_input' type=name name='collaborations' id='collaboration1' size=40 maxlength=40>
        <br/>
        <br/>
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add Collaboration" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addCollab()">
        <br/>
        <br/>
        
		<span class= 'div_award_field_text'>Start Date</span>
         
    <input class = "award_form_input" type="date" id="start_date" required="required">
    
    <br />
    <br />
    <span class= 'div_award_field_text'>End Date</span>
         
   		 <input class = "award_form_input" type="date" id="end_date" required="required">
    
   		 <br />
    	<br />
        
        <div class="div_faculty">
        <span class= 'div_award_field_text'>Faculty 1</span>
         
        <input class='award_form_input' type=name name='faculty' id='faculty1' size=40 maxlength=40>
        <br/>
        <br/>
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add Faculty" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addFaculty()">
        <br/>
        <br/>
    
    	<div class="div_student">
        <span class= 'div_award_field_text'>Student 1 USN</span>
         
        <input class='award_form_input' type=name name='student' id='student1' size=40 maxlength=40>
        <br/>
        <br/>
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add Student" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addStudent()">
        <br/>
        <br/>
    
    
		<span class= 'div_award_field_text'>Revenue Generated</span>
        <input class='award_form_input' type=name name='revenue_generated' id='revenue_generated' size=15 maxlength=15>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Summary</span>
        <input class='award_form_input' type=name name='summary' id='summary' size=100 maxlength=100>
        <br/>
        <br/>
        
		<span class= 'div_award_field_text'>Labs Allocated</span>
        <input class='award_form_input' type=name name='labs_allocated' id='labs_allocated' size=100 maxlength=100>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>url</span>
        <input class='award_form_input' type=name name='url' id='url' size=40 maxlength=40>
        <br/>
        <br/>
        
        
        
           
        <input type="button" class='form_button_register_page_submit' value='Search' style='margin-left:75%; margin-top: 8%; outline:none' onClick="fetch_data()">
</form>
<div id="book_delete">  
</div>

</div>


<script type='text/javascript' >
	var aid_array = new Array();
	var del_array = new Array();
	var collab_num=1;
	var faculty_num=1;
	var student_num=1;
	
	function addCollab()
	{
		collab_num++;
		$(".div_collaboration").append('<span class= "div_award_field_text">Collaboration ' + collab_num+ '</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="collab" id="collaboration'+collab_num+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	function addFaculty()
	{
		faculty_num++;
		$(".div_faculty").append('<span class= "div_award_field_text">Faculty ' + faculty_num+ '</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="faculty" id="faculty'+faculty_num+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	function addStudent()
	{
		student_num++;
		$(".div_student").append('<span class= "div_award_field_text">Student ' + student_num+ ' USN</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="student" id="student'+student_num+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	
	function fetch_data()
	{
		
		aid_array = [];
		del_array = [];
		var consultancy_id = $("#consultancy_id").val();
		var client = $("#client").val();
		var work_title = $("#work_title").val();
		var  start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		var collaboration = new Array();
		collaboration[0] = collab_num;
		for(var i = 1; i <= collab_num; i++ )
			collaboration[i] = $("#collaboration"+i).val();
		
		facultys = new Array();
		facultys[0] = faculty_num;
		for(var i = 1; i <= faculty_num; i++ )
			facultys[i] = $("#faculty"+i).val();
			
		students = new Array();
		students[0] = student_num;
		for(var i = 1; i <= student_num; i++ )
			students[i] = $("#students"+i).val();
		var revenue_generated = document.getElementById("revenue_generated").value;
		var summary = document.getElementById("summary").value;
		var labs_allocated = $("#labs_allocated").val();
		var url = $("#url").val();
		
		var collaboration_jsonString = JSON.stringify(collaboration);
		var facultys_jsonString = JSON.stringify(facultys);
		var students_jsonString = JSON.stringify(students);
		//alert(authors);
		$.ajax({
		  type: "POST",
		  url: "Consultancy/consultancy_search.php",
		  data: { consultancy_id : consultancy_id, client:client , work_title: work_title,start_date: start_date, end_date: end_date, collaborations: collaboration_jsonString, facultys: facultys_jsonString,students: students_jsonString, revenue_generated:revenue_generated, summary:summary, labs_allocated : labs_allocated, url : url}
		}).done(function( d ) {
				
				data = d.split(";");
				if(data.length > 1){
				document.getElementById("book_delete").innerHTML = '<table class = "div_table_award_overview">\
				<tr> \
					<td class = "div_table_award_overview_th">Consultancy ID </td>\
			<td class = "div_table_award_overview_th">Client</td>\
			<td class = "div_table_award_overview_th">Work Title</td>\
			<td class = "div_table_award_overview_th">Collaborations</td>\
			<td class = "div_table_award_overview_th">Start date</td>\
			<td class = "div_table_award_overview_th">End Date</td>\
			<td class = "div_table_award_overview_th">Teachers Involved</td>\
			<td class = "div_table_award_overview_th">Students Involved</td>\
			<td class = "div_table_award_overview_th">Revenue</td>\
			<td class = "div_table_award_overview_th">Summary</td>\
			<td class = "div_table_award_overview_th">labs allocated</td>\
			<td class = "div_table_award_overview_th">url</td>\
			<td class = "div_table_award_overview_th">Check</td>\
				</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Print PDF"  style="margin-left:75%; margin-top: 8%; outline:none" onClick="delete_data()">';
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
	
	var jsonString = JSON.stringify(del_array);
	
	$.ajax({
		  type: "POST",
		  url: "Consultancy/consultancy_generate_report_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			var restore = $("body").html();
			$("body").html(data);
			window.print();
			$("body").html(restore);	
			
		});
	
       
	}
	
</script>