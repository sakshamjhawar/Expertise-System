<script type='text/javascript' >
	var aid;
	function award_select(award_value)
	{
		//alert("award_value = "+award_value);
		aid = award_value;
		$.ajax({
		  type: "POST",
		  url: "Award/award_fetch.php",
		  data: { award_value:award_value }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split("|");
			$("#agency").val(tmp[0]);
			$("#myDate").val(tmp[1]);
			$('#url').val(tmp[2]);
			$("#rmk").val(tmp[3]);
		  });
	}
	function isUrl(s) {
   		var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  		return regexp.test(s);
	}
	/*
	
	function upload(){
		alert("hi");
			$.ajax({
		  type: "POST",
		  url: "ajaximage_update.php",
		  data: { aid:aid }
		}).done(function( data ) {
			//alert(data);
			if(data != "")
			{
				alert(data);
			}
		  });
		
	}*/
	
		
	function formsubmit()
	{
		
		var flag = 1;
		var agency = $("#agency").val();
		
		var date = $("#myDate").val();
	
		var url = $("#url").val();
		var rmk = $("#rmk").val();
		
		
		
		
		if (agency == '' || agency == undefined)
		{
			alert('Please enter the Name of the Agency');
			flag = 0;
		}
		
		if (date == '' || date == undefined)
		{
			alert('Please enter the date of the Award');
			flag = 0;
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
		

		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Award/award_update_back.php',
				data: {agency:agency, date:date, url:url, rmk:rmk, aid:aid},
				
			}).done(function(data){
				alert(data);
				if(data == ""){
						alert("Award Information updated");
				}
				else
				{
					alert("Some problem occurred");
				}
				
			});
		}
				
	}

</script>
<script type="text/javascript" >
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
</script>
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of the awards to be updated</b></p>
	

		<span class= 'div_award_field_text'>Name of Award</span>
        <span id='star'>*</span>
        
        <?php
			error_reporting(E_ALL ^ E_DEPRECATED);
			session_start();
			echo "<select class = 'award_form_select' name = 'aname' id = 'award_update_select'  onChange='award_select(this.value)'>";
			include("../../../db/db.php");
	
			if(!mysql_select_db('college site'))
			{
				//die(mysql_error());
				echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
				//return false;
			}
			else
			{
					//$id = 'I4iA41flS';
					$id = $_SESSION['faculty_id'];
					$query = "SELECT * FROM award where id = '$id'";
					$result = mysql_query($query);
					if(!$result)
					{
						echo '<script type="text/javascript">alert("Some problem occured. Please try again later.")</script>';
					}
					while($row = mysql_fetch_array($result))
					{
						echo "<option value =".$row['award_id'].">".$row['award_name']."</option>";
					}
					echo "</select>";
			}
			mysql_close($con);
		?>
        
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Name of Agency</span>
        <span id='star'>*</span>
        <input class='award_form_input' type=text name='agency' id='agency' size=80 maxlength=80>
        <br/>
        <br/>

		<span class= 'div_award_field_text'>Date</span>
        <span id='star'>*</span>
	
    
    <input class = "award_form_input" type="date" name = "adate" id="myDate" value="2014-02-09">
 
    
    <br \>
    </br>
    
    
		<span class= 'div_award_field_text'>URL</span>
        <input class='award_form_input' type=name name='url' id='url' size=100 maxlength=100>
        <br/>
        <br/>
        
        <span class= 'div_award_field_text'>Remarks</span>
        <input class='award_form_input' type=name name='rmk' id='rmk' size=100 maxlength=100>
        <br/>
        <br/>
        <form id="imageform" method="post" enctype="multipart/form-data" action="ajaximage_update.php">
		<span class= "div_award_field_text">Upload Images(if any)</span>
        <div class='div_award_field_text' id="imageloadstatus" style="display:none"><img src="" alt="Uploading...."/></div>
        <div id="imageloadbutton">
        <p class='div_award_field_text'>
        <input type="file" name="photoimg" id="photoimg" />
        </p>
    
        </div>
        </form>

      <!-- <input style=' margin-left:7.5em' type='file' id='file' name='support_images[]' multiple accept='image/*'>-->
        <div class='div_award_field_text' id="preview"></div>
        <br>
        
        <span class= 'div_award_field_text' style='color:red; margin-left:2.5em;'>Fields with * are Mandatory</span>
        <input type='button' class='form_button_register_page_submit' value='Submit' onClick="formsubmit()" style='margin-left:75%; margin-top: 8%; outline:none'>

		

</div>
</form>