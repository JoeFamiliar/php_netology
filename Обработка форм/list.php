<?php
$path = '/tests';
$tests = scandir($path);
$text = '';
if(count($tests) > 0) {
	foreach($tests as $test){
		if(is_file("$path/$test")) {
			$text .= $test . "<br>";
		} else {
			$text = "Тестовые файлы отсутствуют";
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