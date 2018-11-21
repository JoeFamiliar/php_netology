<?php
$uploads_dir = 'tests' . DIRECTORY_SEPARATOR;
$text = '';
if(!empty($_FILES)) {
    $filename = $_FILES['json']["name"];
    if(preg_match("/\.(json)$/", $filename)){
    	$tmp_name = $_FILES['json']['tmp_name'];
    	move_uploaded_file($tmp_name, "$uploads_dir/$filename");
    	$text = '<p>Ваш тест загружен успешно</p>';
    } else {
    	$text = '<p>Ошибка! Неверный формат файла теста</p>';
    }
}

?>
<html>
	<head>
	</head>
	<body>
		<?php echo $text; ?>
		<form action="admin.php" method="POST" enctype="multipart/form-data">
			Загрузить тест:
			<input type="file" name="json"><br>
			<input type="submit" value="Отправить">
		</form>
		<a href="list.php">Список тестов</a>
		
	</body>
</html>