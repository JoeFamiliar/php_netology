<?php
$path = 'tests/';
$files = scandir($path);
$text = '';
array_shift($files); // удаляем из массива '.'
array_shift($files); // удаляем из массива '..'
for($i=0; $i<sizeof($files); $i++){
	$format = array_pop(explode(".",$files[$i]));             
	if( $format == 'json'){
		$text .= '<a href="list.php?test='.$i.'" title="открыть/скачать файл">Тест '.$i.'</a>;<br>';  //записываем все тесты для вывода списка
	}
}
?>
<html>
	<head>
	</head>
	<body>
		<?php echo $text; ?>
	</body>
</html>