<?php 

session_start();

if(isset($_SESSION['username']) || isset($_SESSION['guest'])) {

	$jsonPath = $_POST['test'];
	$json = file_get_contents($jsonPath);
	$test = json_decode($json, true);
	if (isset($_SESSION['username'])){
		$text = $_SESSION['username'];
	} else {
		$text = $_SESSION['guest'];
	}
	$result = $text.', ';
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
	

// пользовательская функция
//create_img($text);

} else {
	header('HTTP/1.0 403 Unauthorized');
	exit;
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