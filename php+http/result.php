<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$jsonPath = $_POST['test'];
	$json = file_get_contents($jsonPath);
	$test = json_decode($json, true);
	$text = $_POST['username'];
	$result = $_POST['username'].', ';
	$score = 0;

	for($k = 0; $k < count($test); $k++) {
		if(!isset($_POST['q'.$k])) {
		    $result .= '<p>Вы не ответили на '.$k.' вопрос.</p>';
		}
		elseif ($_POST['q'.$k] == $test[$k]['answer']) {
			$score ++;
			$result .= '<p>Вы правильно ответили на '.$k.' вопрос. Вы ответили <strong>'.$_POST['q'.$k].'</strong></p>';
		}
		else {
			$result .= '<p>Вы неправильно ответили на '.$k.' вопрос. Вы ответили <strong>'.$_POST['q'.$k].'</strong></p>';
		}
	}
	$result .= '<p>Количество правильных ответов: <strong>'.$score.'</strong></p><a href="list.php">Назад к списку тестов</a></p>';
	$result .= '<img src="sert.php?username='.$text.'" />';
} else {
	header('Location: list.php?text=Такого теста не существует');
}
?>
<html>
	<head>
	</head>
	<body>
		<p></p>
		<?php echo $result; ?>
	</body>
</html>