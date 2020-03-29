<script type='text/javascript' >
	var consultancy_id;
	var collab_num=1;
		var faculty_num=1;
		var student_num=1;
	function addCollab()
	{
		collab_num++;
		
		$("#div_collaboration").append('<span class= "div_award_field_text">Collaboration ' + collab_num+ '</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="collab" id="collaboration'+collab_num+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	function addFaculty()
	{
		faculty_num++;
		$("#div_faculty").append('<span class= "div_award_field_text">Faculty ' + faculty_num+ '</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="faculty" id="faculty'+faculty_num+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
	}
	function addStudent()
	{
		student_num++;
		$("#div_student").append('<span class= "div_award_field_text">Student ' + student_num+ ' USN</span>\
        <span id="star">*</span>\
        <input class="award_form_input" type=name name="student" id="student'+student_num+'" size=40 maxlength=40>\
		<br \>\
		<br \>');
		
		
	}
	
	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}

	
	function consultancy_select(consultancy_value)
	{
		collab_num=1;
		faculty_num=1;
		student_num=1;
	
		consultancy_id = consultancy_value
		$.ajax({
		  type: "POST",
		  url: "individual/Consultancy/consultancy_fetch.php",
		  data: {consultancy_value:consultancy_value }
		}).done(function( data ) {
			
			var tmp = data.split(";");
			//$("#community_update_select").val(tmp[0]);
			var x=0
			$("#work_title").val(tmp[x++]);
			$("#start_date").val(tmp[x++]);
			$('#end_date').val(tmp[x++]);
			$("#revenue_generated").val(tmp[x++]);
			$("#summary").val(tmp[x++]);
			$("#labs_allocated").val(tmp[x++]);
			$("#url").val(tmp[x++]);
			var lim=tmp[x++];
			document.getElementById("div_collaboration").innerHTML = "";
			for(var i =1;i<=lim;i++)
			{
				
				if(i>=2)
					addCollab();
				$('#collaboration'+ (i)).val(tmp[x++])
			}
			
			lim=tmp[x++];
			document.getElementById("div_faculty").innerHTML = "";
			for(var i =1;i<=lim;i++)
			{
				
				if(i>=2)
					addFaculty();
				$('#faculty'+ (i)).val(tmp[x++])
			}
			lim=tmp[x++];
			document.getElementById("div_student").innerHTML = "";
			for(var i =1;i<=lim;i++)
			{
				
				if(i>=2)
					addStudent();
				$('#student'+ (i)).val(tmp[x++])
			}
		  });
	}
	

	function formsubmit()
	{	
		var flag = 1;
		var client = $("#client").val();
		var work_title = $("#work_title").val();
		var collaborations=new Array();
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		var revenue_generated = $("#revenue_generated").val();
		var summary = $("#summary").val();
		var labs_allocated = $("#labs_allocated").val();
		var url = document.getElementById('url');
		var facultys = new Array();
		var students = new Array();
		var numExp = /[0-9]*/;
		
		if (client =='')
		{
			alert('Please enter the Name of the Client');
			document.getElementById("client").focus();
			document.getElementById("client").select();
			flag = 0;
		}
		
		if (revenue_generated =='')
		{
			alert('Please enter the revenue generated');
			flag = 0;
			document.getElementById("revenue_generated").focus();
			document.getElementById("revenue_generated").select();
		}
		
		
		if (work_title == '' )
		{
			alert('Please enter the Name of the Work Agency');
			flag = 0;
			document.getElementById("work_title").focus();
			document.getElementById("work_title").select();
		}
		
		if (start_date == '' )
		{
			alert('Please enter the start date');
			flag = 0;
			document.getElementById("start_date").focus();
			document.getElementById("start_date").select();
		}
		if (end_date == '' )
		{
			alert('Please enter the end date');
			flag = 0;
			document.getElementById("end_date").focus();
			document.getElementById("end_date").select();
		}
		if (revenue_generated == '' || !numExp.test(revenue_generated))
		{
			alert('Please enter the revenue generated');
			flag = 0;
			document.getElementById("revenue_generated").focus();
			document.getElementById("revenue_generated").select();
		}
		if (summary == '' )
		{
			alert('Please enter the summary');
			flag = 0;
			document.getElementById("summary").focus();
			document.getElementById("summary").select();
		}
		if (labs_allocated == '' )
		{
			alert('Please enter the labs allocated');
			flag = 0;
			document.getElementById("labs_allocated").focus();
			document.getElementById("labs_allocated").select();
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
		var z=1;
		for(i = 1; i <= collab_num; i++)
		{
				if(document.getElementById('collaboration'+i).value!="")
					collaborations[z++] = document.getElementById('collaboration'+i).value;
		}
		collaborations[0] = z-1;
		z=1;
		for(i = 1; i <= faculty_num; i++)
		{
				if(document.getElementById('faculty'+i).value!="")
					facultys[z++] = document.getElementById('faculty'+i).value;
		}
		facultys[0] = z-1;
		z=1;
		for(i = 1; i <= student_num; i++)
		{
				if(document.getElementById('student'+i).value!="")
					students[z++] = document.getElementById('student'+i).value;
		}
		students[0] = z-1;
		if (collaborations[0] == 0 )
		{
			alert('Please enter the collaboration');
			flag = 0;
		}
		if (facultys[0] == 0  )
		{
			alert('Please enter the faculty');
			flag = 0;
		}
		if (students[0] == 0  )
		{
			alert('Please enter the student');
			flag = 0;
		}
		var collaborations_jsonstring = JSON.stringify(collaborations);
		var facultys_jsonstring = JSON.stringify(facultys);
		var students_jsonstring = JSON.stringify(students);
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Consultancy/consultancy_delete_others_back.php',
				data: {data:consultancy_id}
			}).done(function(data){
				//alert(data);
			});
			
			$.ajax({
				type: 'POST',
				url : 'Consultancy/consultancy_update_back.php',
				data: {consultancy_id:consultancy_id, work_title:work_title, start_date:start_date, end_date:end_date, revenue_generated:revenue_generated, summary:summary, labs_allocated:labs_allocated, url:url, collaborations_jsonstring:collaborations_jsonstring, facultys_jsonstring:facultys_jsonstring, students_jsonstring:students_jsonstring},
			}).done(function(data){
				//alert(data);
				if(data == ''){
						alert("Consultancy Information updated");
				}
				else
				{
					alert("Some problem occurred");
				}
				
			});
		}
				
	}
		
		
	
</script>
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of Consultancy you are part of</b></p>

		<span class= "div_book_field_text">Name of Client</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			error_reporting(E_ALL ^ E_DEPRECATED);
			echo "<select class = 'award_form_select' name = 'text' id = 'consultancy_update_select' onChange='consultancy_select(this.value)'>";
			include("../../../db/db.php");
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			$id = $_SESSION['faculty_id'];
			$query = "SELECT * FROM consultancy where id = '$id'";
	    	$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			echo "<option value =".$row['consultancy_id'].">".$row['client']."</option>";
			echo "<script> 
					consultancy_select(".$row['consultancy_id'].");
			</script>";
			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['consultancy_id'].">".$row['client']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
   
   <span class= "div_book_field_text">Work Title</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="work_title" id="work_title" size=80 maxlength=80 required="required">
        <br/>
        <br/>
        
        
        <span class= 'div_award_field_text'>Collaboration 1</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='collaborations' id='collaboration1' size=40 maxlength=40 required="required">
        <br/>
        <br/>
        <div id="div_collaboration">
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add Collaboration" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addCollab()">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Start Date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="start_date" id="start_date" required="required">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">End Date</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="end_date" id="end_date" required="required">
        <br/>
        <br/>
        
        
        <span class= 'div_award_field_text'>Faculty 1</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='faculty' id='faculty1' size=40 maxlength=40 required="required">
        <br/>
        <br/>
        <div id="div_faculty">
        
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add Faculty" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addFaculty()">
        <br/>
        <br/>
    
    	
        <span class= 'div_award_field_text'>Student 1 USN</span>
        <span id="star">*</span>
        <input class='award_form_input' type=name name='student' id='student1' size=40 maxlength=40 required="required">
        <br/>
        <br/>
        <div id="div_student">
        </div>
        <br />
        <input class='form_button_register_page_submit' type="button" Value="Add Student" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addStudent()">
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Revenue Generated</span>
        <span id="star">*</span>
        <input class="book_form_input" type="text" name="revenue_generated" id="revenue_generated" required="required">
        <br/>
        <br/>

        <span class= "div_book_field_text">Summary</span>
        <textarea class="community_form_textarea" rows="3" cols="31" id="summary"></textarea>
        <br/>
        <br/>
        <span class= "div_book_field_text">Labs Allocated</span>
        <input class="book_form_input" type="text" name="labs_allocated" id="labs_allocated">
        <br/>
        <br/>
        <span class= "div_book_field_text">URL</span>
        <input class="book_form_input" type="text" name="url" id="url">
        <br/>
        <br/>
        <br />
        <br />
		<br />
		<span style="color:red; margin-left:2em;">Fields with * are Mandatory</span>
    
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:80%; margin-top: 8%; outline:none' onClick="formsubmit()">


		<br \>
        <br \>
        <br \>
        <br \>

</form>
