<?php
session_start();
if(isset($_SESSION['username'])) { // если юзер, то всё ок
	$uploads_dir = 'tests' . DIRECTORY_SEPARATOR;
	$text = '';
	if(!empty($_FILES)) {
	    $filename = $_FILES['json']["name"];
	    if(preg_match("/\.(json)$/", $filename)){
	    	$tmp_name = $_FILES['json']['tmp_name'];
	    	move_uploaded_file($tmp_name, "$uploads_dir/$filename");
	    	$_SESSION['loadMessage'] = '<p>Ваш тест загружен успешно</p>';
	    } else {
	    	$_SESSION['loadMessage'] = '<p>Ошибка! Неверный формат файла теста</p>';
	    }
	    header('Location: list.php');
	}
	$files = glob($uploads_dir . '*.json');
	for($i=0; $i<sizeof($files); $i++){
		$text .= '<p><a href="test.php?test='.$i.'" title="пройти тест">Тест '.$i.'</a>&nbsp;&nbsp;<a href="admin.php?delete='.$files[$i].'">Удалить тест</a></p>';  //записываем все тесты для вывода списка
	}
	if (!empty($_GET['delete'])){
        unlink($_GET['delete']);
        header('Location: admin.php');
    }
} else  { //если не юзер, а гость или вообще никто - кыш
	header('HTTP/1.0 403 Unauthorized');
	exit;
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