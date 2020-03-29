<?php
	session_start();
	$id = $_SESSION['faculty_id'];
	error_reporting(E_ALL ^ E_DEPRECATED);
	include("../../db/db.php");
    //print_r($_FILES);
	if(!mysql_select_db('college site'))
	{
			echo mysql_error();
			//echo 'Some problem occured. Please try again later.';
			//return false;
	}
	
	
	if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
	else if(getimagesize($_FILES['file']['tmp_name']) == 0)
	{
		echo "File is not an image";
	}
    else {
		$ext = explode('.',$_FILES['file']['name']);
		$path = '../../user_files/'.$id.'/profile/profile'.end($ext);
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
		$query = "update profile_picture set path = '$path' where id = '$id'";
		if(!mysql_query($query))
		{
			echo mysql_error();	
		}
		else
		{
			echo $path;	
		}
	}
?>