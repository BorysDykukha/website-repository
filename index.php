<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">  
		<title>Главная</title> 
	</head> 
	<body>
		<form name="upload" action="" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="2048000">
			Выберите файл для загрузки: <input type="file" name="userfile">
			<input type="submit" name="upload" value="Загрузить">
		</form>

		<?php
			if($_POST[upload]) {
				$uploaddir = 'files/';
				$filename = $_FILES['userfile']['name'];
				$uploadfile = "$uploaddir$filename";
				if($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=2048000) { 
					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
						echo "Файл загружен. ";
					} else {
						echo "Файл не загружен, попробуйте еще раз";
					}
				} else { 
					echo "Размер файла не должен превышать 2Mб";
				}
			}
		?>
	</body>
</html>

