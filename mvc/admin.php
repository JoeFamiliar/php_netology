<?php
$uploads_dir = 'tests/';
$text = '';
if(!empty($_FILES)) {
	echo "<pre>";
	print_r($_FILES);
	$tmp_name = $_FILES['json']['tmp_name'];
    $name = $_FILES['json']["name"];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    $text = '<a href="list.php">Список тестов</a>';
}

?>
<html>
	<head>
	</head>
	<body>
		<form action="admin.php" method="POST" enctype="multipart/form-data">
			Загрузить тест:
			<input type="file" name="json"><br>
			<input type="submit" value="Отправить">
		</form>
		<a href="list.php">Список тестов</a>
		<?php echo $text; ?>
	</body>
</html>