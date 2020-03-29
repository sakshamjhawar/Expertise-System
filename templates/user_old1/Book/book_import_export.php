<script type="text/javascript">

var xls_file = function(){
	$("#a_export").attr("href", "Book/book_export_xls_back.php");
}

var csv_file = function(){
	$("#a_export").attr("href", "Book/book_export_csv_back.php");
}

$("form#data").submit(function(event){
	event.preventDefault();
	var form = document.forms.namedItem("data");
	var formdata = new FormData(form);
	$("#btn").val("Importing...");
	
// 	alert("here");
	$.ajax({
		url: "Book/book_import_back.php",
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		success: function(data){
			alert(data);
			//$("#btn").html("Import");
			}
		});
	return false;
});


</script>
<div class = "form_import">
<form name = "data" id = "data" method="post" enctype="multipart/form-data">
	<span><h3>Select the csv/ xls file to import contents from</h3></span><br>
     <input class = "form_import_input" type="file" name="file" id = "file" /><br />
     <input class = "form_import_btn" type="submit" name="submit" value="Import" id = "btn" />
</form>
</div>

<div class = "form_export">
	<span><h3>Export data to csv/ xls file</h3></span><br>
	
	<input type="radio" name = "export" id = "csv" onclick = 'csv_file()'>CSV file</input>
	<input type="radio" name = "export" id = "xls" onclick = 'xls_file()'>XLS file</input>	<br> 
    <a id = "a_export" href = "individual/Book/book_export_csv_back.php"><button class = "form_export_btn">Export</button></a>
   
</div>