<?php
	function filtered_scandir($dir) {
		$list = scandir($dir);
		if(!$list) {
			return false;
		}
		unset($list[0], $list[1]);
		return array_values($list);
	}
	
	function add_to_table($dir, $flag=0, $searchword) {
		if($flag == 1 or $flag==3) {
			echo 
				"<table border=1 width=600>
					<tr>
						<td align='center'>Name of file</td>
						<td width=80 align='center'>Size</td>
						<td width=100 align='center'>Upload time</td>
						<td width=60></td>
						<td width=80></td>
					</tr>";
		}
		
		if($searchword != null) {
			$temp = getcwd();
			chdir("$dir");
			$list = glob("*$searchword*");
			chdir("$temp");
		} else {
			$list = filtered_scandir($dir);
		}
		foreach($list as $file) {
			$size = round(filesize($dir . $file) / 1024, 1);
			$chdate = date("d.m.Y H:i", filemtime($dir . $file));
			echo
				"<tr>
					<td>$file</td>
					<td>$size Kb</td>
					<td>$chdate</td>
					<td>
						<form name='delete' action='' method='POST' ENCTYPE='multipart/form-data'>
							<input type='hidden' name='filename' value='$file'>
							<input type='hidden' name='folder' value='$dir'>
							<input type='submit' name='delete' value='Delete'>
						</form>
					</td>
					<td>
						<form name='download' action='download.php' method='POST' ENCTYPE='multipart/form-data'>
							<input type='hidden' name='filename' value='$file'>
							<input type='hidden' name='folder' value='$dir'>
							<input type='submit' name='download' value='Download'>
						</form>
					</td>
				</tr>";
		}
		
		if($flag == 2 or $flag==3) {
			echo "</table>";
		}
	}
?>