<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>Music repository</title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head> 
	<?php
		include "top.php";
		include "util.php";
		
		$musicdir = 'Uploaded/Music/';
		add_to_table($musicdir, 3);
		
		if($_POST[delete]) {
			if (!(@unlink($_POST[folder] . $_POST[filename]))) die('Failed to delete file.');
			echo "<meta http-equiv='refresh' content='0; url='music.php'' />";
		}
		
		include "bottom.php";
	?>
</html>