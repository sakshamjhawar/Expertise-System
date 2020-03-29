<?php
	session_start();
	//echo $_FILES['file']['size'];
	$id = $_SESSION['faculty_id'];
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../db/db.php");
	
    //print_r($_FILES);
	$type = $_POST['type'];
	if(!mysql_select_db('college site'))
	{
			echo mysql_error();
			//echo 'Some problem occured. Please try again later.';
			//return false;
	}
	
	
	/*if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }*/
	
	if($type == 'award')
	{
		//$i = 0;
		//echo "Point one";
		$aid = $_POST['aid'];
		echo $aid;
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			//echo "Point2";
			if ( 0 < $_FILES['file']['error'][$key] ) 
			{
				echo 'Error: ' . $_FILES['file']['error'] . '<br>';
				if($result = mysql_query("delete from award where award_id = '$aid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
			//$i++;
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];
			
			if(getimagesize($file_tmp) == 0)
			{
				echo "Error : File ".$key." is not an image";
				if($result = mysql_query("delete from award where award_id = '$aid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
		
		}
		
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			//echo "Point 3";
			$date = new DateTime();
			//$timestamp = date->getTimeStamp(); 
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];
			$ext = explode('.',$_FILES['file']['name'][$key]);
			
			$path = '../../user_files/'.$id.'/awards/'.$date->getTimestamp().rand().".".end($ext);
			
			//echo $path;
			move_uploaded_file($file_tmp, $path);
			$query = "INSERT INTO award_images(id, award_id, image_path) VALUES ('$id','$aid','$path')";
			if(!mysql_query($query))
			{
				echo mysql_error();	
				if($result = mysql_query("delete from award where award_id = '$aid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
		}
	}
	
	if($type == 'conference')
	{
		//$i = 0;
		//echo "Point one";
		$aid = $_POST['cid'];
		echo $aid;
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			//echo "Point2";
			if ( 0 < $_FILES['file']['error'][$key] ) 
			{
				echo 'Error: ' . $_FILES['file']['error'] . '<br>';
				if($result = mysql_query("delete from conference where conference_id = '$cid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
			//$i++;
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];
			
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $file_tmp);
			$ok = false;
			if($mime != 'application/pdf' && $mime != 'application/msword' && $mime != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
			{
				echo "Error : File ".$key." is not in required format";
				if($result = mysql_query("delete from conference where conference_id = '$cid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
		
		}
		
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			//echo "Point 3";
			$date = new DateTime();
			//$timestamp = date->getTimeStamp(); 
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];
			$ext = explode('.',$_FILES['file']['name'][$key]);
			
			$path = '../../user_files/'.$id.'/conference/'.$date->getTimestamp().rand().".".end($ext);
			
			//echo $path;
			move_uploaded_file($file_tmp, $path);
			$query = "INSERT INTO conference_files(id, conference_id, file_path) VALUES ('$id','$aid','$path')";
			if(!mysql_query($query))
			{
				echo mysql_error();	
				if($result = mysql_query("delete from conference where conference_id = '$cid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
		}
	}
	
	if($type == 'journal')
	{
		//$i = 0;
		//echo "Point one";
		$jid = $_POST['jid'];
		echo $aid;
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			//echo "Point2";
			if ( 0 < $_FILES['file']['error'][$key] ) 
			{
				echo 'Error: ' . $_FILES['file']['error'] . '<br>';
				if($result = mysql_query("delete from journal where journal_id = '$jid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
			//$i++;
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];
			
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime = finfo_file($finfo, $file_tmp);
			$ok = false;
			if($mime != 'application/pdf' && $mime != 'application/msword' && $mime != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
			{
				echo "Error : File ".$key." is not in required format";
				if($result = mysql_query("delete from journal where journal_id = '$jid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
		
		}
		
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			//echo "Point 3";
			$date = new DateTime();
			//$timestamp = date->getTimeStamp(); 
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];
			$ext = explode('.',$_FILES['file']['name'][$key]);
			
			$path = '../../user_files/'.$id.'/journal/'.$date->getTimestamp().rand().".".end($ext);
			
			//echo $path;
			move_uploaded_file($file_tmp, $path);
			$query = "INSERT INTO journal_file(id, journal_id, file_path) VALUES ('$id','$jid','$path')";
			if(!mysql_query($query))
			{
				echo mysql_error();	
				if($result = mysql_query("delete from journal where journal_id = '$jid' && id = '$id'"))
				{
					//echo "record deleted";
				}
				else
				{
						echo mysql_error();
						$flag = 1;
				}
				return;
			}
		}
	}
?>