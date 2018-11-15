<?php 
$pdo = new PDO("mysql:host=localhost;dbname=global;charset=utf8", "akhripko", "neto1903");
$tableCreate = "CREATE TABLE `myLibrary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT `0`,
  `date_added` timestamp NULL DEFAULT NULL,
  `someField1` varchar(500) NOT NULL,
  `someField2` varchar(500) NOT NULL,
  `someField3` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
	if ($pdo->query($tableCreate))
        echo "Создание таблицы завершено";
    else
        echo "Таблицу создать не удалось";


$text = 'Список таблиц в текущей базе:<br>';
$result = $pdo->query("SHOW TABLES");
while ($row = $result->fetch(PDO::FETCH_NUM)) {
	$text .= '<a href="table.php?table='.$row[0].'">'.$row[0].'</a><br>';
  
}
?>
<html>
	<head>
		<meta content="text/html; charset=utf-8">
	</head>
	<body>
		<br>
		<?php echo $text; ?>
	</body>
</html>