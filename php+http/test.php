<?php
$path = 'tests' . DIRECTORY_SEPARATOR;
$files = glob($path . '*.json');

if (!isset($_GET['test'])) {
	$testText = '<p>Вы не выбрали тест для прохождения. Выберите тест из списка ниже</p>';
	for($i=0; $i<sizeof($files); $i++){
		$testText .= '<p><a href="test.php?test='.$i.'" title="пройти тест">Тест '.$i.'</a>;</p>';  //записываем все тесты для вывода списка
		$testText .= '<p><a href="list.php">Посмотреть список тестов</a></p>';
	}
	exit;
} else {
	if(isset($files[$_GET['test']])){

		$jsonPath = $files[$_GET['test']];
		$json = file_get_contents($jsonPath);
		$test = json_decode($json, true);

		$testText = '';
		for($k = 0; $k < count($test); $k++) {
			$testText .= '<fieldset>';
			$testText .= '<legend>'.$test[$k]['Question'].'</legend>';
			for($i = 0; $i < count($test[$k]['variants']); $i++) {
				$testText .= '<label><input type="radio" name="q'.$k.'" value="'.$test[$k]['variants'][$i].'">'.$test[$k]['variants'][$i].'</label>';
			}
			$testText .= '</fieldset>';

		}
		$testText .= '<input type="hidden" name="test" value="'.$jsonPath.'">';
	} else {
		header('Location: list.php?text=Такого теста не существует');
	}
}				
?>

<html>
	<head>
	</head>
	<body>
		<form action="result.php" method="POST">
			Введите Ваше имя:
			<input type="text" name="username">
 			<?php echo $testText; ?>
 			<br>
  			<input type="submit" value="Отправить">  
		</form>
		<p><a href="list.php">Посмотреть список тестов</a></p>
	</body>
</html>