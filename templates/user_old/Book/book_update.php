<form>
		<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of the books to be updated</b></p>
		<span class= "div_book_field_text">Title of the Book</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			echo "<select class = 'book_form_select' name = 'aname' id = 'book_update_select' onChange='book_select(this.value)'>";
			include("../../../db/db.php");
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			$id = $_SESSION['faculty_id'];
			//$id = 'I4iA41flS';
			$query = "SELECT * FROM book where id = '$id'";
	    	$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['book_id'].">".$row['book_title']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
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
        
        <span class= "div_book_field_text">Date of Publishing</span>
        <input class="book_form_input" type="date" name="book_date" id="book_date">
        <br/>
        <br/>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>
<script type='text/javascript' >
	var book_id;
	
	
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
	}
	
	function add_chapters()
	{
		no_of_chapters++;
		$("#book_chapters").append('<span class= "div_book_field_text">Chapter ' + no_of_chapters+ '</span>\
        <span id="star">*</span>\
        <input class="book_form_input" type=name name="chapters" id="chapter'+no_of_chapters+'" size=25 maxlength=25>\
		<br \>\
		<br \>');
	}
	
	function book_select(book_value)
	{
		no_of_authtors = 0;
		no_of_chapters = 0;
		book_id = book_value
		$.ajax({
		  type: "POST",
		  url: "Book/book_fetch.php",
		  data: { book_value:book_value }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split(";");
			$("#role").val(tmp[0]);
			$("#book_or_chapter").val(tmp[1]);
			$('#book_edition').val(tmp[2]);
			var temp = tmp[3].split(',');
			for(var i = 1; i <= temp[0]; i++)
			{
				add_authors();
				$("#author"+i).val(temp[i]);	
			}
			
			var temp = tmp[4].split(',');
			for(var i = 1; i <= temp[0]; i++)
			{
				add_chapters();
				$("#chapter"+i).val(temp[i]);	
			}
			
			
			$("#publisher_name").val(tmp[5]);
			$("#isbn").val(tmp[6]);
			$("#book_date").val(tmp[7]);
		  });
	}
	


	function formsubmit()	
	{
		var role = document.getElementById('role');
		var book_or_chapter = document.getElementById('book_or_chapter');
		var book_edition = document.getElementById('book_edition');
		var publisher_name = document.getElementById('publisher_name');
		var isbn= document.getElementById('isbn');
		var book_date = document.getElementById('book_date');
		var flag = 1;
		var authors = new Array();
		var chapters = new Array();
		var alphaExp = /^[a-zA-Z ]*$/;
		
		if(role.value == "-1" )
		{
			alert('Please select a role');
			flag = 0;
			return false;
		}
			
		
		if (author1.value == "" )
		{
			alert('Please enter author1');
			author1.focus();
			author1.select();
			flag = 0;
			return false;
		}
		
		if (publisher_name.value == "" )
		{
			alert('Please enter Publisher');
			pub_name.focus();
			pub_name.select();
			flag = 0;
			return false;
		}
		
		if (book_date.value == "" )
		{
			alert('Please enter the date');
			flag = 0;
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
				url : 'Book/book_update_back.php',
				data: {book_id: book_id, role : role.value, book_or_chapter : book_or_chapter.value,  book_edition:book_edition.value, publisher_name : publisher_name.value, isbn : isbn.value, book_date : book_date.value, authors : authors_jsonstring, chapters : chapters_jsonstring},
			}).done(function(data){
				if(data == ''){
						alert("Book Information Updated");
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
