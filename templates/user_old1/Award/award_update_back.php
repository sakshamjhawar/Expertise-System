<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("../../../db/db.php");
		
		$aid = mysql_real_escape_string($_POST['aid']);
		$agency = mysql_real_escape_string($_POST['agency']);
		$url = mysql_real_escape_string($_POST['url']);
		$rmk = mysql_real_escape_string($_POST['rmk']);
		$date = mysql_real_escape_string($_POST['date']);
		

		if(!mysql_select_db('college site'))
		{
			echo mysql_error();
			//echo 'Some problem occured. Please try again later.';
			return;
		}
		
		$id = $_SESSION['faculty_id'];
		//$id = 'I4iA41flS';
		if(!mysql_query("update award set award_agency = '$agency', url = '$url', remark = '$rmk', award_date = '$date' where award_id = '$aid' and id = '$id' "))
		{
			echo mysql_error();
		//	echo 'Some problem occured. Please try again later.';
			return;
		}
		else
		{
				$query = "select * from temp where id = '$id' and id_1 = '$id' and update_ = '1'";
				$result = mysql_query($query);
				if(!$result)
				{
					echo mysql_error();
					//echo 'Some problem occured. Please try again later.';
					return;
				}
				$num = mysql_num_rows($result);
				//$result = mysql_fetch_array($result);
				
				//console.log("num = ",$num);
				//echo "$num = ".$num;
				
				
				//$file = "";
					for( $i = 0; $i < $num; $i++)
					{
						$res = mysql_fetch_array($result);
						$id1 = $aid;
						$id2 = $res['image_path'];
						//$file .= $id2.',';
						$query = "insert into award_images (id, award_id, image_path )values ('$id', '$id1', '$id2')";
						if(!mysql_query($query))
						{
							echo mysql_error();
						//	echo 'Some problem occured. Please try again later.';
							return;
						}
					}
			
					
					if(!mysql_query("delete from temp where id = '$id'"))
					{
						echo mysql_error();
						//echo 'Some problem occured. Please try again later.';
						return;
					}
		}
					
			
			
	//		echo "\nAward Id".$aid; 
		//	echo "alert(Award Details Added)";
			//echo "1";
		
			mysql_close($con);
	}
?>