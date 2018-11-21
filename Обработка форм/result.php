<?php 
$result = '';
$score = 0;
if(!empty($_POST)) {
	for($k = 0; $k < count($test); $k++) {
		$try = $_POST['q'.$k];
		if($try == '') {
			$result .= 'Вы не ответили на '.$k.' вопрос. Вы ответили <strong>'.$_POST['q'.$k].'</strong><br>';
		}
		elseif ($try == $test[$k]['answer']) {
			$score ++;
			$result .= 'Вы правильно ответили на '.$k.' вопрос. Вы ответили <strong>'.$_POST['q'.$k].'</strong><br>';
		}
		else {
			$result .= 'Вы неправильно ответили на '.$k.' вопрос. Вы ответили <strong>'.$_POST['q'.$k].'</strong><br>';
		}
	}
	$result .= 'Количество правильных ответов: <strong>'.$score.'</strong><br/><a href="list.php">Назад к списку тестов</a></p>';
}		
?>
<html>
	<head>
	</head>
	<body>
		
		<br>
		<?php echo $result; ?>
	</body>
</html>