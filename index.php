<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>All repositories</title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head> 

	<?php
		include "top.php";
		include "util.php";
		
		$imagesdir = 'Uploaded/Images/';
		$musicdir = 'Uploaded/Music/';
		$documentsdir = 'Uploaded/Documents/';
				
		add_to_table($imagesdir, 1);
		add_to_table($musicdir);
		add_to_table($documentsdir, 2);
		
		if($_POST[delete]) {
			if (!(@unlink($_POST[folder] . $_POST[filename]))) die('Failed to delete file.');
			echo "<meta http-equiv='refresh' content='0; url='index.php'' />";
		}
		
		include "bottom.php";
	?>
</html>