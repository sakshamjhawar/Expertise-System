<?php
include("../../../db/db.php");
session_start();
$session_id=$_SESSION['faculty_id']; //$session id
?>




<!--<div class='div_award_main'>-->

<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of awards you have recieved</b></p>

		<span class= 'div_award_field_text'>Name of the award</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='aname' id='aname' maxlength=50 required>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Name of Agency</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=name name='agency' id='agency' size=80 maxlength=80 required>
        <br/>
        <br/>

		<span class= 'div_award_field_text'>Date</span>
        <span id='star'>*</span>
    <input class = "award_form_input" type="date" id="myDate"  required="required">
    <script>
		document.getElementById('myDate').value = new Date().toISOString().substring(0, 10);
	</script>
    
    <br >
    </br>
    
    
		<span class= 'div_award_field_text'>URL</span>
        <input class='award_form_input' type=name name='url' id='url' size=100 maxlength=100>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Remarks</span>
        <input class='award_form_input' type=name name='rmk' id='rmk' size=100 maxlength=100>
        <br/>
        <br/>
        
        <!-------->
       <form id="award_images_form" method="post" enctype="multipart/form-data">
       		<span class= 'div_award_field_text'>Award Images</span>
        	<input type="file" id="award_images_input" name = 'file[]' multiple/>
	   </form>
            
               
        <span class= 'div_award_field_text' style='color:red; margin-left:2.5em;'>Fields with * are Mandatory</span>
           
        <input type="button" class='form_button_register_page_submit' value='Submit' style='margin-left:75%; margin-top: 8%; outline:none' onClick="formsubmit()">

<!--</div>-->
<!--script type="text/javascript" >

$(document).ready(function() { 
		
            $('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('v');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
					console.log('z');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
							console.log('d');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        });
</script-->
<script type='text/javascript' >
function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}
	
function check_comma(s){
	if(s.charAt(s.length - 1) == ',')
		{
			//alert(s);
			//alert(s.charAt(s.length - 1));
			s = s.substr(0, s.length-1) 
			//alert(s);
			return s;
		}
	else
		return s;
}

	function formsubmit()
	{
		var flag = 1;
		var aname = $("#aname").val();
		var agency = $("#agency").val();
		var date = $("#myDate").val();
		var url = $("#url").val();
		var rmk = $("#rmk").val();
		
		if (aname =='')
		{
			alert('Please enter the Name of the Award');
			flag = 0;
			document.getElementById("aname").focus();
			document.getElementById("aname").select();
			return false;
		}
		
		
		if (agency == '' )
		{
			alert('Please enter the Name of the Agency');
			flag = 0;
			document.getElementById("agency").focus();
			document.getElementById("agency").select();
			return false;
		}
		
		if (date == '' )
		{
			alert('Please enter the date of the Award');
			flag = 0;
			document.getElementById("myDate").focus();
			document.getElementById("myDate").select();
			return false;
		}
		
		//var url1 = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
		
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
		
		agency = check_comma(agency);
		url = check_comma(url);
		rmk = check_comma(rmk);


		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Award/award_insert_back.php',
				data: {aname:aname, agency:agency, date:date, url:url, rmk:rmk},
			}).done(function(data){
				//alert("Hi"+data);
				if(!isNaN(data)){
						
						
						//aid = data;
						upload_file(data);
						//alert("hello"+aid);
				}
				else
				{
					//alert("data = ", data);
					alert("Some problem occurred. Please try again later.");
					
				}
				
			});
		}
	}
	

	function upload_file(aid)
	{
		var form = document.getElementById('award_images_form');
		var fileSelect = document.getElementById('award_images_input');
		var file = fileSelect.files;
		var form_data = new FormData();
		//alert(file.length);
		for(var i = 0; i < file.length; i++)
		{
			
			if(!file[i].type.match("image"))
			{	
				alert("File " + i + 1 + " is not an image");
				return;
			}	
			form_data.append('file[]', file[i]); 
		}
		form_data.append('type', 'award');
		form_data.append('aid', aid);
		//alert("Bye"+aid);			
		
		$.ajax({
			url: "../../php/upload/file_upload.php", // Url to which the request is send
			type: "POST",
			contentType: false,
			processData: false,             // Type of request to be send, called as method
			cache : false,
			data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		}).done( function(d){
			alert("Award Information added");
			//alert(d);
			//alert("Gamma"+d);
		});		
	}

</script>
