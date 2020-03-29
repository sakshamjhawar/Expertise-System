<script type="text/javascript" src="jspdf/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/jspdf/libs/base64.js"></script>
<form>
<p class='div_award_field_text'><b>Enter the Book or Chapter details to filter search results</b></p>

		<span class= "div_book_field_text">Book ID</span>
        <span id="star">*</span>
        <input class="book_form_input" type="text" name="book_id" id="book_id" size=100 maxlength=100>
        <br/>
        <br/>
        
        
        <span class= "div_book_field_text">Role</span>
        <span id="star">*</span>
	
    	<select name="role" id="role" class="book_form_select">
		<option value="Editor">Editor</option>
		<option value="Author">Author</option>
		<option value="Reviewer">Reviewer</option>
		<option value="Others">Others</option>
		</select>
        <br \>
        <br \>
        
		<span class= "div_book_field_text" >Book or Chapter</span>
        <span id="star">*</span>
		<select name="bc" id="book_or_chapter" class="book_form_select" >
		<option value="Book">Book</option>
		<option value="Chapter">Chapter</option>
		</select>
        <br \>
        <br \>
        
        <span class= "div_book_field_text">Title of the Book</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="book_title" id="book_title" size=100 maxlength=100>
        <br/>
        <br/>
        
        <div id="book_chapters">
        </div>
        
        <input type="button" class="form_button_register_page_submit" value="Add Chapters" style="margin-left:75%; outline:none" onClick="add_chapters()">
        <br />
        <br />
        
        <span class= "div_book_field_text">Edition of the Book</span>
        <input class="book_form_input" type=name name="edition" id="book_edition" size=2 maxlength=2>
        <br/>
        <br/>
        
        <div id="book_authors">
        </div>
		
        <input type="button" class="form_button_register_page_submit" value="Add Author" style="margin-left:75%; outline:none" onClick="add_authors()">
        <br />
        <br />
        
        <span class= "div_book_field_text">Name of Publisher</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="pub_name" id="publisher_name" size=50 maxlength=50>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">ISBN</span>
        <input class="book_form_input" type=name name="isbn" id="isbn" size=20 maxlength=20>
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

		<br \>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="fetch_data()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>
<div id="book_delete">  
</div>


<script type='text/javascript' >
	var aid_array = new Array();
	var del_array = new Array();
	no_of_authors = 0;
	no_of_chapters = 0;
	function add_authors()
	{
		no_of_authors++;
		$("#book_authors").append('<span class= "div_book_field_text">Author ' + no_of_authors+ '</span>\
        <span id="star">*</span>\
        <input class="book_form_input" type=name name="author" id="author'+no_of_authors+'" size=25 maxlength=25>\
		<br \>\
		<br \>');
		
		return false;
	}
	
	function add_chapters()
	{
		no_of_chapters++;
		$("#book_chapters").append('<span class= "div_book_field_text">Chapter ' + no_of_chapters+ '</span>\
        <span id="star">*</span>\
        <input class="book_form_input" type=name name="chapters" id="chapter'+no_of_chapters+'" size=25 maxlength=25>\
		<br \>\
		<br \>');
		
		return false;
	}
	function fetch_data()
	{
		
		aid_array = [];
		del_array = [];
		var book_id = $("#book_id").val();
		var role = $("#role").val();
		if(role == -1)
			role = '';
		var book_or_chapter = $("#book_or_chapter").val();
		var  book_title = $("#book_title").val();
		var book_edition = $("#book_edition").val();
		var authors = new Array();
		authors[0] = no_of_authors;
		for(var i = 1; i <= no_of_authors; i++ )
			authors[i] = $("#author"+i).val();
		
		chapters = new Array();
		chapters[0] = no_of_chapters;
		for(var i = 1; i <= no_of_authors; i++ )
			chapters[i] = $("#chapter"+i).val();
		
		var from_date = document.getElementById("from_date").value;
		var to_date = document.getElementById("to_date").value;
		var publisher_name = $("#publisher_name").val();
		var isbn = $("#isbn").val();
		
		var authors_jsonString = JSON.stringify(authors);
		var chapters_jsonString = JSON.stringify(chapters);
		//alert(authors);
		$.ajax({
		  type: "POST",
		  url: "individual/Book/book_search.php",
		  data: { book_id : book_id, book_or_chapter:book_or_chapter , book_title: book_title,role: role, book_edition: book_edition, authors: authors_jsonString, chapters: chapters_jsonString, publisher_name:publisher_name, isbn:isbn, from_date : from_date, to_date : to_date}
		}).done(function( d ) {
			//alert(d);
				data = d.split(";");
				if(data.length > 1){
				document.getElementById("book_delete").innerHTML = '<table class = "div_table_award_overview" id = "tt">\
				<thead> \
					<tr> \
					<td class = "div_table_award_overview_th">Book ID</td> \
					<td class = "div_table_award_overview_th">Role</td> \
					<td class = "div_table_award_overview_th">Book or Chapter</td>\
					<td class = "div_table_award_overview_th">Book Title</td>\
					<td class = "div_table_award_overview_th">Book Edition</td>\
					<td class = "div_table_award_overview_th">Authors</td>\
					<td class = "div_table_award_overview_th">Chapters</td>\
					<td class = "div_table_award_overview_th">Publisher Name</td>\
					<td class = "div_table_award_overview_th">ISBN</td>\
					<td class = "div_table_award_overview_th">Book Date</td>\
					</tr> \
				</thead>\
        			<tbody id="table_body">\
        			</tbody>\
				</table>\
    			<br>\
    			<br>\
    			<input type="button" class="form_button_register_page_submit" value="Generate PDF"  style="margin-left:75%; margin-top: 8%; outline:none" onClick="delete_data()">';
				tableBody = document.getElementById("table_body");
				for (i = 0; i < data.length - 1; i+=10) {
   					 var tr = document.createElement('TR');
    				 for (j = i; j < i+10; j++) {
        				var td = document.createElement('TD');
        				td.appendChild(document.createTextNode(data[j]));
						if(j == i)
						{	aid_array.push(data[j]);
						}
						tr.appendChild(td);
    				 }
					 var chk = document.createElement("input");
						chk.type = "checkbox";
						chk.id = i;
						chk.name = "to_delete";
					 	//chk.value = i/7;
					 tr.appendChild(chk);	
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
	 //$('#tt').tableExport({type:'pdf',pdfFontSize : '7', escape:'false'});	
	 del_array = [];	
	 var i = 0;
     $('#table_body').find('tr').each(function () {
        var row = $(this);
        if (row.find('input[type="checkbox"]').is(':checked')) {
            del_array.push(aid_array[i]);
        }
		i++;

	});
	alert(del_array);
	var jsonString = JSON.stringify(del_array);
	//if(confirm("Are you sure you want to delete?")){
	$.ajax({
		  type: "POST",
		  url: "individual/Book/book_generate_report_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			alert(data);
			
		});
	}	
</script>