<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>Images repository</title> 
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head> 
	<?php
		include "top.php";
		include "util.php";
		include "search.php";
		
		$imagesdir = 'Uploaded/Images/';
		add_to_table($imagesdir, 3, $_POST[searchrequest]);
		
		if($_POST[delete]) {
			if (!(@unlink($_POST[folder] . $_POST[filename]))) die('Failed to delete file.');
			echo "<meta http-equiv='refresh' content='0; url='images.php'' />";
		}
		
		include "bottom.php";
	?>
</html>