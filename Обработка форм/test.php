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

				
?>

<html>
	<head>
	</head>
	<body>
		<form action="result.php" method="POST">
			<input type="text" name="username">
 		<?php echo $testText; ?>
  			<input type="submit" value="Отправить">  
		</form>
		<br>
	</body>
</html>