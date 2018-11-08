<?php
$path = 'tests/';
$files = scandir($path);
array_shift($files); // удаляем из массива '.'
array_shift($files); // удаляем из массива '..'
$json = file_get_contents("tests/".$files[$_GET['test']]);
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
		<form action="" method="POST">
 		<?php echo $testText; ?>
  			<input type="submit" value="Отправить">  
		</form>
		<br>
		<?php echo $result; ?>
	</body>
</html>