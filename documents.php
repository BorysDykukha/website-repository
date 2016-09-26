<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>Documents repository</title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head> 
	<?php
		include "top.php";
		include "util.php";
		include "search.php";
		
		$documentsdir = 'Uploaded/Documents/';
		add_to_table($documentsdir, 3, $_POST[searchrequest]);
		
		if($_POST[delete]) {
			if (!(@unlink($_POST[folder] . $_POST[filename]))) die('Failed to delete file.');
			echo "<meta http-equiv='refresh' content='0; url='documents.php'' />";
		}
		
		include "bottom.php";
	?>
</html>