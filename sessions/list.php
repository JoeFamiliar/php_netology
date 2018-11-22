<?php
session_start();
if(!isset($_SESSION['username'])) {
	header('HTTP/1.0 403 Unauthorized');
	exit;
}

$text = $_GET['text'];
$path = 'tests' . DIRECTORY_SEPARATOR;
$files = glob($path . '*.json');
for($i=0; $i<sizeof($files); $i++){
	$text .= '<p><a href="test.php?test='.$i.'" title="пройти тест">Тест '.$i.'</a>;</p>';  //записываем все тесты для вывода списка
}
$text .= '<p>Вы можете загрузить свой тест <a href="admin.php"><strong>здесь</strong></a></p>';
?>
<html>
	<head>
	</head>
	<body>
		<?php echo $text; ?>
	</body>
</html>