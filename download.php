<?php
	if($_POST[download]) {
		$filename = 'files/' . $_POST[filename];
		if (file_exists($filename)) {    
			header('Content-Disposition: attachment; filename="'. basename($filename) .'";');
			echo file_get_contents($filename);
		} else {
			header('Location: index.php');
		}
		exit;
	}
?>