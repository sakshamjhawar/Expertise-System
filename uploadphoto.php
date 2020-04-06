<?php include("newuser.php");?>

<!DOCTYPE html>
<html>
<body>
<center>
<br>


<h3 align = "center">UPLOAD PHOTO</h3>

<div style="text-align: center"><img src="RVCE_New_Logo.jpg" width="100" height ="100" /></div>

<form action="upload.php" method="post" enctype="multipart/form-data"><br><br>
    SELECT IMAGE TO UPLOAD:
<br>
<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
<br>
    <br><input type="submit" value="Upload Image" name="submit">
<br>
<br>
SAVE YOUR IMAGE WITH YOUR ESSN BEFORE UPLOAD
<br>
<br>
ASLO only JPG, JPEG, PNG & GIF files are allowed
</form>
</center>
</body>
</html>

