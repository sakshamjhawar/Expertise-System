<script type='text/javascript' >
	var governance_id;
	function governance_select(governance_value)
	{
		governance_id = governance_value
		$.ajax({
		  type: "POST",
		  url: "Governance/governance_fetch.php",
		  data: { governance_id:governance_id }
		}).done(function( data ) {
			//alert(data);
			var tmp = data.split("|");
			//$("#community_update_select").val(tmp[0]);
			$("#status_of_committee").val(tmp[1]);
			$('#served_from').val(tmp[2]);
			$("#served_to").val(tmp[3]);
			$("#role").val(tmp[4]);
			$("#responsibility").val(tmp[5]);
			
		  });
	}
	

	function formsubmit()	
	{
		
		var status_of_committee = document.getElementById('status_of_committee');
		var served_from = document.getElementById('served_from');
		var served_to = document.getElementById('served_to');
		var role = document.getElementById('role');
		var responsibility = document.getElementById('responsibility');
		var flag = 1;
		
		
			
		if (status_of_committee.value == "" )
		{
			alert('Please enter a status of committee');
			status_of_committee.focus();
			status_of_committee.select();
			flag = 0;
			return false;
		}
		
		if (role.value == "" )
		{
			alert('Please enter role');
			role.focus();
			role.select();
			flag = 0;
			return false;
		}
		
		
		if(flag == 1)
		{
			$.ajax({
				type: 'POST',
				url : 'Governance/governance_update_back.php',
				data: {governance_id:governance_id, status_of_committee:status_of_committee.value, served_from:served_from.value, served_to:served_to.value, role:role.value, responsibility:responsibility.value},
			}).done(function(data){
				if(data == ''){
						alert("Governance Information added");
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
<p class='div_award_field_text' style='color:red; display: block;'><b>Enter the details of Governance</b></p>

		<span class= "div_book_field_text">Name of Commitee</span>
        <span id="star">*</span>
        
        <?php
			session_start();
			echo "<select class = 'award_form_select' name = 'text' id = 'fep_update_select' onChange='governance_select(this.value)'>";
			include("../../../db/db.php");
		error_reporting(E_ALL ^ E_DEPRECATED);
		
	
			if(!mysql_select_db('college site'))
			{
				die(mysql_error());
				return false;
			}
			//$id = 'I4iA41flS';
			$id = $_SESSION['faculty_id'];
			$query = "SELECT * FROM governance where id = '$id'";
	    	$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			echo "<option value =".$row['governance_id'].">".$row['name_of_committee']."</option>";
			echo "<script> 
					governance_select(".$row['governance_id'].");
			</script>";

			while($row = mysql_fetch_array($result))
			{
				echo "<option value =".$row['governance_id'].">".$row['name_of_committee']."</option>";
			}
			echo "</select>";
			mysql_close($con);
		?>
        
        <br/>
        <br/>
   
   <span class= "div_book_field_text">Status of committee</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="status_of_committee" id="status_of_committee" size=80 maxlength=80 required>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Served From</span>
        <span id="star">*</span>
        <input class="book_form_input" type="date" name="served_from" id="served_from" required>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Served till</span>
        <input class="book_form_input" type="date" name="served_to" id="served_to">
        <br/>
        <br/>
        
       
        
        <span class= "div_book_field_text">Role</span>
        <span id="star">*</span>
        <input class="book_form_input" type=name name="role" id="role" size=80 maxlength=80 required>
        <br/>
        <br/>
        
        <span class= "div_book_field_text">Responsibilty</span>
        <input class="book_form_input" type=name name="responsibility" id="responsibility" size=80 maxlength=80>
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