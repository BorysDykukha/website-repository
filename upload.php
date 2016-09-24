<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>Upload file</title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<?php
		include "top.php";
		
		echo 
			"<form name='upload' action='' method='POST' ENCTYPE='multipart/form-data'>
				<input type='hidden' name='MAX_FILE_SIZE' value='2097152'>
				Choose a file to upload(up to 2Mb): 
				<input type='file' name='userfile'>
				<br>
				Choose a category of the file:
				<select name='filetype'>
					<option>Images</option>
					<option>Music</option>
					<option>Documents</option>
				</select>
				<br>
				<input type='submit' name='upload' value='Upload'>
			</form>";
			
		if($_POST[upload]) {
			$uploaddir = 'Uploaded/' . $_POST[filetype] . '/';
			$filename = $_FILES['userfile']['name'];
			$uploadfile = "$uploaddir$filename";
			if($_FILES['userfile']['size'] > 2097152) { 
				echo "File size shouldn't be more than 2 Mb.";
			} else if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
				echo "File '$filename' was uploaded to $_POST[filetype] folder.";
			} else {
				echo "File wasn't uploaded. Try again.";
			}
		}
		
		include "bottom.php";
	?>
</html>