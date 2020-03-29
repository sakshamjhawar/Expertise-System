<form>
<p class="div_book_field_text" style="color:red; display: block;"><b>Enter the details of Books or Chapters published</b></p>

	<span class= "div_book_field_text">Role</span>
        <span id="star">*</span>
	
    	<select name="role" id="role" class="book_form_select">
		<option value="-1">Role</option>
		<option value="Editor">Editor</option>
		<option value="Author">Author</option>
		<option value="Reviewer">Reviewer</option>
        <option value="Co-Author">Co-Author</option>
		<option value="Others">Others</option>
		</select>
        <br />
        <br />
        
	<span class= "div_book_field_text" >Book or Chapter</span>
        <span id="star">*</span>
	<select name="bc" id="book_or_chapter" class="book_form_select">
	<option value="Book">Book</option>
	<option value="Chapter">Chapter</option>
	</select>
        <br />
        <br />
        
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
        
        <span class= "div_book_field_text">Edition of the Book (Enter the Edition number)</span>
        <input class="book_form_input" type="number" name="edition" id="book_edition" size=2 maxlength=2 min="1">
        <br/>
        <br/>
        
        <div id="book_authors">
        <span class= "div_book_field_text">Author 1</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="author1" id="author1" size=25 maxlength=25>
        <br/>
        <br/>
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
        <input class="book_form_input" type="text" name="isbn" id="isbn" size=30 maxlength=20>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Date of Publishing</span>
        <input class="book_form_input" type="date" name="date_of_publishing" id="date_of_publishing" size=20 maxlength=20>
        <script>
		document.getElementById('date_of_publishing').value = new Date().toISOString().substring(0, 10);
		</script>
        <br/>
        <br/>
       

		<br/>


		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>

<script type="text/javascript">
	no_of_authors = 1;
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


	function formsubmit()	
	{
		var role = document.getElementById('role');
		var book_or_chapter = document.getElementById('book_or_chapter');
		var book_title = document.getElementById('book_title');
		var book_edition = document.getElementById('book_edition');
		var publisher_name = document.getElementById('publisher_name');
		var isbn= document.getElementById('isbn');
		var book_date = document.getElementById('date_of_publishing');
		var flag = 1;
		var authors = new Array();
		var chapters = new Array();
		var alphaExp = /^[a-zA-Z ]*$/;
		
		if(role.value == "-1" )
		{
			alert('Please select a role');
			flag = 0;
			role.focus();
			role.select();
			return false;
		}
			
		if (book_title.value == "" )
		{
			alert('Please enter title');
			book_title.focus();
			book_title.select();
			flag = 0;
			return false;
		}
		
		if (author1.value == "" )
		{
			alert('Please enter Author 1');
			author1.focus();
			author1.select();
			flag = 0;
			return false;
		}
		
		if (publisher_name.value == "" )
		{
			alert('Please enter Publisher');
			publisher_name.focus();
			publisher_name.select();
			flag = 0;
			return false;
		}
		
		if (book_date.value == "" )
		{
			alert('Please enter the date');
			flag = 0;
			book_date.focus();
			book_date.select();
			return false;
		}
		
		authors[0] = no_of_authors;
		for(i = 1; i <= no_of_authors; i++)
		{
				authors[i] = document.getElementById('author'+i).value;
		}
		
		chapters[0] = no_of_chapters;
		for(i = 1; i <= no_of_chapters; i++)
		{
				chapters[i] = document.getElementById('chapter'+i).value;
		}
		
		var authors_jsonstring = JSON.stringify(authors);
		var chapters_jsonstring = JSON.stringify(chapters);
		//alert(role.value)
		
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Book/book_insert_back.php',
				data: {role : role.value, book_or_chapter : book_or_chapter.value, book_title : book_title.value,  book_edition:book_edition.value, publisher_name : publisher_name.value, isbn : isbn.value, book_date : book_date.value, authors : authors_jsonstring, chapters : chapters_jsonstring},
			}).done(function(data){
				if(data == ''){
						alert("Book Information added");
				}
				else
				{
					alert("data = "+data);
					alert("Some problem occurred");
				}
				
			});
		}
		
		
	}
</script>




