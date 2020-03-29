<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="jquery-1.11.1.min.js"></script>

<title>Manage</title>
</head>

<body>
	<div style="margin:0px auto; margin-left:25%; margin-top:1%;">
		<img src="rvcelogo.png" style="display:inline-block; float:left;" width="100" />
		<p style="display:inline-block; float:left; font-size:32px; margin-left:70px;">RV COLLEGE OF ENGINEERING</p>
	</div>
	<div class="div_container">
	<div class="div_panel"> 
	<div class="div_details">
	<p style="margin-left:2em; margin-top:2em;">Name: ABC</p>
	<p style="margin-left:25em; margin-top:2em;">Dept: ISE</p>
	<p style="margin-left:2em; margin-top:6em;">Email: abc@rvce.com	</p>
	<p style="margin-left:25em; margin-top:6em;">Contact: 9999999007</p>
	</div>
    <img src="photo.jpg" style="float:right; margin-top:1em; margin-right:5em;" width="100em" />
	
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
    <li  id="12"><p>Projects Undertaken</p></li>
    <li  id="13"><p>Review</p></li>
    <li  id="14"><p>Seminar</p></li>
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

<script type="text/javascript">

$(document).ready(function(){
	
	
	function print_pdf(div_to_print)
	{
		var restore = document.body.innerHTML;
		var pr = document.getElementById(div_to_print).innerHTML;
		document.body.innerHTML = pr;
		window.print() ;
		document.body.innerHTML = restore;
	}
	
	function black_menu()
	{
			$("#menu_1_text").css("color","#000");
			$("#menu_2_text").css("color","#000");
			$("#menu_3_text").css("color","#000");
			$("#menu_4_text").css("color","#000");
			$("#menu_5_text").css("color","#000");
	}
	
	$("#1").click(function(){
		black_menu();
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('individual/Award/award_overview.php');
		
		$("#menu_1").click(function()
		{
			black_menu();
			$("#menu_1_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Award/award_overview.php');
		});
		
		$("#menu_2").click(function()
		{
			black_menu();
			$("#menu_2_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Award/award_insert.php');
		});
		
		$("#menu_3").click(function()
		{
			black_menu();
			$("#menu_3_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Award/award_update.php');
		});
		
		$("#menu_4").click(function()
		{
			black_menu();
			$("#menu_4_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Award/award_delete.php');
		});
		
		$("#menu_5").click(function()
		{
			black_menu();
			$("#menu_5_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Award/award_generate_report.php');
		});
		
			$(".list_tab li").css("background","#FFF");
			$("#1").css("background","#C3C5FE");
		});

	
	$("#2").click(function(){
		black_menu();
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('individual/Book/book_overview.php');
		
		$("#menu_1").click(function()
		{
			black_menu();
			$("#menu_1_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Book/book_overview.php');
		});
		
		$("#menu_2").click(function()
		{
			black_menu();
			$("#menu_2_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Book/book_insert.php');
		});
		
		$("#menu_3").click(function()
		{
			black_menu();
			$("#menu_3_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Book/book_update.php');
		});
		
		$("#menu_4").click(function()
		{
			black_menu();
			$("#menu_4_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Book/book_delete.php');
		});
		
		$("#menu_5").click(function()
		{
			black_menu();
			$("#menu_5_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Book/book_generate_report.php');
		});
		
			$(".list_tab li").css("background","#FFF");
			$("#2").css("background","#C3C5FE");
		});
	
	$("#3").click(function(){
		black_menu();
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('individual/CommunityService/community_overview.php');
		
		$("#menu_1").click(function()
		{
			black_menu();
			$("#menu_1_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/CommunityService/community_overview.php');
		});
		
		$("#menu_2").click(function()
		{
			black_menu();
			$("#menu_2_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/CommunityService/community_insert.php');
		});
		
		$("#menu_3").click(function()
		{
			black_menu();
			$("#menu_3_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/CommunityService/community_update.php');
		});
		
		$("#menu_4").click(function()
		{
			black_menu();
			$("#menu_4_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/CommunityService/community_delete.php');
		});
		
		$("#menu_5").click(function()
		{
			black_menu();
			$("#menu_5_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/CommunityService/community_generate_report.php');
		});
		
			$(".list_tab li").css("background","#FFF");
			$("#3").css("background","#C3C5FE");
		});
		
	$("#4").click(function(){
		black_menu();
		$("#menu_1_text").css("color","#C3C5FE");
		$(".div_main_portion").load('individual/Conference/conference_overview.php');
		
		$("#menu_1").click(function()
		{
			black_menu();
			$("#menu_1_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Conference/conference_overview.php');
		});
		
		$("#menu_2").click(function()
		{
			black_menu();
			$("#menu_2_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Conference/conference_insert.php');
		});
		
		$("#menu_3").click(function()
		{
			black_menu();
			$("#menu_3_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Conference/conference_update.php');
		});
		
		$("#menu_4").click(function()
		{
			black_menu();
			$("#menu_4_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Conference/conference_delete.php');
		});
		
		$("#menu_5").click(function()
		{
			black_menu();
			$("#menu_5_text").css("color","#C3C5FE");
			$(".div_main_portion").load('individual/Conference/conference_generate_report.php');
		});
		
			$(".list_tab li").css("background","#FFF");
			$("#4").css("background","#C3C5FE");
		});
		
	$("#5").click(function(){
		$(".div_main_portion").load('individual/Consultancy/consultancy.php');
			$(".list_tab li").css("background","#FFF");
			$("#5").css("background","#C3C5FE");
		});
		
	$("#6").click(function(){
		$(".div_main_portion").load('individual/Courses/courses.php');
			$(".list_tab li").css("background","#FFF");
			$("#6").css("background","#C3C5FE");
		});
		
	$("#7").click(function(){
		$(".div_main_portion").load('individual/FES/fes.php');
			$(".list_tab li").css("background","#FFF");
			$("#7").css("background","#C3C5FE");
		});
		
	$("#8").click(function(){
		$(".div_main_portion").load('individual/Governance/governance.php');
			$(".list_tab li").css("background","#FFF");
			$("#8").css("background","#C3C5FE");
		});
		
	$("#9").click(function(){
		$(".div_main_portion").load('individual/Journal/journal.php');
			$(".list_tab li").css("background","#FFF");
			$("#9").css("background","#C3C5FE");
		});
		
	$("#10").click(function(){
		$(".div_main_portion").load('individual/ProfMem/prof_mem.php');
			$(".list_tab li").css("background","#FFF");
			$("#10").css("background","#C3C5FE");
		});
		
	$("#11").click(function(){
		$(".div_main_portion").load('individual/Profile/profile.php');
			$(".list_tab li").css("background","#FFF");
			$("#11").css("background","#C3C5FE");
		});
		
	$("#12").click(function(){
		$(".div_main_portion").load('individual/Projects/projects.php');
			$(".list_tab li").css("background","#FFF");
			$("#12").css("background","#C3C5FE");
		});
		
	$("#13").click(function(){
		$(".div_main_portion").load('individual/Review/review.php');
			$(".list_tab li").css("background","#FFF");
			$("#13").css("background","#C3C5FE");
		});
		
	$("#14").click(function(){
		$(".div_main_portion").load('individual/Seminar/seminar.php');
			$(".list_tab li").css("background","#FFF");
			$("#14").css("background","#C3C5FE");
		});
	
});
	

</script>
</body>
</html>
