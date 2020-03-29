
<script type="text/javascript">
	var journal_id;
	no_of_authors = 1;
	
	
	function add_authors()
	{
		no_of_authors++;
		$("#journal_authors").append('<span class= "div_award_field_text"> Author ' + no_of_authors+ '</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="collab" id="author'+no_of_authors+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	function hide_unhide()
	{
		//alert("hi");
		if(document.getElementById("paper_associated_project").value == 'Yes')
		{
			document.getElementById('project_name').hidden=false;
			document.getElementById('project_text1').hidden=false;
			
		}
		else
		{
			document.getElementById('project_name').hidden=true;
			document.getElementById('project_text1').hidden=true;
			document.getElementById('project_name').innerHTML = '';
		}
	}
	
	function journal_select(conference_value)
	{
		no_of_authors = 1;
		journal_id = conference_value
		
		document.getElementById("journal_authors").innerHTML = "";
		$.ajax({
		  type: "POST",
		  url: "Journals/journal_fetch.php",
		  data: { conference_value:conference_value }
		}).done(function( data ) {
			
			var tmp = data.split(";");
			$("#journal_type").val(tmp[0]);
			$("#research_area").val(tmp[1]);
			$('#paper_associated_project').val(tmp[2]);
			$("#project_name").val(tmp[3]);
			hide_unhide(tmp[2]);
			$("#paper_title").val(tmp[4]);
			var temp = tmp[5].split(',');
			for(var i = 1; i <= temp[0]; i++)
			{
				if(i!=1)
					add_authors();
				$("#author"+i).val(temp[i]);	
			}
				
			$("#volume").val(tmp[6]);
			$("#issue").val(tmp[7]);
			$("#impact_factor").val(tmp[8]);
			$("#citation_index").val(tmp[9]);
			$("#from_page").val(tmp[10]);
			$("#to_page").val(tmp[11]);
			$("#abstract").val(tmp[12]);
			$("#keywords").val(tmp[13]);
			$("#url").val(tmp[14]);
			$("#journal_month").val(tmp[15]);
			$("#journal_year").val(tmp[16]);
		  });
	}
	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}
	
	function formsubmit()
	{	
		var journal_name = document.getElementById('journal_name');
		var journal_type = document.getElementById('journal_type');
		var research_area = document.getElementById('research_area');
		var paper_associated_project = document.getElementById('paper_associated_project');
		var project_name = document.getElementById('project_name');
		var paper_title = document.getElementById('paper_title');
		 
		var abstract = document.getElementById('abstract');
		var keywords = document.getElementById('keywords');
		var volume= document.getElementById('volume');
		var issue = document.getElementById('issue');
		var citation_index= document.getElementById('citation_index');
		var impact_factor = document.getElementById('impact_factor');
		
		var from_page = document.getElementById('from_page');
		var to_page = document.getElementById('to_page');
		var journal_month = document.getElementById('journal_month');
		var journal_year = document.getElementById('journal_year');
		var url = document.getElementById('url');
		
		var numExp = /[0-9]*/;
		var date1 = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
		var url1 = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
		
		var flag = 1;		
		if (journal_type.value == "" )
		{
			alert('Please enter the journal type');
			journal_type.focus();
			journal_type.select();
			flag = 0;
		}


		if (abstract.value == "" )
		{
			alert('Please enter the abstract');
			abstract.focus();
			abstract.select();
			flag = 0;
		}
		if(from_page.value > to_page.value)
		{
			alert('Please enter valid Page numbers');
			from_page.focus();
			from_page.select();
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
		if (volume.value == "" )
		{
			alert('Please enter volume');
			volume.focus();
			volume.select();
			flag = 0;
		}
	
		if (issue.value == "" )
		{
			alert('Please enter issue');
			issue.focus();
			issue.select();
			flag = 0;
		}
		
	
		
		if (author1.value == "" )
		{
			alert('Please enter the Name of author1');
			author1.focus();
			author1.select();
			flag = 0;
		}
		
	
		
		
		if (journal_name.value == "" )
		{
			alert('Please enter the Journal name');
			journal_name.focus();
			journal_name.select();
			flag = 0;
		}
		
		if (keywords.value == "" )
		{
			alert('Please enter the keywords');
			keywords.focus();
			keywords.select();
			flag = 0;
		}

		if (paper_title.value == "" )
		{
			alert('Please enter the paper title');
			paper_title.focus();
			paper_title.select();
			flag = 0;
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
			
			$.ajax({
				type: 'POST',
				url : 'Journals/journal_update_back.php',
				data: {journal_id: journal_id,
					journal_name: journal_name.value,
				 journal_type: journal_type.value, 
				 paper_associated_project: paper_associated_project.value,
				  project_name: project_name.value,
				   research_area: research_area.value,
				    abstract: abstract.value,
					 keywords: keywords.value,
					  volume: volume.value, 
					  issue: issue.value, 
					  impact_factor: impact_factor.value, journal_year: journal_year.value,
					    citation_index: citation_index.value,
						 journal_month: journal_month.value,
						  url: url.value, 
						  from_page: from_page.value, 
						  to_page: to_page.value, 
						  paper_title: paper_title.value, 
						  authors: authors_jsonstring} 
			}).done(function(data){
				if(data == ''){
						alert("Journal Information updated");
				}
				else
				{
					alert("data = "+data);
					alert("Some problem occurred");
				}
				
			});
		}
		
		
		else
		{
			alert("Something wrong");
		}
		
	}
	
</script>

<form>

		

<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of the journal</b></p>

		<span class= "div_book_field_text">Journal Name</span>
        <span id="star">*</span>
        
        <?php
			//session_start();
			include("../../../db/db.php");
			error_reporting(E_ALL ^ E_DEPRECATED);
			echo "<select class = 'book_form_select' name = 'journal_name_name' id = 'journal_name' onChange='journal_select(this.value)'>";
	
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			$id = $_SESSION['faculty_id'];
			//$id = 'I4iA41flS';
			$query = "SELECT * FROM journal where id = '$id'";
	    	$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			echo "<option value =".$row['journal_id'].">".$row['journal_name']."</option>";
			echo "<script> journal_select('".$row['journal_id']."'); </script>";
			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['journal_id'].">".$row['journal_name']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Journal Type</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='journal_type' id='journal_type' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Research area</span>
        <input class='award_form_input' type=name name='research_area' id='research_area' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
       <span class= "div_conference_field_text">Is Paper Associated with Project?</span>
    <span id="star">*</span>
    <select name="paper_associated_project" id="paper_associated_project" class="conference_form_select" onchange="hide_unhide()">
	<option value="Yes">Yes</option>
	<option value="No">No</option>
	</select>
	<br>
    <br>
    <script>
		hide_unhide();
	</script>
         <span class= 'div_award_field_text' id = "project_text1">Project name</span>
        <input class='award_form_input' type=name name='project_name' id='project_name' size=100 maxlength=100 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text' >Paper Title</span>
          <span id='star'>*</span>
        <input class='award_form_input' type=name name='paper_title' id='paper_title' size=1000 maxlength=1000 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Abstract</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='abstract' id='abstract' size=100 maxlength=100 required="required">
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Keywords</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='keywords' id='keywords' size=30 maxlength=30 required="required">
        <br/>
        <br/>
        
       
        <span class= 'div_award_field_text'>Author 1</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='author1' id='author1' size=40 maxlength=40>
        <br/>
        <br/>
         <div id="journal_authors">
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add author" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="add_authors()">
        <br/>
        <br/>
    
    
		<span class= 'div_award_field_text'>Volume</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='volume' id='volume' size=11 maxlength=11>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Issue</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='issue' id='issue' size=11 maxlength=11>
        <br/>
        <br/>
        
		<span class= 'div_award_field_text'>Impact factor</span>
        <input class='award_form_input' type=name name='impact_factor' id='impact_factor' size=100 maxlength=100>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>Citation Index</span>
        <input class='award_form_input' type=name name='citation_index' id='citation_index' size=40 maxlength=40>
        <br/>
        <br/>
        
        
        <span class= 'div_award_field_text'>From page</span>
        <input class='award_form_input' type=name name='from_page' id='from_page' size=11 maxlength=11>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>To page</span>
        <input class='award_form_input' type=name name='to_page' id='to_page' size=11 maxlength=11>
        <br/>
        <br/>
        <span class= 'div_award_field_text'>Journal month</span>
      <select name="paper_associated_project" id="journal_month" class="conference_form_select" >
	<option value="January">January</option>
	<option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
    
	</select>
    
	<br/>
    <br/>
        <span class= 'div_award_field_text'>Journal year</span>
        <?php
			echo "<select class = 'book_form_select' name = 'journal_name_name' id = 'journal_year' >";
			for($i=1960;$i<2050;$i++)
				echo '<option value='.$i.'>'.$i.'</option>';
			echo '</select>'
			
		?>
        <br/>
        <br/>
        <br/>
        
         <span class= 'div_award_field_text'>Url</span>
        <input class='award_form_input' type=name name='url' id='url' size=100 maxlength=100>
        <br/>
        <br/>
        
        
        
        <span style='color:red; margin-left:2em;'>Fields with * are Mandatory</span>
           
        <input type="button" class="form_button_register_page_submit_conference" name='sub' value="Submit" style="margin-left:75%; 	margin-top: 8%; outline:none" onclick="formsubmit()">

</form>

