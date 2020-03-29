<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	session_start();
	
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../db.php");
	if(!mysql_select_db('college site'))
	{
		echo mysql_error();
		return;
	}
	//echo "conn dn";
	$id = $_SESSION['faculty_id'];
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	$num_rows = 0;
	$ar = [];
	while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
	{
		$id = $filesop[0];
		$award_id = $filesop[1];
		$award_name = $filesop[2];
		$award_agency = $filesop[3];
		$url = $filesop[4];
		$remark = $filesop[5];
		$award_date = $filesop[6];
		//echo $id."  ".$award_id."  ".$award_name."  ".$award_agency."  ".$url."  ".$remark."  ".$remark;
		if($sql = mysql_query("INSERT INTO award (id, award_id, award_name, award_agency, url, remark, award_date) 
				VALUES ('$id', '$award_id', '$award_date', '$award_agency', '$url', '$remark', '$award_date')")){
				$c++;
				array_push($ar, $id." ".$award_id);
		}
		$num_rows++;
		
	}
// 	echo "Num of rows inserted = ".$c. " ".$num_rows."<br>";
	//echo  $ar;
	if(++$c == $num_rows){
		echo "You database has been imported successfully";
	}else{
		echo "Sorry! There is some problem.";
	}
}
?>
