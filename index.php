<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>Repository</title> 
	</head> 
	<body>
		<form name="upload" action="" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
			Choose a file to upload: <input type="file" name="userfile">
			<input type="submit" name="upload" value="Upload">
		</form>

		<?php
			$uploaddir = 'files/';
			if($_POST[upload]) {
				$filename = $_FILES['userfile']['name'];
				$uploadfile = "$uploaddir$filename";
				if($_FILES['userfile']['size'] > 2097152) { 
					echo "File size shouldn't be more than 2 Mb.";
				} else if($_FILES['userfile']['size'] == 0) {
					echo "File wasn't uploaded, try again.";
				} else if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
					echo "File was uploaded.";
				} else {
					echo "File wasn't uploaded, try again.";
				}		
			}
			
			function filtered_scandir($dir) {
				$list = scandir($dir);
				if(!$list) {
					return false;
				}
				unset($list[0], $list[1]);
				return array_values($list);
			}
			
			$filelist = filtered_scandir($uploaddir);
			
			echo 
				"<table border=1 width=500>
					<tr>
						<td align='center'>Name of file</td>
						<td width=80 align='center'>Size</td>
						<td width=120 align='center'>Upload time</td>
					</tr>";
					
			foreach($filelist as $file) {
				$size = round(filesize($uploaddir . $file) / 1024, 1);
				$chdate = date("d.m.Y H:i", filemtime($uploaddir . $file));
				echo 
					"<tr>
						<td>$file</td>
						<td>$size Kb</td>
						<td>$chdate</td>
					</tr>";
			}
			
			echo "</table>";
		?>
	</body>
</html>
