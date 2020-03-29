<?php
include('db.php');
session_start();
$session_id=$_SESSION['faculty_id']; //$session id
$path = "uploads/";
error_reporting(E_ALL ^ E_DEPRECATED);

function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }


if(!mysql_select_db('college site'))
{
	//	echo mysql_error();
	echo 'Some problem occured. Please try again later.';
	return;
}

	
	$result = mysql_query("select MAX(award_id) from award where id = '$session_id' group by id");	
	if(!$result)
	{
	//	echo mysql_error();
		echo 'Some problem occured. Please try again later.';
		return;
	}
					
			//echo "hsah";
		//echo "hi4";
			$result = mysql_fetch_array($result);
			$aid = $result['MAX(award_id)'];
			//echo 'aid = '.$aid;
			$aid = $aid+1;
	
	
	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP", "ico");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					 $ext = getExtension($name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = $session_id."_".str_replace(" ", "_", $name);
							if(file_exists('uploads/'.$actual_image_name))
							{
								echo "File already exists..";
								return;
							}
							else
							{
								$tmp = $_FILES['photoimg']['tmp_name'];
								if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									mysql_select_db("college site");
									
									mysql_query("insert into temp(`id`, `id_1`, `image_path`) values ('$session_id', '$aid', '$actual_image_name')");
									
									echo "<img style= 'height: 10em; width: 10em; padding:0.5em;' src='uploads/".$actual_image_name."' class='preview'>";
								}
								else
									echo "Fail upload folder with read access.";
							}
						}
						else
							echo "Image file size max 1 MB";					
					}
					else
						echo "Invalid file format";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>