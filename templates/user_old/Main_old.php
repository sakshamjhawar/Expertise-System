<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
<style type="text/css" media="print">
        @page 
        {
            size: auto A4 potrait;   /* auto is the current printer page size */ 
			margin: 2em; /* this affects the margin in the printer settings */
        }
		 body 
        {
            background-color:#FFFFFF; 
            margin-top: 1em;
			margin-bottom: 2em;  /* the margin on the content before printing */
       }
       
    </style>
<script src="../../js/jquery-1.11.1.min.js"></script>
<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	if( !(isset($_SESSION['faculty_id'])))
	{
		header('Location: ../login/login.php');
	}
	else
	//echo "Welcome ".$_SESSION['uname']."\nID = ".$_SESSION['faculty_id'];
	
?>
<script type="text/javascript">

$(document).ready(function(){
	
	var option;
	
	function black_menu()
	{
			$('#div_main_portion').html('');
			$("#menu_1_text").css("color","#000");
			$("#menu_2_text").css("color","#000");
			$("#menu_3_text").css("color","#000");
			$("#menu_4_text").css("color","#000");
			$("#menu_5_text").css("color","#000");
	}
	
	$("#1").click(function(){
		black_menu();
		option = 1;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Award/award_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#1").css("background","#C3C5FE");
	});
	
	$("#2").click(function(){
		black_menu();
		option = 2;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Book/book_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#2").css("background","#C3C5FE");
	});
	
	$("#3").click(function(){
		black_menu();
		option = 3;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('CommunityService/community_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#3").css("background","#C3C5FE");
	});
	
	$("#4").click(function(){
		black_menu();
		option = 4;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Conference/conference_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#4").css("background","#C3C5FE");
	});
	
	$("#5").click(function(){
		black_menu();
		option = 5;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Consultancy/consultancy_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#5").css("background","#C3C5FE");
	});
	
	$("#6").click(function(){
		black_menu();
		option = 6;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Courses/courses_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#6").css("background","#C3C5FE");
	});
	
	$("#7").click(function(){
		black_menu();
		option = 7;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('FacultyExchangeProgram/fep_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#7").css("background","#C3C5FE");
	});
	
	$("#8").click(function(){
		black_menu();
		option = 8;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Governance/governance_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#8").css("background","#C3C5FE");
	});
	
	$("#9").click(function(){
		black_menu();
		option = 9;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Journals/journal_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#9").css("background","#C3C5FE");
	});
	
	$("#10").click(function(){
		black_menu();
		option = 10;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Professional_membership/prof_mem_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#10").css("background","#C3C5FE");
	});
	
	$("#11").click(function(){
		black_menu();
		option = 11;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Profile/profile_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#11").css("background","#C3C5FE");
	});
	
	$("#12").click(function(){
		black_menu();
		option = 12;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Project/project_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#12").css("background","#C3C5FE");
	});
	
	$("#13").click(function(){
		black_menu();
		option = 13;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Seminar/seminar_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#13").css("background","#C3C5FE");
	});
	
	$("#14").click(function(){
		black_menu();
		option = 14;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Workshop/workshop_overview.php');
		$(".list_tab li").css("background","#FFF");
		$("#14").css("background","#C3C5FE");
	});
	
	$("#15").click(function(){
		black_menu();
		option = 15;
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('Resume/resume.php');
		$(".list_tab li").css("background","#FFF");
		$("#15").css("background","#C3C5FE");
	});
	

		
	$("#menu_1").click(function()
	{
			black_menu();
			$("#menu_1_text").css("color","#C3C5FE");
			if(option == 1)
				$(".div_main_portion").load('Award/award_overview.php');
			else if(option == 2)
				$(".div_main_portion").load('Book/book_overview.php');
			else if(option == 3)
				$(".div_main_portion").load('CommunityService/community_overview.php');
			else if(option == 4)
				$(".div_main_portion").load('Conference/conference_overview.php');
			else if(option == 5)
				$(".div_main_portion").load('Consultancy/consultancy_overview.php');
			else if(option == 6)
				$(".div_main_portion").load('Courses/courses_overview.php');
			else if(option == 7)
				$(".div_main_portion").load('FacultyExchangeProgram/fep_overview.php');
			else if(option == 8)
				$(".div_main_portion").load('Governance/governance_overview.php');
			else if(option == 9)
				$(".div_main_portion").load('Journals/journal_overview.php');
			else if(option == 10)
				$(".div_main_portion").load('Professional_membership/prof_mem_overview.php');
			else if(option == 11)
				$(".div_main_portion").load('Profile/profile_overview.php');
			else if(option == 12)
				$(".div_main_portion").load('Project/project_overview.php');
			else if(option == 13)
				$(".div_main_portion").load('Seminar/seminar_overview.php');
			else if(option == 14)
				$(".div_main_portion").load('Workshop/workshop_overview.php');
			else
				alert('Please select a category!');
	
	});

$("#menu_2").click(function()
	{
			black_menu();
			$("#menu_2_text").css("color","#C3C5FE");
			if(option == 1)
				$(".div_main_portion").load('Award/award_insert.php');
			else if(option == 2)
				$(".div_main_portion").load('Book/book_insert.php');
			else if(option == 3)
				$(".div_main_portion").load('CommunityService/community_insert.php');
			else if(option == 4)
				$(".div_main_portion").load('Conference/conference_insert.php');
			else if(option == 5)
				$(".div_main_portion").load('Consultancy/consultancy_insert.php');
			else if(option == 6)
				$(".div_main_portion").load('Courses/courses_insert.php');
			else if(option == 7)
				$(".div_main_portion").load('FacultyExchangeProgram/fep_insert.php');
			else if(option == 8)
				$(".div_main_portion").load('Governance/governance_insert.php');
			else if(option == 9)
				$(".div_main_portion").load('Journals/journal_insert.php');
			else if(option == 10)
				$(".div_main_portion").load('Professional_membership/prof_mem_insert.php');
			else if(option == 11)
				$(".div_main_portion").load('Profile/profile_insert.php');
			else if(option == 12)
				$(".div_main_portion").load('Project/project_insert.php');
			else if(option == 13)
				$(".div_main_portion").load('Seminar/seminar_insert.php');
			else if(option == 14)
				$(".div_main_portion").load('Workshop/workshop_insert.php');
			else
				alert('Please select a category!');
	
	});
	
	
	$("#menu_3").click(function()
	{
			black_menu();
			$("#menu_3_text").css("color","#C3C5FE");
			if(option == 1)
				$(".div_main_portion").load('Award/award_update.php');
			else if(option == 2)
				$(".div_main_portion").load('Book/book_update.php');
			else if(option == 3)
				$(".div_main_portion").load('CommunityService/community_update.php');
			else if(option == 4)
				$(".div_main_portion").load('Conference/conference_update.php');
			else if(option == 5)
				$(".div_main_portion").load('Consultancy/consultancy_update.php');
			else if(option == 6)
				$(".div_main_portion").load('Courses/courses_update.php');
			else if(option == 7)
				$(".div_main_portion").load('FacultyExchangeProgram/fep_update.php');
			else if(option == 8)
				$(".div_main_portion").load('Governance/governance_update.php');
			else if(option == 9)
				$(".div_main_portion").load('Journals/journal_update.php');
			else if(option == 10)
				$(".div_main_portion").load('Professional_membership/prof_mem_update.php');
			else if(option == 11)
				$(".div_main_portion").load('Profile/profile_update.php');
			else if(option == 12)
				$(".div_main_portion").load('Project/project_update.php');
			else if(option == 13)
				$(".div_main_portion").load('Seminar/seminar_update.php');
			else if(option == 14)
				$(".div_main_portion").load('Workshop/workshop_update.php');
			else
				alert('Please select a category!');
	
	});
	

	$("#menu_4").click(function()
	{
			black_menu();
			$("#menu_4_text").css("color","#C3C5FE");
			if(option == 1)
				$(".div_main_portion").load('Award/award_delete.php');
			else if(option == 2)
				$(".div_main_portion").load('Book/book_delete.php');
			else if(option == 3)
				$(".div_main_portion").load('CommunityService/community_delete.php');
			else if(option == 4)
				$(".div_main_portion").load('Conference/conference_delete.php');
			else if(option == 5)
				$(".div_main_portion").load('Consultancy/consultancy_delete.php');
			else if(option == 6)
				$(".div_main_portion").load('Courses/courses_delete.php');
			else if(option == 7)
				$(".div_main_portion").load('FacultyExchangeProgram/fep_delete.php');
			else if(option == 8)
				$(".div_main_portion").load('Governance/governance_delete.php');
			else if(option == 9)
				$(".div_main_portion").load('Journals/journal_delete.php');
			else if(option == 10)
				$(".div_main_portion").load('Professional_membership/prof_mem_delete.php');
			else if(option == 11)
				$(".div_main_portion").load('Profile/profile_delete.php');
			else if(option == 12)
				$(".div_main_portion").load('Project/project_delete.php');
			else if(option == 13)
				$(".div_main_portion").load('Seminar/seminar_delete.php');
			else if(option == 14)
				$(".div_main_portion").load('Workshop/workshop_delete.php');
			else
				alert('Please select a category!');
	
	});
	
$("#menu_5").click(function()
	{
			black_menu();
			$("#menu_5_text").css("color","#C3C5FE");
			if(option == 1)
				$(".div_main_portion").load('Award/award_generate_report.php');
			else if(option == 2)
				$(".div_main_portion").load('Book/book_generate_report.php');
			else if(option == 3)
				$(".div_main_portion").load('CommunityService/community_generate_report.php');
			else if(option == 4)
				$(".div_main_portion").load('Conference/conference_generate_report.php');
			else if(option == 5)
				$(".div_main_portion").load('Consultancy/consultancy_generate_report.php');
			else if(option == 6)
				$(".div_main_portion").load('Courses/courses_generate_report.php');
			else if(option == 7)
				$(".div_main_portion").load('FacultyExchangeProgram/fep_generate_report.php');
			else if(option == 8)
				$(".div_main_portion").load('Governance/governance_generate_report.php');
			else if(option == 9)
				$(".div_main_portion").load('Journals/journal_generate_report.php');
			else if(option == 10)
				$(".div_main_portion").load('Professional_membership/prof_mem_generate_report.php');
			else if(option == 11)
				$(".div_main_portion").load('Profile/profile_generate_report.php');
			else if(option == 12)
				$(".div_main_portion").load('Project/project_generate_report.php');
			else if(option == 13)
				$(".div_main_portion").load('Seminar/seminar_generate_report.php');
			else if(option == 14)
				$(".div_main_portion").load('Workshop/workshop_generate_report.php');
			else
				alert('Please select a category!');
	
	});
});


	

</script>

<title>Manage</title>
</head>

<body>
	<div ><a href = '../login/logout.php' class = "form_button_logout_page_submit">Logout</a></div>
    <div ><a href = 'user_profile/profile_update.php' class = "form_button_logout_page_submit">Edit Profile</a></div>
    <div ><a href = '../change_password/change_password.php 	' class = "form_button_logout_page_submit">Change Password</a></div>
    
	<div style="margin:0px auto; margin-left:25%; margin-top:1%;">
		<img src="../../images/rvcelogo.png" style="display:inline-block; float:left;" width="100" />
		<p style="display:inline-block; float:left; font-size:32px; margin-left:70px;">RV COLLEGE OF ENGINEERING</p>
	</div>
    
    
    
	<div class="div_container">
	<div class="div_panel"> 
	<div class="div_details">
	<p style="margin-left:2em; margin-top:2em;">Name: <?php
	include("../../db/db.php");
	error_reporting(E_ALL ^ E_DEPRECATED);
	$db = mysql_select_db("college site");
	$id = $_SESSION['faculty_id'];
	
	$res = mysql_query("select name from faculty_member where fid = '$id'");
	$ar  = mysql_fetch_array($res);
	echo $ar[0];
	?></p>
	<p style="margin-left:25em; margin-top:2em;">Dept: <?php
	include("../../db/db.php");
	error_reporting(E_ALL ^ E_DEPRECATED);
	$db = mysql_select_db("college site");
	$id = $_SESSION['faculty_id'];
	
	$res = mysql_query("select department from faculty_member where fid = '$id'");
	$ar  = mysql_fetch_array($res);
	echo $ar[0];
	?> </p>
	<p style="margin-left:2em; margin-top:6em;">Email: <?php
	include("../../db/db.php");
	error_reporting(E_ALL ^ E_DEPRECATED);
	mysql_select_db("college site");
	$id = $_SESSION['faculty_id'];
	$res = mysql_query("select email from faculty_member where fid = '$id'");
	$ar  = mysql_fetch_array($res);
	echo $ar[0];
	?> </p>
	<p style="margin-left:25em; margin-top:6em;">Contact: <?php
	include("../../db/db.php");
	error_reporting(E_ALL ^ E_DEPRECATED);
	mysql_select_db("college site");
	$id = $_SESSION['faculty_id'];
	$res = mysql_query("select phone_number from faculty_member where fid = '$id'");
	$ar  = mysql_fetch_array($res);
	echo $ar[0];
	?> </p>
	</div>
    <div class="profile_photo">
    	<img height="120" width="120" id="profile_picture" alt = "image"/>
        <?php
			include("../../db/db.php");
			error_reporting(E_ALL ^ E_DEPRECATED);
			mysql_select_db("college site");
			$id = $_SESSION['faculty_id'];
			$res = mysql_query("select path from profile_picture where id = '$id'");
			$ar  = mysql_fetch_array($res);
			$path = $ar['path'];
			echo "<script>document.getElementById('profile_picture').src='$path'</script>";
		?>
        <button onClick="input_trigger()" class="edit_button" id = "profile_button"></button>
        <form id="profile_picture_form" method="post" enctype="multipart/form-data">
        	<input type="file" id="profile_picture_input" hidden="true" onChange="change_profile_picture()"/>
		</form>
    	<script>
			function input_trigger()
			{
				//alert("hi");
				$('#profile_picture_input').trigger('click');	
			}
			
			function change_profile_picture(str)
			{
				//alert("hi");
				var form = document.getElementById('profile_picture_form');
				var fileSelect = document.getElementById('profile_picture_input');
				var file = fileSelect.files;
				var form_data = new FormData();
				
				if(!file[0].type.match("image"))
				{	
					alert("File is not an image");
					return;
				}
				form_data.append('file', file[0]);
				//alert(form_data); 
				
				$.ajax({
					url: "../../php/upload/profile_picture.php", // Url to which the request is send
					type: "POST",
					contentType: false,
                	processData: false,             // Type of request to be send, called as method
					cache : false,
					data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				}).done( function(d){
					//alert(d);
					if(d.indexOf('user') > -1)
						$('#profile_picture').attr('src', d+'?'+Math.random());
					else
						alert(d);
				});
				
				
			}
		</script>
    
    </div>
    </div>

	<div class="div_sub_main">
	<ul class="list_tab">
	<li  id="1"><p>Awards</p></li>
	<li  id="2"><p>Books</p></li>
	<li  id="3"><p>Community Service</p></li>
	<li  id="4"><p>Conference</p></li>
	<li  id="5"><p>Consultancy</p></li>
	<li  id="6"><p>Courses</p></li>
	<li  id="7"><p>Faculty Exchange Program</p></li>
	<li  id="8"><p>Governance</p></li>
	<li  id="9"><p>Journal</p></li>
	<li  id="10"><p>Professional Membership</p></li>
	<li  id="11"><p>Qualification Details</p></li>
    <li  id="12"><p>Projects Undertaken</p></li><!-- -->
    <li  id="13"><p>Seminar</p></li><!-- -->
    <li  id="14"><p>Workshops</p></li><!-- -->
    <li  id="15"><p>Resume</p></li><!-- -->
    
</ul>

</div>


<div class = "div_main">
<div class = "div_main_menu">
	<table style = "border-style : solid ; border-color : #C3C5FE #FFF; font-size:1.1em;" >
		<tr> 
			<td class = "div_main_menu_column" id="menu_1" >
				<h3 id="menu_1_text"> View Record </h3>
			</td>
			<td class = "div_main_menu_column" id="menu_2">
				<h3 id="menu_2_text"> New Record </h3>
			</td>
		
			<td class = "div_main_menu_column" id="menu_3">
				<h3 id="menu_3_text"> Update Record </h3>
			</td>
			
			<td class = "div_main_menu_column" id="menu_4">
				<h3 id="menu_4_text"> Delete Record </h3>
			<td>
			
			<td class = "div_main_menu_column" style = "border-right-color:#FFF;" id="menu_5">
				<h3 id="menu_5_text"> Generate Report </h3>
			</td>
		</tr>
	</table>
</div>

<div class="div_main_portion"> 

</div>

</div>
</div>

</body>
</html>
