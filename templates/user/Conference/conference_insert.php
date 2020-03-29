<form>
	<p class="div_conference_field_text" style="color:red; display: block;"><b>Enter the details of papers you have presented at the Conference</b></p>
	<span class= "div_conference_field_text">Type of the Conference</span>
    <span id="star">*</span>
	<select name="conference_type" id="conference_type" class="conference_form_select">
	<option value="National">National</option>
	<option value="International">International</option>
	</select>
	<br>
	<br>


	<span class= "div_conference_field_text">Research area</span>
    <span id="star">*</span>
	<input class="book_form_input" type=name name="research_area" id="research_area" >
	<br>
	<br>

	<span class= "div_conference_field_text">Is Paper Associated with Project?</span>
    <span id="star">*</span>
    <select name="paper_associated_project" id="paper_associated_project" class="conference_form_select" onchange="hide_unhide()">
	<option value="Yes">Yes</option>
	<option value="No">No</option>
	</select>
	<br>
    <br>

	<span class= "div_conference_field_text" id = "project_text">Project Name</span>
	<input class="book_form_input" type=name name="project_name" id="project_name" size=100 maxlength=100>
	<br><br>

	<span class= "div_conference_field_text">Title of the paper</span>
	<input class="book_form_input" type=name name="paper_title" id="paper_title" size=100 maxlength=100>
	<br><br>
    
    <div id="book_authors">
    	<span class= "div_book_field_text">Author 1</span>
    	<span id="star">*</span>
    	<input class="book_form_input" type=name name="author1" id="author1" >
    	<br/>
    	<br/>
    </div>
    
    <input type="button" class="form_button_register_page_submit" value="Add Author" style="margin-left:75%; outline:none" onClick="add_authors()">
        <br />
        <br />

	<span class= "div_conference_field_text">Name of the Conference</span>
	<span id="star">*</span>
	<input class="book_form_input" type=name name="conference_name" id="conference_name" size=100 maxlength=100>
	<br><br>

	<span class= "div_conference_field_text">Organizer</span>
	<input class="book_form_input" type=name name="organizer" id="organizer" size=50 maxlength=50>
	<br><br>

	<span class= "div_conference_field_text">From Date</span>
	<span id="star">*</span>
	<input class="book_form_input" type="date" name="fdate" id="from_date"></span>
    <script>
	document.getElementById('from_date').value = new Date().toISOString().substring(0, 10);
	</script>
	<br><br>

	<span class= "div_conference_field_text">To Date</span>
	<span id="star">*</span>
	<input class="book_form_input" type="date" name="to_date" id="to_date"></span>
    <script>
	document.getElementById('to_date').value = new Date().toISOString().substring(0, 10);
	</script>
	<br><br>

	<span class= "div_conference_field_text">Conference Venue</span>
	<span id="star">*</span>
	<input class="book_form_input" type=name name="venue" id="venue" size=25 maxlength=25>
	<br><br>

	<span class= "div_conference_field_text">From Page</span>
	<span id="star">*</span>
	<input class="book_form_input" type="number" name="from_page" id="from_page" size=10 min="0"  maxlength=10>
	<br><br>

	<span class= "div_conference_field_text">To Page</span>
	<span id="star">*</span>
	<input class="book_form_input" type="number" name="to_page" id="to_page" size=10 maxlength=10 min="0">
	<br><br>

	<span class= "div_conference_field_text">Abstract</span>
	<span id="star">*</span>
	<input class="book_form_input" type=name name="abstract" id="abstract" >
	<br><br>

	<span class= "div_conference_field_text">Keywords</span>
	<span id="star">*</span>
	<input class="book_form_input" type=name name="keywords" id="keywords" >
	<br><br>

	<span class= "div_conference_field_text">URL</span>
	<input class="book_form_input" type=name name="url" id="url" >
	<br><br>
	
	<form id="conference_files_form" method="post" enctype="multipart/form-data">
       		<span class= 'div_conference_field_text'>Conference Related Files</span>
        	<input type="file" id="conference_files_input" name = 'file[]' multiple/>
	</form>

	<span style="color:red; margin-left:2em; margin-top: 8%;">Fields with * are Mandatory</span>

	<input type="button" class="form_button_register_page_submit_conference" name='sub' value="Submit" style="margin-left:75%; 	margin-top: 8%; outline:none" onclick="formsubmit()">

</form>

<script type="text/javascript">
	
	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}

	
	no_of_authors = 1;
	
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
	
	function hide_unhide()
	{
		//alert("hi");
		if(document.getElementById("paper_associated_project").value == 'Yes')
		{
			document.getElementById('project_name').hidden=false;
			document.getElementById('project_text').hidden=false;
		}
		else
		{
			document.getElementById('project_name').hidden=true;
			document.getElementById('project_text').hidden=true;
		}
	}

	function formsubmit()
	{

		var conference_type = document.getElementById('conference_type');
		var research_area = document.getElementById('research_area');
		var paper_associated_project = document.getElementById('paper_associated_project');
		var project_name = document.getElementById('project_name');
		var paper_title = document.getElementById('paper_title');
		 
		var conference_ame = document.getElementById('conference_name');
		var organizer = document.getElementById('organizer');
		var from_date= document.getElementById('from_date');
		var to_date = document.getElementById('to_date');
		var venue = document.getElementById('venue');
		
		var from_page = document.getElementById('from_page');
		var to_page = document.getElementById('to_page');
		var abstract = document.getElementById('abstract');
		var keywords = document.getElementById('keywords');
		var url = document.getElementById('url');
		var file = document.getElementById('file');
		

		var numExp = /[0-9]*/;
		var date1 = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
				
		var flag = 1;		
		if (research_area.value == "" )
		{
			alert('Please enter the research area');
			research_area.focus();
			research_area.select();
			flag = 0;
			return false;
		}
		


		if (conference_name.value == "" )
		{
			alert('Please enter the conference name');
			conference_name.focus();
			conference_name.select();
			flag = 0;
			return false;
		}
		
		if (from_date.value == "" )
		{
			alert('Please enter Duration from (start date)');
			from_date.focus();
			from_date.select();
			flag = 0;
			return false;
		}
	
		if (to_date.value == "" )
		{
			alert('Please enter Duration from (start date)');
			to_date.focus();
			to_date.select();
			flag = 0;
			return false;
		}
			
		if (venue.value == "" )
		{
			alert('Please enter the venue of conference');
			venue.focus();
			venue.select();
			flag = 0;
			return false;
		}
		
		if (author1.value == "" )
		{
			alert('Please enter the Name of author1');
			author1.focus();
			author1.select();
			flag = 0;
			return false;
		}
		
	
		if(from_page.value == "")
		{
			alert('Please enter the From Page');
			from_page.focus();
			from_page.select();
			flag = 0;
			return false;
		}
		
		if(to_page.value == "")
		{
			alert('Please enter the To Page');
			to_page.focus();
			to_page.select();
			flag = 0;
			return false;
		}
		if(from_page.value > to_page.value)
		{
			alert('Please enter valid Page numbers');
			from_page.focus();
			from_page.select();
			flag = 0;
			return false;
		}
		
		if (abstract.value == "" )
		{
			alert('Please enter the abstract');
			abstract.focus();
			abstract.select();
			flag = 0;
			return false;
		}
		
		if (keywords.value == "" )
		{
			alert('Please enter the keywords');
			keywords.focus();
			keywords.select();
			flag = 0;
			return false;
		}

		if (url.value != '' )
		{
        	//alert('hi');
            //alert(url.value);
			if(!isUrl(url.value))
					{
							alert('Please enter valid URL');
							url.focus();
							url.select();	
                            flag = 0;
							return false;
					}
		}
		
		var authors = new Array();
		authors[0] = no_of_authors;
		for(i = 1; i <= no_of_authors; i++)
		{
				authors[i] = document.getElementById('author'+i).value;
		}
		var authors_jsonstring = JSON.stringify(authors);
		
		if(flag == 1)
		{
			//alert("hi");
			$.ajax({
				type: 'POST',
				url : 'Conference/conference_insert_back.php',
				data: {conference_type: conference_type.value, research_area: research_area.value, paper_associated_project: paper_associated_project.value, project_name: project_name.value, conference_name: conference_name.value, organizer: organizer.value, from_date: from_date.value, to_date: to_date.value, venue: venue.value, abstract: abstract.value, keywords: keywords.value, url: url.value, from_page: from_page.value, to_page: to_page.value, paper_title: paper_title.value, authors: authors_jsonstring} 
			}).done(function(data){
				//alert(data);
				if(!isNaN(data)){
						upload_files(data);
				}
				else
				{
					//alert("data = "+data);
					alert("Some problem occurred");
				}
				
			});
		}
		
		
		else
		{
			alert("Something wrong");
		}
		
	}
	
	function upload_files(cid)
	{
		var form = document.getElementById('conference_files_form');
		var fileSelect = document.getElementById('conference_files_input');
		var file = fileSelect.files;
		var form_data = new FormData();
		//alert(file.length);
		for(var i = 0; i < file.length; i++)
		{
			var sFileName = file[i].name;
			var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
			if(sFileExtension != 'pdf' && sFileExtension != 'doc' && sFileExtension != 'docx')
			{	
				alert("Only pdf, doc and docx files allowed");
				return;
			}	
			form_data.append('file[]', file[i]); 
		}
		form_data.append('type', 'conference');
		form_data.append('cid', cid);
		//alert("Bye"+aid);			
		
		$.ajax({
			url: "../../php/upload/file_upload.php", // Url to which the request is send
			type: "POST",
			contentType: false,
			processData: false,             // Type of request to be send, called as method
			cache : false,
			data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		}).done( function(d){
			alert("Conference Information added");
			//alert(d);
			//alert("Gamma"+d);
		});		
	}
</script>




