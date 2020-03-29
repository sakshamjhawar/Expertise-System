

<form>
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of consultancy</b></p>

		<span class= 'div_award_field_text'>Name of the client</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='client' id='client' maxlength=80 required>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Work Title</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='work_title' id='work_title' size=1000 maxlength=1000 required>
        <br/>
        <br/>
		
		<div class="div_collaboration">
       
        </div>
        
        <input class='form_button_register_page_submit' type="button" Value="Add Collaboration" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addCollab()">
        <br/>
        <br/>
        
		<span class= 'div_award_field_text'>Start Date</span>
        <span id='star'>*</span>
    <input class = "award_form_input" type="date" id="start_date" required>
    <script>
	document.getElementById('start_date').value = new Date().toISOString().substring(0, 10);
	</script>
    
    <br />
    <br />
    <span class= 'div_award_field_text'>End Date</span>
        <span id='star'>*</span>
   		 <input class = "award_form_input" type="date" id="end_date" value="2014-02-09" required>
    		<script>
			document.getElementById('end_date').value = new Date().toISOString().substring(0, 10);
			</script>
   		 <br />
    	<br />
        
        <div class="div_faculty">
        
        </div>
        
        <input class='form_button_register_page_submit' type="button" Value="Add Faculty" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addFaculty()">
        <br/>
        <br/>
    
    	<div class="div_student">
        <!--<span class= 'div_award_field_text'>Student 1 USN</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='student' id='student1' size=40 maxlength=40 required>-->
       
        
        </div>
       
        <input class='form_button_register_page_submit' type="button" Value="Add Student" style='margin-left:75%; margin-top: 3%; margin-bottom:2%;width:10em; outline:none;' onClick="addStudent()">
        <br/>
        <br/>
    
    
		<span class= 'div_award_field_text'>Revenue Generated</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='revenue_generated' id='revenue_generated' size=15 maxlength=15 required>
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
        
        
        <span style='color:red; margin-left:2em;'>Fields with * are Mandatory</span>
           
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">
</form>
<script type='text/javascript' >
	var collab_num=0;
	var faculty_num=0;
	var student_num=0;
	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
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
		var url = $("#url").val();
		var facultys = new Array();
		var students = new Array();
		
		if (client =='')
		{
			alert('Please enter the Name of the Client');
			flag = 0;
			document.getElementById('client').focus();
			document.getElementById('client').select();
			return false;
		}	
		
		if (work_title == '' )
		{
			alert('Please enter the Name of the Work Agency');
			flag = 0;
			document.getElementById('work_title').focus();
			document.getElementById('work_title').select();
			return false;
		}
		
		
		if (start_date == '' )
		{
			alert('Please enter the start date');
			flag = 0;
			document.getElementById('start_date').focus();
			document.getElementById('start_date').select();
			return false;
		}
		
		if (end_date == '' )
		{
			alert('Please enter the end date');
			flag = 0;
			document.getElementById('end_date').focus();
			document.getElementById('end_date').select();
			return false;
		}
		
		
		if (revenue_generated =='')
		{
			alert('Please enter the Name of the Revenue generated');
			flag = 0;
			document.getElementById('revenue_generated').focus();
			document.getElementById('revenue_generated').select();
			return false;

		}
	
		collaborations[0] = collab_num;
		for(i = 1; i <= collab_num; i++)
		{
				collaborations[i] = document.getElementById('collaboration'+i).value;
		}
		facultys[0] = faculty_num;
		for(i = 1; i <= faculty_num; i++)
		{
				facultys[i] = document.getElementById('faculty'+i).value;
		}
		students[0] = student_num;
		for(i = 1; i <= student_num; i++)
		{
				students[i] = document.getElementById('student'+i).value;
		}
		if (url != '' )
		{
        	//alert('hi');
            //alert(url.value);
			if(!isUrl(url))
					{
							alert('Please enter valid URL');
							document.getElementById("url").focus();
							document.getElementById("url").select();	
                            flag = 0;
							return false;
					}
		}
		var collaborations_jsonstring = JSON.stringify(collaborations);
		var facultys_jsonstring = JSON.stringify(facultys);
		var students_jsonstring = JSON.stringify(students);
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Consultancy/consultancy_insert_back.php',
				data: {client:client, work_title:work_title, start_date:start_date, end_date:end_date, revenue_generated:revenue_generated, summary:summary, labs_allocated:labs_allocated, url:url, collaborations_jsonstring:collaborations_jsonstring, facultys_jsonstring:facultys_jsonstring, students_jsonstring:students_jsonstring},
			}).done(function(data){
				//alert(data);
				if(data == ''){
						alert("Consultancy Information added");
				}
				else
				{
					alert("Some problem occurred"+data);
				}
				
			});
		}
				
	}
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

</script>