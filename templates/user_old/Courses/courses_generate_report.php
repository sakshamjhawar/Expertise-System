<script type='text/javascript' >
	var id_array = new Array();
	var del_array = new Array();
	var course_id;
	function course_select(course_value)
	{
		course_id = course_value;	
		
	}

	function fetch_data()
	{
		
		id_array = [];
		del_array = [];
		var from_academic_year = $("#from_academic_year").val();
		var to_academic_year = $("#to_academic_year").val();
		var number_of_students = $("#number_of_students").val();
		var pass_percent = $("#pass_percent").val();
		//alert(course_id+from_academic_year+to_academic_year+number_of_students+pass_percent); 	
		//alert(id + name_of_event + role + location + from_date + to_date + url + additional_information);
		$.ajax({
		  type: "POST",
		  url: "Courses/courses_search.php",
		  data: { course_id:course_id,from_academic_year:from_academic_year, to_academic_year:to_academic_year, number_of_students:number_of_students, pass_percent:pass_percent}
		}).done(function( d ) { 
				data = d.split(",");
				if(data.length > 1){
				document.getElementById("community_delete").innerHTML = '<table class = "div_table_award_overview">\
					<tr>\
						<td class = "div_table_award_overview_th">Course ID</td>\
			<td class = "div_table_award_overview_th">Academic year </td>\
			<td class = "div_table_award_overview_th">Number of students</td>\
			<td class = "div_table_award_overview_th">Pass percent</td>\
			<td class = "div_table_award_overview_th">Check</td>\
					</tr>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Print PDF"  onClick="delete_data()"  style="margin-left:75%; margin-top: 8%; outline:none">';
				 
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=4) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+4; j++) {
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
		 // alert(course_id+from_academic_year+to_academic_year+number_of_students+pass_percent); 
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
		  url: "Courses/courses_generate_report_back.php",
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
<p class='div_award_field_text'><b>Enter the Course details to filter search results</b></p>

		<span class= "div_book_field_text">Course Id</span>
        <span id="star">*</span>
        <?php
			//session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'course_update_select' onChange='course_select(this.value)'>";
			error_reporting(E_ALL ^ E_DEPRECATED);
		include("../../db.php");

		if(!mysql_select_db('college site'))
		{
			die(mysql_error());
			return false;
		}
			$query = "SELECT * FROM courses_list";
	    	$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			echo "<option value=''></option>";
			echo "<option value =".$row['course_id'].">".$row['course_id']."</option>";
			echo "<script> 
					course_select('');
			</script>";

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['course_id'].">".$row['course_id']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
        
        <span class= "div_book_field_text">From academic year</span>
        <input class="book_form_input" type=name name="from_academic_year" id="from_academic_year" size=4 maxlength=4>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">To academic year</span>
        <input class="book_form_input" type=name name="to_academic_year" id="to_academic_year" size=4 maxlength=4>
        <br/>
        <br/>
     
        <span class= "div_book_field_text">Number of students</span>
        <input class="book_form_input" type=name name="number_of_students" id="number_of_students" size=20 maxlength=20>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Pass percentage</span>
        <input class="book_form_input" type=name name="pass_percent" id="pass_percent" size=20 maxlength=20>
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



