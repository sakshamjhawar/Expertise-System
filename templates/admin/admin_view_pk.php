<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
<script src="../../js/jquery-1.11.1.min.js"></script>
<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	if( !(isset($_SESSION['faculty_id'])))
	{
		header('Location: ../login/login.php');
	}
	
	//echo "Welcome ".$_SESSION['uname']."\nID = ".$_SESSION['faculty_id'];
	
?>
    

<script>
	var headings =new Array('Awards', 'Books', 'Community Service' ,'Conference', 'Consultancy', 'Courses', 'Faculty Exchange Program', 'Governance', 'Journal', 'Professional Membership', 'Projects', 'Seminar', 'Workshops'); 

	function print_pdf()
	{
		report_id = new Array();
		for(i = 0; i < 14; i++)
		{
			if(document.getElementById(i).checked == true)	
			{
				report_id.push(1);
				report_id.push(document.getElementById('from_date'+i).value);
				report_id.push(document.getElementById('to_date'+i).value);
			}
			
			else
			{
				report_id.push(0);	
				report_id.push(0);	
				report_id.push(0);	
			}
		}
		
		var jsonString = JSON.stringify(report_id);
		$.ajax({
		  type: "POST",
		  url: "admin_view_back.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			//alert(data);
			if(data == '')
				alert('No related data found!');
			else
			{
				//alert(data);
				var restore = $("body").html();
				$("body").html(data);
				window.print();
				$("body").html(restore);
				//window.location='admin_view.php';		
			}
		});
	}
	
	
	function print_pdf_department()
	{
		report_id = new Array();
		for(i = 0; i < 13; i++)
		{
			if(document.getElementById(i).checked == true)	
			{
				report_id.push(1);
				report_id.push(document.getElementById('from_date'+i).value);
				report_id.push(document.getElementById('to_date'+i).value);
			}
			
			else
			{
				report_id.push(0);	
				report_id.push(0);	
				report_id.push(0);	
			}
		}
		
		var jsonString = JSON.stringify(report_id);
		$.ajax({
		  type: "POST",
		  url: "admin_view_back_department.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			//alert(data);
			if(data == '')
				alert('No related data found!');
			else
			{
				//alert(data);
				var restore = $("body").html();
				$("body").html(data);
				window.print();
				$("body").html(restore);		
			}
		});
	}
	
	
	
	function print_pdf_faculty()
	{
		report_id = new Array();
		for(i = 0; i < 13; i++)
		{
			if(document.getElementById(i).checked == true)	
			{
				report_id.push(1);
				report_id.push(document.getElementById('from_date'+i).value);
				report_id.push(document.getElementById('to_date'+i).value);
			}
			
			else
			{
				report_id.push(0);	
				report_id.push(0);	
				report_id.push(0);	
			}
		}
		
		var jsonString = JSON.stringify(report_id);
		$.ajax({
		  type: "POST",
		  url: "admin_view_back_faculty.php",
		  data: { data : jsonString  }
		}).done(function( data ) {
			//alert(data);
			if(data == '')
				alert('No related data found!');
			else
			{
				//alert(data);
				var restore = $("body").html();
				$("body").html(data);
				//window.print();
				//$("body").html(restore);		
			}
		});
	}
	
	function check_all()
	{
		if(document.getElementById("all").checked == true)
		{
			for(i = 0; i < 13; i++)
			{
				document.getElementById(i).checked = true;
				document.getElementById('from_date'+id).hidden = false;
				document.getElementById('to_date'+id).hidden = false;
			}
		}
		else
		{
			for(i = 0; i < 13; i++)
			{
				document.getElementById(i).checked = false;
				document.getElementById('from_date'+id).hidden = false;
				document.getElementById('to_date'+id).hidden = false;
			}
		}	
		
	}
		
		
		
	
	
	
	function hid_unhid()
	{
		id = this.id;
		if(document.getElementById('from_date'+id).hidden == true)
			document.getElementById('from_date'+id).hidden = false;
		else
			document.getElementById('from_date'+id).hidden = true;
			
		if(document.getElementById('to_date'+id).hidden == true)
			document.getElementById('to_date'+id).hidden = false;
		else
			document.getElementById('to_date'+id).hidden = true;
	}
	
	
	window.onload = function table_populate()
	{
		document.getElementById("admin_view").innerHTML = "<div  class = 'form_button_logout_page_submit'><a href = '../../modified/logout.php'>Logout</a></div>\
		<h3 style='margin-left:5%; margin-top:5%'><b>Please select your choices</b></h3>\
		<table class = 'admin_table'>\
    	<tr>\
        	<td><h3> Category </h3></td>\
            </td>\
            <td ><h3> Select  <input type = 'checkbox' id = 'all' onclick = 'check_all()'></h3></td>\
            </td>\
            <td><h3> From Date </h3></td>\
            </td>\
            <td><h3> To Date </h3></td>\
            </td>\
        </tr>\
		<tbody id = 'table_body'>\
		</tbody>\
    </table>\
    <input type='button' class='form_button_register_page_submit' value='Generate Report'  onClick='print_pdf()' style='margin-left:75%; margin-top: 8%; outline:none'><br>\
	<input type='button' class='form_button_register_page_submit' value='Report by Department'  onClick='print_pdf_department()' style='margin-left:75%; margin-top: 8%; outline:none'>\
	<input type='button' class='form_button_register_page_submit' value='Report by Faculty'  onClick='print_pdf_faculty()' style='margin-left:75%; margin-top: 8%; outline:none'>";
			tableBody = document.getElementById("table_body");
			//var chk = document.createElement("input");
			//chk.type = "checkbox";
			//chk.id = "all";
			//chk.onclick = "check_all()";
			for(i = 0; i < 13; i++) 
			{
					 var tr = document.createElement('TR');
					 tr.className = 'admin_table_row';
    				 var td = document.createElement('TD');
					 var text = document.createTextNode(headings[i]);
					 td.appendChild(text);
					 tr.appendChild(td);
					 var td = document.createElement('TD');
					 var chk = document.createElement("input");
					 chk.type = "checkbox";
					 chk.id = i;
					 chk.name = "to_report";
					 console.log('here');
					 td.appendChild(chk);
					 tr.appendChild(td);
					 
					 var td = document.createElement('TD');
					 var from_date = document.createElement('input');
					 from_date.type = 'date';
					 from_date.id = 'from_date'+i;
					 from_date.className = 'admin_form_input'
					 from_date.hidden=true;
					 td.appendChild(from_date);
					 tr.appendChild(td);
					 
					 var td = document.createElement('TD');
					 var to_date = document.createElement('input');
					 to_date.type = 'date';
					 to_date.id = 'to_date'+i;
					 to_date.hidden=true;
					 to_date.className = 'admin_form_input';
					 td.appendChild(to_date);
					 
					 tr.appendChild(td);
					 	
    				 tableBody.appendChild(tr);
				document.getElementById(''+i).addEventListener('change', hid_unhid);
			}
	}
	
	
	
</script>	 


</head>

<body>
	
    <div id = "admin_view" class = 'admin_view'>
	
   	</div>
    
</body>
</html>
