<?php
$uploads_dir = '/tests';
$text = '';
if(!empty($_FILES) && array_key_exists("json", $_FILES)) {
	$tmp_name = $_FILES['json']['tmp_name'][$key];
    $name = $_FILES['json']["name"][$key];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    $text = '<a href="list.php">Список тестов</a>';
}
?>
<html>
	<head>
	</head>
	<body>
		<form action="." method="POST" enctype="multipart/form-data">
			Загрузить тест:
			<input type="file" name="json"><br>
			<input type="submit" value="Отправить">
		</form>
		<?php echo $text; ?>
	</body>
</html>