<?php 


if(isset($_POST) && !empty($_FILES['file']['tmp_name']))
{
	session_start();
// 	print_r($_FILES['file']);
// 	$data = new Spreadsheet_Excel_Reader();
// // 	mb_internal_encoding("8bit");
// 	$data->read($_FILES['file']['tmp_name']);
// 	print_r($data);
// 	return;
// 	echo end($name_array);
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../../db/db.php");
	if(!mysql_select_db('college site'))
	{
		echo mysql_error();
		return;
	}
	//echo "conn dn";
	$id = $_SESSION['faculty_id'];
	$file = $_FILES['file']['tmp_name'];
	$name_array = explode(".",$_FILES['file']['name']);
// 	print_r($name_array);
	if(end($name_array) == "csv"){
		$handle = fopen($file, "r");
		$c = 0;
		$num_rows = 0;
		$ar = array();
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$id = $filesop[7];
			$comm_user_id = $filesop[0];
			$name_of_event = $filesop[1];
			$role = $filesop[2];
			$location = $filesop[3];
			$date_of_event = $filesop[4];
			$url = $filesop[5];
			$additional_info = $filesop[6];
			//echo $id."  ".$award_id."  ".$award_name."  ".$award_agency."  ".$url."  ".$remark."  ".$remark;
			if($sql = mysql_query("INSERT INTO communityuser (id, community_user_id, name_of_event, role, location, date_of_event, url, additional_information)
					VALUES ('$id', '$comm_user_id', '$name_of_event', '$role', '$location', '$date_of_event', '$url', '$additional_info')")){
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
	
	
}
?>
